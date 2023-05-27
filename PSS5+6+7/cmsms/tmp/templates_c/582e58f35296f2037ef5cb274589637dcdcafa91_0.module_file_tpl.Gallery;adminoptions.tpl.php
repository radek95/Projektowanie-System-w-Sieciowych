<?php
/* Smarty version 3.1.31, created on 2023-05-26 23:50:05
  from "module_file_tpl:Gallery;adminoptions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6471298d1f3c63_88034098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '582e58f35296f2037ef5cb274589637dcdcafa91' => 
    array (
      0 => 'module_file_tpl:Gallery;adminoptions.tpl',
      1 => 1685137653,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6471298d1f3c63_88034098 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['startform']->value;?>

	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['urlprefix']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_urlprefix']->value;?>
<br /><?php echo $_smarty_tpl->tpl_vars['urlprefix_help']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['allowed_extensions']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_allowed_extensions']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_imagesize']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['imagesize']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['imagejpgquality']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_imagejpgquality']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['jpgquality_help']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['thumbjpgquality']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_thumbjpgquality']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['jpgquality_help']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['searchimages']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_searchimages']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['use_permissions']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_use_permissions']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['newgalleries_active']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_newgalleries_active']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['use_comment_wysiwyg']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_use_comment_wysiwyg']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['editdirdates']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_editdirdates']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['editfiledates']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_editfiledates']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['fe_folderpath']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_fe_folderpath']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['be_folderpath']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_be_folderpath']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['updatethumbs']->value;?>
:</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['input_updatethumbs']->value;?>
</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;?>
</p>
	</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;?>

<?php }
}
