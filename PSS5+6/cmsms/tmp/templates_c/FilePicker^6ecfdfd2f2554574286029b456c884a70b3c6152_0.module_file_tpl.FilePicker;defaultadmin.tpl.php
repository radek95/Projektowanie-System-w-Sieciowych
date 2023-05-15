<?php
/* Smarty version 3.1.31, created on 2023-05-14 15:50:59
  from "module_file_tpl:FilePicker;defaultadmin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6460e74315f4c9_71246307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ecfdfd2f2554574286029b456c884a70b3c6152' => 
    array (
      0 => 'module_file_tpl:FilePicker;defaultadmin.tpl',
      1 => 1683496216,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6460e74315f4c9_71246307 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_action_url')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_action_url.php';
if (!is_callable('smarty_function_admin_icon')) require_once 'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.admin_icon.php';
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_date_format.php';
?>
<div class="pageoptions">
  <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'edit_profile'),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile')),'icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile');?>
</a>
</div>

<table class="pagetable">
    <thead>
      <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_id');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_name');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_reltop');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_default');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_created');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_last_edited');?>
</th>
        <th class="pageicon">&nbsp;</th>
        <th class="pageicon">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
	<?php if (!empty($_smarty_tpl->tpl_vars['profiles']->value)) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value, 'profile');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['profile']->value) {
?>
		  <tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
			<?php echo smarty_cms_function_cms_action_url(array('action'=>'edit_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id,'assign'=>'edit_url'),$_smarty_tpl);?>

			<td><?php echo $_smarty_tpl->tpl_vars['profile']->value->id;?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['profile']->value->name);?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['profile']->value->reltop;?>
</td>
		<td>
		   <?php if ($_smarty_tpl->tpl_vars['profile']->value->id == $_smarty_tpl->tpl_vars['dflt_profile_id']->value) {?>
			 <?php echo smarty_function_admin_icon(array('title'=>lang('yes'),'icon'=>'true.gif'),$_smarty_tpl);?>

		   <?php } else { ?>
			 <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'setdflt_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('title'=>lang('no'),'icon'=>'false.gif'),$_smarty_tpl);?>
</a>
		   <?php }?>
		</td>
			<td><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['profile']->value->create_date);?>
</td>
			<td><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['profile']->value->modified_date);?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" class="pageoptions"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile')),'icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
			<td><a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'delete_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id),$_smarty_tpl);?>
" class="pageoptions"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile')),'icon'=>'delete.gif'),$_smarty_tpl);?>
</a></td>
		  </tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	<?php } else { ?>
		<tr><td colspan="8"><p class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('no_profiles');?>
</p></td></tr>
	<?php }?>
    </tbody>
</table><?php }
}
