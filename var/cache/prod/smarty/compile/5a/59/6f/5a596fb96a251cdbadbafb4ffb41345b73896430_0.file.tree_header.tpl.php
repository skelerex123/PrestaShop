<?php
/* Smarty version 3.1.32, created on 2018-09-02 19:51:27
  from 'C:\wamp64\www\prestapropre\admin885h2x6zf\themes\default\template\helpers\tree\tree_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8c231f2299d1_05261657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a596fb96a251cdbadbafb4ffb41345b73896430' => 
    array (
      0 => 'C:\\wamp64\\www\\prestapropre\\admin885h2x6zf\\themes\\default\\template\\helpers\\tree\\tree_header.tpl',
      1 => 1535900229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8c231f2299d1_05261657 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl ) );
}?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['toolbar']->value;
}?>
</div>
<?php }
}
