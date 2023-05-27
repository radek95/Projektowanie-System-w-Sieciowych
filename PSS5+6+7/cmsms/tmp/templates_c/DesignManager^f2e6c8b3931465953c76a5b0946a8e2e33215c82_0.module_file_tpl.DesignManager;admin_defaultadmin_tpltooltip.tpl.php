<?php
/* Smarty version 3.1.31, created on 2023-05-27 00:21:43
  from "module_file_tpl:DesignManager;admin_defaultadmin_tpltooltip.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_647130f7bbacf6_26927677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2e6c8b3931465953c76a5b0946a8e2e33215c82' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_tpltooltip.tpl',
      1 => 1683496212,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647130f7bbacf6_26927677 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_admin_user')) require_once 'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_admin_user.php';
if (!is_callable('smarty_modifier_localedate_format')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.localedate_format.php';
if (!is_callable('smarty_modifier_relative_time')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.relative_time.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_date_format.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php';
if (!is_callable('smarty_modifier_summarize')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.summarize.php';
if ($_smarty_tpl->tpl_vars['template']->value->locked()) {
$_smarty_tpl->_assignInScope('lock', $_smarty_tpl->tpl_vars['template']->value->get_lock());
if ($_smarty_tpl->tpl_vars['template']->value->lock_expired()) {?><strong style="color: red;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('msg_steal_lock');?>
</strong><br/><?php }?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockedby');?>
:</strong> <?php echo smarty_function_cms_admin_user(array('uid'=>$_smarty_tpl->tpl_vars['lock']->value['uid']),$_smarty_tpl);?>
<br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockedsince');?>
:</strong> <?php echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['lock']->value['created'],'%x H:i');?>
<br/><?php if ($_smarty_tpl->tpl_vars['lock']->value['expires'] < time()) {?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockexpired');?>
:</strong> <span style="color: red;"><?php echo smarty_modifier_relative_time($_smarty_tpl->tpl_vars['lock']->value['expires']);?>
</span><?php } else { ?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_lockexpires');?>
:</strong> <?php echo smarty_modifier_relative_time($_smarty_tpl->tpl_vars['lock']->value['expires']);
}
} else { ?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['template']->value->get_name();?>
 <em>(<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
)</em><br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_owner');?>
:</strong> <?php echo smarty_function_cms_admin_user(array('uid'=>$_smarty_tpl->tpl_vars['template']->value->get_owner_id()),$_smarty_tpl);?>
<br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created');?>
:</strong> <?php echo smarty_modifier_cms_escape(smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['template']->value->get_created()));?>
<br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified');?>
:</strong> <?php echo smarty_modifier_relative_time($_smarty_tpl->tpl_vars['template']->value->get_modified());
$_smarty_tpl->_assignInScope('tmp', $_smarty_tpl->tpl_vars['template']->value->get_description());
if ($_smarty_tpl->tpl_vars['tmp']->value != '') {?><br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</strong> <?php echo smarty_modifier_summarize(smarty_modifier_cms_escape(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['tmp']->value)));
}
}
}
}
