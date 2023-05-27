<?php
/* Smarty version 3.1.31, created on 2023-05-26 23:50:04
  from "module_file_tpl:Gallery;adminfielddefs.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6471298cd88128_18490131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '558db7804a9e8a5ce5c7d260a191bbf5c95b7830' => 
    array (
      0 => 'module_file_tpl:Gallery;adminfielddefs.tpl',
      1 => 1685137653,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6471298cd88128_18490131 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['items']->value) > 0) {?>
<div class="pageoverflow">
  <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['newfielddeflink']->value;?>
</p>
</div>
<div class="pageoverflow">
<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['fielddef']->value;?>
 (<?php if ($_smarty_tpl->tpl_vars['items']->value[0]->dirfield) {
echo $_smarty_tpl->tpl_vars['galleries']->value;
} else {
echo $_smarty_tpl->tpl_vars['images']->value;
}?>)</th>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
</th>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['public']->value;?>
</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
if ($_smarty_tpl->tpl_vars['entry']->value->newtable) {?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['fielddef']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['images']->value;?>
)</th>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
</th>
      <th class="pagew25"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['public']->value;?>
</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
<?php }?>
    <tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->alias;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->type;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->public;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->moveup;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->movedown;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>



<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

</div>
<?php }?>

<div class="pageoverflow">
  <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['newfielddeflink']->value;?>
</p>
</div>
<?php }
}
