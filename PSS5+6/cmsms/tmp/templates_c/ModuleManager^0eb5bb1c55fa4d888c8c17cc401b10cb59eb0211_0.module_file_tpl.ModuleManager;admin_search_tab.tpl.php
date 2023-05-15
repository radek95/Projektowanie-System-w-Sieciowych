<?php
/* Smarty version 3.1.31, created on 2023-05-14 23:03:20
  from "module_file_tpl:ModuleManager;admin_search_tab.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_64614c98874b66_66984191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0eb5bb1c55fa4d888c8c17cc401b10cb59eb0211' => 
    array (
      0 => 'module_file_tpl:ModuleManager;admin_search_tab.tpl',
      1 => 1683496220,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64614c98874b66_66984191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'get_module_status_icon' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\ModuleManager^0eb5bb1c55fa4d888c8c17cc401b10cb59eb0211_0.module_file_tpl.ModuleManager;admin_search_tab.tpl.php',
    'uid' => '0eb5bb1c55fa4d888c8c17cc401b10cb59eb0211',
    'call_name' => 'smarty_template_function_get_module_status_icon_18209866164614c98854501_72075334',
  ),
));
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php';
if (!is_callable('smarty_modifier_localedate_format')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.localedate_format.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  <?php if (!$_smarty_tpl->tpl_vars['advanced']->value) {?>$('#advhelp').hide();<?php }?>
  $('#advanced').click(function(){
	$('#advhelp').toggle();
  });
});
<?php echo '</script'; ?>
>



<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('search_input');?>
:</legend>
<div class="pageoverflow">
  <p class="pagetext"><label for="searchterm"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('searchterm');?>
:</label></p>
  <p class="pageinput">
	<input id="searchterm" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
term" size="50" value="<?php echo $_smarty_tpl->tpl_vars['term']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_searchterm');?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('entersearchterm');?>
"/>&nbsp;
	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
advanced" value="0"/>
	<input type="checkbox" id="advanced" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
advanced" value="1" <?php if ($_smarty_tpl->tpl_vars['advanced']->value) {?>checked="checked"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_advancedsearch');?>
"/>&nbsp;<label for="advanced"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('prompt_advancedsearch');?>
</label>
	<span id="advhelp" style="display: none;"><br/><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('advancedsearch_help');?>
</span>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
	<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('submit');?>
"/>
  </p>
</div>
</fieldset>
<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['search_data']->value)) {?>
<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('search_results');?>
:</legend>
<table class="pagetable scrollable">
	<thead>
		<tr>
			<th></th>
			<th><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('nametext');?>
</th>
			<th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulelastversion');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('vertext');?>
</span></th>
			<th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulelastreleasedate');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('releasedate');?>
</span></th>
			
			<th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulestatus');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('statustext');?>
</span></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['search_data']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
		<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['entry']->value->age == 'new') {?>style="font-weight: bold;"<?php }?>>
			<td><?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'get_module_status_icon', array('status'=>$_smarty_tpl->tpl_vars['entry']->value->age), true);?>
</td>
			<td><span title="<?php echo smarty_modifier_cms_escape(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['entry']->value->description));?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->version;?>
</td>
			<td><?php echo smarty_modifier_localedate_format($_smarty_tpl->tpl_vars['entry']->value->date,'%x');?>
</td>
			
			<td><?php if ($_smarty_tpl->tpl_vars['entry']->value->candownload) {?>
				<span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleinstallupgrade');?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value->status;?>
</span>
			<?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['entry']->value->status;?>

			<?php }?>
			</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->depends_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduledepends');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('dependstxt');?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->help_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulehelp');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('helptxt');?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->about_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleabout');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('abouttxt');?>
</a></td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</tbody>
</table>
</fieldset>
<?php }
}
/* smarty_template_function_get_module_status_icon_18209866164614c98854501_72075334 */
if (!function_exists('smarty_template_function_get_module_status_icon_18209866164614c98854501_72075334')) {
function smarty_template_function_get_module_status_icon_18209866164614c98854501_72075334($_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
if ($_smarty_tpl->tpl_vars['status']->value == 'stale') {
echo $_smarty_tpl->tpl_vars['stale_img']->value;
} elseif ($_smarty_tpl->tpl_vars['status']->value == 'warn') {
echo $_smarty_tpl->tpl_vars['warn_img']->value;
} elseif ($_smarty_tpl->tpl_vars['status']->value == 'new') {
echo $_smarty_tpl->tpl_vars['new_img']->value;
}
}}
/*/ smarty_template_function_get_module_status_icon_18209866164614c98854501_72075334 */
}
