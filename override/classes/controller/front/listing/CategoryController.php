<?php

use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;

class CategoryController extends CategoryControllerCore
{
    protected function getTemplateVarCategory()
    {
  
        $category = $this->objectPresenter->present($this->category);
        $category['image'] = $this->getImage(
            $this->category,
            $this->category->id_image
        );
        $category['imagesup'] = $this->getImage(
            $this->category,
            $this->category->id_image."_sup"
        );
        
        return $category;
    }
}