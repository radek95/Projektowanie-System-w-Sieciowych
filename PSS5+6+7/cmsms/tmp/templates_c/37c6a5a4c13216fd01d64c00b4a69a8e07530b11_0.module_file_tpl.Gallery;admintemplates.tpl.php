<?php
/* Smarty version 3.1.31, created on 2023-05-26 23:50:04
  from "module_file_tpl:Gallery;admintemplates.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6471298cf3fe07_79341824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37c6a5a4c13216fd01d64c00b4a69a8e07530b11' => 
    array (
      0 => 'module_file_tpl:Gallery;admintemplates.tpl',
      1 => 1685137653,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6471298cf3fe07_79341824 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageoverflow">
  <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['newtemplatelink']->value;?>
</p>
</div>
<div class="pageoverflow">
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
      <th class="pagew50"><?php echo $_smarty_tpl->tpl_vars['nameprompt']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['versionprompt']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['aboutprompt']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['defaultprompt']->value;?>
</th>
      <th class="pagew10"><?php echo $_smarty_tpl->tpl_vars['visibleprompt']->value;?>
</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">Export</th>
    </tr>
  </thead>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
   <tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->name;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->version;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->about;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->default;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->visible;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->copylink;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->export;?>
</td>
   </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>
</div>
<div class="pageoverflow">
  <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['newtemplatelink']->value;?>
</p>
</div>

<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_importxml']->value;?>
</legend>

<div class="pageoverflow">
<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['importxmlnote']->value;?>
</p>
</div>

<div class="pageoverflow">
<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_importxml']->value;?>
:</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['importxml']->value;?>

</p>
</div>

<div class="pageoverflow">
<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_overwrite']->value;?>
:</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['overwrite']->value;?>

</p>
</div>

<div class="pageoverflow">
<p class="pagetext">&nbsp;</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['submit']->value;?>

</p>
</div>

</fieldset>
<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<div class="pageoverflow">
  &nbsp;
</div>

<?php echo $_smarty_tpl->tpl_vars['formstart2']->value;?>

<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['title_singleimg_template']->value;?>
</legend>

<div class="pageoverflow">
<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_singleimg_template']->value;?>
:</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['singleimg_template']->value;?>

</p>
</div>

<div class="pageoverflow">
<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_singleimg_template_html']->value;?>
:</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['singleimg_template_html']->value;?>

</p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['availablevariables']->value;?>
: <a href="#" onclick="togglecollapse('variablesinfo'); return false;"><?php echo $_smarty_tpl->tpl_vars['availablevariableslink']->value;?>
</a></p>
</div>
<div id="variablesinfo" style="display: none;">
<div class="pageoverflow">
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['availablevariableslist']->value;?>
</p>
</div>
</div>

<div class="pageoverflow">
<p class="pagetext">&nbsp;</p>
<p class="pageinput">
<?php echo $_smarty_tpl->tpl_vars['submit2']->value;?>

</p>
</div>

</fieldset>
<?php echo $_smarty_tpl->tpl_vars['formend2']->value;
}
}
