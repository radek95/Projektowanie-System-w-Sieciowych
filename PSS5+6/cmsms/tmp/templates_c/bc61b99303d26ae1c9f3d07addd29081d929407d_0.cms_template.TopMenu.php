<?php
/* Smarty version 3.1.31, created on 2023-05-15 01:50:33
  from "cms_template:TopMenu" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_646173c958dd79_02554593',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc61b99303d26ae1c9f3d07addd29081d929407d' => 
    array (
      0 => 'cms_template:TopMenu',
      1 => '1684108229',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646173c958dd79_02554593 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'Nav_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\bc61b99303d26ae1c9f3d07addd29081d929407d_0.cms_template.TopMenu.php',
    'uid' => 'bc61b99303d26ae1c9f3d07addd29081d929407d',
    'call_name' => 'smarty_template_function_Nav_menu_764687775646173c95575a5_23034143',
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
/* smarty_template_function_Nav_menu_764687775646173c95575a5_23034143 */
if (!function_exists('smarty_template_function_Nav_menu_764687775646173c95575a5_23034143')) {
function smarty_template_function_Nav_menu_764687775646173c95575a5_23034143($_smarty_tpl,$params) {
$params = array_merge(array('depth'=>1), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?>

     <li class="pure-menu-item
        <?php if (isset($_smarty_tpl->tpl_vars['node']->value->children)) {?>
           pure-menu-has-children pure-menu-allow-hover
        <?php }?>
        ">
        <a href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
" class="pure-menu-link"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a>

        <?php if (isset($_smarty_tpl->tpl_vars['node']->value->children)) {?>
          <ul class="pure-menu-children">
             <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'Nav_menu', array('data'=>$_smarty_tpl->tpl_vars['node']->value->children,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);?>

          </ul>
        <?php }?>
      </li>

  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php
}}
/*/ smarty_template_function_Nav_menu_764687775646173c95575a5_23034143 */
}
