<?php
/* Smarty version 3.1.31, created on 2023-05-26 23:50:04
  from "module_file_tpl:Gallery;admingalleries.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6471298cc28624_91698143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3aa86b5e18db34de896620621935b6f915d9b325' => 
    array (
      0 => 'module_file_tpl:Gallery;admingalleries.tpl',
      1 => 1685137653,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6471298cc28624_91698143 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php';
?>
<div class="pageoverflow">
	<?php echo $_smarty_tpl->tpl_vars['addgallery']->value;?>

</div>
<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>

	<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

	<table id="gtree" cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th><?php echo $_smarty_tpl->tpl_vars['gallerytitle']->value;?>
</th>
				<th class="pagew60"><?php echo $_smarty_tpl->tpl_vars['dirtag']->value;?>
</th>
				<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['active']->value;?>
</th>			
				<th class="pageicon">&nbsp;</th>
				<th class="pageicon">&nbsp;</th>
				<th class="pageicon"><input id="selectall" type="checkbox" /></th>
			</tr>
		</thead>
		<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
		<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

			
			<tr id="node-<?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
"<?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->gidclass)) {?> class="<?php echo trim($_smarty_tpl->tpl_vars['entry']->value->gidclass);?>
"<?php }?>>
				<td class="tfile"><?php echo $_smarty_tpl->tpl_vars['entry']->value->titlename;?>
</td>
				<td class="tfile"><?php echo $_smarty_tpl->tpl_vars['entry']->value->dirtag;?>
</td>
				<td class="pagepos" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['entry']->value->activelink;?>
</td>			
				<td class="pagepos" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
				<td class="pagepos" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
				<td class="checkbox"><?php echo $_smarty_tpl->tpl_vars['entry']->value->imgselect;?>
</td>
			</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</tbody>
	</table>

	<div style="margin-top: 0; float: right; text-align: right">
		<?php echo $_smarty_tpl->tpl_vars['prompt_multiaction']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['multiaction']->value;?>

	</div>

	<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<?php } else { ?>
	<h4><?php echo $_smarty_tpl->tpl_vars['nogalleriestext']->value;?>
</h4>
<?php }?>

<div class="pageoverflow">
	&nbsp;
</div><?php }
}
