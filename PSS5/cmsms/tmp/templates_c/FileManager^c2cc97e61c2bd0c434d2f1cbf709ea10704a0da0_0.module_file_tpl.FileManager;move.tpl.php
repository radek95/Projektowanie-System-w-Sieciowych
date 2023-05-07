<?php
/* Smarty version 3.1.31, created on 2023-05-08 00:19:04
  from "module_file_tpl:FileManager;move.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_645823d8a46a89_12807591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2cc97e61c2bd0c434d2f1cbf709ea10704a0da0' => 
    array (
      0 => 'module_file_tpl:FileManager;move.tpl',
      1 => 1683496214,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_645823d8a46a89_12807591 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php';
?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_move');?>
</h3>
<p class="pageoverflow"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_move');?>
:</p>

<?php echo $_smarty_tpl->tpl_vars['startform']->value;?>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('itemstomove');?>
:</p>
  <p class="pageinput">
    <ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selall']->value, 'one');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
?>
      <li><?php echo $_smarty_tpl->tpl_vars['one']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </ul>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="destdir"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('move_destdir');?>
:</label></p>
  <p class="pageinput">
    <select id="destdir" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
destdir">
    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['dirlist']->value,'selected'=>$_smarty_tpl->tpl_vars['cwd']->value),$_smarty_tpl);?>

    </select>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('move');?>
"/>
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
  </p>
</div>
<?php echo $_smarty_tpl->tpl_vars['endform']->value;
}
}
