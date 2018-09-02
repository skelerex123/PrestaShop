<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

/**
 * Class CategoryCore
 */
class Category  extends CategoryCore
{
    
    /** @var mixed string or array of Meta description */
    public $informationssup;
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'category',
        'primary' => 'id_category',
        'multilang' => true,
        'multilang_shop' => true,
        'fields' => array(
            'nleft' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'nright' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'level_depth' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'id_parent' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_shop_default' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'is_root_category' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'position' => array('type' => self::TYPE_INT),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            /* Lang fields */
            'name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCatalogName', 'required' => true, 'size' => 128),
            'link_rewrite' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
            'description' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'meta_title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
            'meta_description' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
            'meta_keywords' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
            'informationssup' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
        ),
    );
    public function deleteImagesup($force_delete = false)
    {
        if (!$this->id)
            return false;

        if ($force_delete || !$this->hasMultishopEntries())
        {
            /* Deleting object images and thumbnails (cache) */
            if ($this->image_dir)
            {
                if (file_exists($this->image_dir.$this->id.'_sup.'.$this->image_format)
                    && !unlink($this->image_dir.$this->id.'_sup.'.$this->image_format))
                    return false;
            }
            if (file_exists(_PS_TMP_IMG_DIR_.$this->def['table'].'_'.$this->id.'_sup.'.$this->image_format)
                && !unlink(_PS_TMP_IMG_DIR_.$this->def['table'].'_'.$this->id.'_sup.'.$this->image_format))
                return false;
            if (file_exists(_PS_TMP_IMG_DIR_.$this->def['table'].'_mini_'.$this->id.'_sup.'.$this->image_format)
                && !unlink(_PS_TMP_IMG_DIR_.$this->def['table'].'_mini_'.$this->id.'_sup.'.$this->image_format))
                return false;

            $types = ImageType::getImagesTypes();
            foreach ($types as $image_type)
                if (file_exists($this->image_dir.$this->id.'_sup-'.stripslashes($image_type['name']).'.'.$this->image_format)
                    && !unlink($this->image_dir.$this->id.'_sup-'.stripslashes($image_type['name']).'.'.$this->image_format))
                    return false;
        }
        return true;
    }
    public function getSubCategories($idLang, $active = true)
    {
        $sqlGroupsWhere = '';
        $sqlGroupsJoin = '';
        if (Group::isFeatureActive()) {
            $sqlGroupsJoin = 'LEFT JOIN `'._DB_PREFIX_.'category_group` cg ON (cg.`id_category` = c.`id_category`)';
            $groups = FrontController::getCurrentCustomerGroups();
            $sqlGroupsWhere = 'AND cg.`id_group` '.(count($groups) ? 'IN ('.implode(',', $groups).')' : '='.(int) Group::getCurrent()->id);
        }

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT c.*, cl.`id_lang`, cl.`name`, cl.`description`, cl.`link_rewrite`, cl.`meta_title`, cl.`meta_keywords`, cl.`meta_description`
		FROM `'._DB_PREFIX_.'category` c
		'.Shop::addSqlAssociation('category', 'c').'
		LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND `id_lang` = '.(int) $idLang.' '.Shop::addSqlRestrictionOnLang('cl').')
		'.$sqlGroupsJoin.'
		WHERE `id_parent` = '.(int) $this->id.'
		'.($active ? 'AND `active` = 1' : '').'
		'.$sqlGroupsWhere.'
		GROUP BY c.`id_category`
		ORDER BY `level_depth` ASC, category_shop.`position` ASC');

        foreach ($result as &$row) {
            $row['id_image'] = Tools::file_exists_cache($this->image_dir.$row['id_category'].'.jpg') ? (int) $row['id_category'] : Language::getIsoById($idLang).'-default';            
            $row['id_imagesup'] = Tools::file_exists_cache($this->image_dir.$row['id_category'].'_sup.jpg') ? (int)$row['id_category'] .'_sup' : Language::getIsoById($idLang).'-default';
            $row['legend'] = 'no picture';
        }

        return $result;
    }
}
