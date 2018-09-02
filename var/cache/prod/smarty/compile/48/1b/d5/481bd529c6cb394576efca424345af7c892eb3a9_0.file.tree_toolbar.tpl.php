<?php
/* Smarty version 3.1.32, created on 2018-09-02 19:51:27
  from 'C:\wamp64\www\prestapropre\admin885h2x6zf\themes\default\template\helpers\tree\tree_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8c231f1e6f02_00065915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '481bd529c6cb394576efca424345af7c892eb3a9' => 
    array (
      0 => 'C:\\wamp64\\www\\prestapropre\\admin885h2x6zf\\themes\\default\\template\\helpers\\tree\\tree_toolbar.tpl',
      1 => 1535900229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8c231f1e6f02_00065915 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</div>
<?php }
}
