<?php
/* Smarty version 3.1.32, created on 2018-09-02 19:51:27
  from 'C:\wamp64\www\prestapropre\admin885h2x6zf\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b8c231fd98574_90515275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa33e407a9b38e3f691d15a4fc500b8ab57151a0' => 
    array (
      0 => 'C:\\wamp64\\www\\prestapropre\\admin885h2x6zf\\themes\\default\\template\\content.tpl',
      1 => 1535900228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8c231fd98574_90515275 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
