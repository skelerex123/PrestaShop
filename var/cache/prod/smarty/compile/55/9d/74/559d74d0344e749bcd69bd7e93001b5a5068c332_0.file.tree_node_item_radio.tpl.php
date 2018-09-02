<?php
/* Smarty version 3.1.32, created on 2018-09-02 19:51:27
  from 'C:\wamp64\www\prestapropre\admin885h2x6zf\themes\default\template\helpers\tree\tree_node_item_radio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8c231f250c22_20054350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '559d74d0344e749bcd69bd7e93001b5a5068c332' => 
    array (
      0 => 'C:\\wamp64\\www\\prestapropre\\admin885h2x6zf\\themes\\default\\template\\helpers\\tree\\tree_node_item_radio.tpl',
      1 => 1535900229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8c231f250c22_20054350 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="tree-item<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled']) && $_smarty_tpl->tpl_vars['node']->value['disabled'] == true) {?> tree-item-disable<?php }?>">
	<span class="tree-item-name">
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled']) && $_smarty_tpl->tpl_vars['node']->value['disabled'] == true) {?> disabled="disabled"<?php }?> />
		<i class="tree-dot"></i>
		<label class="tree-toggler"><?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</label>
	</span>
</li>
<?php }
}
