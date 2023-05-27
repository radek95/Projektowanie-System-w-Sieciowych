<?php
/* Smarty version 3.1.31, created on 2023-05-27 01:32:15
  from "cms_template:TopMenu" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6471417fcd5799_56403341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc61b99303d26ae1c9f3d07addd29081d929407d' => 
    array (
      0 => 'cms_template:TopMenu',
      1 => '1685143930',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6471417fcd5799_56403341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\bc61b99303d26ae1c9f3d07addd29081d929407d_0.cms_template.TopMenu.php',
    'uid' => 'bc61b99303d26ae1c9f3d07addd29081d929407d',
    'call_name' => 'smarty_template_function_Nav_menu_1727639916471417fc6ff97_96090027',
  ),
));
?>

<?php if (isset($_smarty_tpl->tpl_vars['nodes']->value)) {?>

<div class="pure-menu-horizontal">
<ul class="pure-menu-list"
   <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['nodes']->value,'depth'=>0), true);?>

</ul>
</div>
<?php }
}
/* smarty_template_function_Nav_menu_1727639916471417fc6ff97_96090027 */
if (!function_exists('smarty_template_function_Nav_menu_1727639916471417fc6ff97_96090027')) {
function smarty_template_function_Nav_menu_1727639916471417fc6ff97_96090027($_smarty_tpl,$params) {
$params = array_merge(array('depth'=>1), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>

<div class="pure-menu pure-menu-horizontal">
    <a href="#" class="pure-menu-heading pure-menu-link">BRAND</a>
    <ul class="pure-menu-list">
        <li class="pure-menu-item">
            <a href="#" class="pure-menu-link">News</a>
        </li>
        <li class="pure-menu-item">
            <a href="#" class="pure-menu-link">Sports</a>
        </li>
        <li class="pure-menu-item">
            <a href="#" class="pure-menu-link">Finance</a>
        </li>
    </ul>
</div>

<?php
}}
/*/ smarty_template_function_Nav_menu_1727639916471417fc6ff97_96090027 */
}
