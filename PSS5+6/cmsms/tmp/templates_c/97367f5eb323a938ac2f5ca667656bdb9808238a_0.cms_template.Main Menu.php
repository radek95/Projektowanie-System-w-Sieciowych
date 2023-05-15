<?php
/* Smarty version 3.1.31, created on 2023-05-14 23:47:37
  from "cms_template:Main Menu" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_646156f96a5094_82170431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97367f5eb323a938ac2f5ca667656bdb9808238a' => 
    array (
      0 => 'cms_template:Main Menu',
      1 => '1684100851',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646156f96a5094_82170431 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\97367f5eb323a938ac2f5ca667656bdb9808238a_0.cms_template.Main Menu.php',
    'uid' => '97367f5eb323a938ac2f5ca667656bdb9808238a',
    'call_name' => 'smarty_template_function_Nav_menu_1729855127646156f9633380_63671933',
  ),
));
?>


<?php if (isset($_smarty_tpl->tpl_vars['nodes']->value)) {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['nodes']->value,'depth'=>0), true);?>

<?php }
}
/* smarty_template_function_Nav_menu_1729855127646156f9633380_63671933 */
if (!function_exists('smarty_template_function_Nav_menu_1729855127646156f9633380_63671933')) {
function smarty_template_function_Nav_menu_1729855127646156f9633380_63671933($_smarty_tpl,$params) {
$params = array_merge(array('depth'=>1), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?><div class="pure-menu pure-menu-horizontal"><a href="#" class="pure-menu-heading pure-menu-link">BRAND</a><ul class="pure-menu-list"><li class="pure-menu-item"><a href="#" class="pure-menu-link">Glowna</a></li><li class="pure-menu-item"><a href="#" class="pure-menu-link">Diety</a></li><li class="pure-menu-item"><a href="#" class="pure-menu-link">Zamowienia</a></li><li class="pure-menu-item"><a href="#" class="pure-menu-link">Kalkulatorkalorycznosci</a></li></ul></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ul><?php
}}
/*/ smarty_template_function_Nav_menu_1729855127646156f9633380_63671933 */
}
