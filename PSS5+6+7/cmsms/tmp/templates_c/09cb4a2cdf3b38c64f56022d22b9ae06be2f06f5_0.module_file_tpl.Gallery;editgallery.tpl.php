<?php
/* Smarty version 3.1.31, created on 2023-05-26 23:50:08
  from "module_file_tpl:Gallery;editgallery.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_647129904fc122_52764265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09cb4a2cdf3b38c64f56022d22b9ae06be2f06f5' => 
    array (
      0 => 'module_file_tpl:Gallery;editgallery.tpl',
      1 => 1685137653,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647129904fc122_52764265 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once 'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php';
if (!empty($_smarty_tpl->tpl_vars['uploadimages']->value)) {?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['module_url']->value;?>
/lib/plupload/plupload.full.min.js"><?php echo '</script'; ?>
>

<?php }?>

<div class="pageoverflow">
<h3><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</h3>
</div>
<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>
<div class="hidden" id="sort"><?php echo $_smarty_tpl->tpl_vars['hidden']->value;?>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['directoryname']->value)) {?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_directoryname']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['directoryname']->value;?>
</p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_parent']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['moveto']->value;?>
</p>
</div>
<?php }?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_gallerytitle']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['gallerytitle']->value;?>
</p>
</div>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_comment']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['gallerycomment']->value;?>
</p>
</div>

<?php if (!empty($_smarty_tpl->tpl_vars['gallerydate']->value)) {?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_date']->value;?>
:</p>
  <p class="pageinput datepicker"><?php echo $_smarty_tpl->tpl_vars['gallerydate']->value;?>
</p>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['customfields']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['field']->value['fieldhtml'];?>
</p>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['prompt_template']->value)) {?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_template']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['template']->value;?>
</p>
</div>
<?php } else {
echo $_smarty_tpl->tpl_vars['template']->value;?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['prompt_editors']->value)) {?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_editors']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['editors']->value;?>
</p>
</div>
<?php } else {
echo $_smarty_tpl->tpl_vars['editors']->value;?>

<?php }?>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['prompt_hideparentlink']->value;?>
:</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['hideparentlink']->value;?>
</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;
echo $_smarty_tpl->tpl_vars['cancel']->value;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['unsort']->value;
echo $_smarty_tpl->tpl_vars['updatethumbs']->value;?>
</p>
	<p>&nbsp;</p>
</div>

<?php if (!empty($_smarty_tpl->tpl_vars['uploadimages']->value)) {?>
<div class="pageoverflow" id="gallerycontainer">
  <?php echo $_smarty_tpl->tpl_vars['addgallery']->value;?>
 &nbsp;  &nbsp; <?php echo $_smarty_tpl->tpl_vars['uploadimages']->value;?>

</div>

<div class="pageoverflow" id="filelist">
	Your browser doesn't have Flash or HTML5 support.
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>
	<table id="gtable" cellspacing="0" class="pagetable">
		<thead>
		<tr>
			<th class="pageicon">#</th>
			<th><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['filedate']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['cover']->value;?>
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

		<tr id="<?php echo $_smarty_tpl->tpl_vars['entry']->value->fileid;?>
" class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->fileid;?>
</td>
			<td><?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->editurl)) {?><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->editurl;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edittext;?>
" title="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edittext;?>
"><?php }?><span style="display: block; width:96px; height:72px; background: url(<?php echo $_smarty_tpl->tpl_vars['entry']->value->thumburl;?>
) no-repeat center; overflow:hidden;">&nbsp;</span><?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->editurl)) {?></a><?php }?></td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->filename_input;?>
<br /><?php echo $_smarty_tpl->tpl_vars['entry']->value->title_input;?>
</td>
			<td><?php if (!$_smarty_tpl->tpl_vars['entry']->value->isdir) {
echo $_smarty_tpl->tpl_vars['entry']->value->comment_input;
}?></td>
			<td class="datepicker"><?php echo $_smarty_tpl->tpl_vars['entry']->value->filedate_input;?>
</td>
			<td class="pagepos" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['entry']->value->defaultlink;?>
</td>
			<td class="pagepos" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['entry']->value->activelink;
echo $_smarty_tpl->tpl_vars['entry']->value->active;?>
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

<div class="pageoptions">
	<div style="margin-top: 0; float: right; text-align: right">
		<?php echo $_smarty_tpl->tpl_vars['prompt_multiaction']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['multiaction']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['multiactionsubmit']->value;?>
<br /><div style="margin-top:6px;"><?php echo $_smarty_tpl->tpl_vars['moveto']->value;?>
</div>
	</div>

	<div class="pageoverflow">
		<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['submit']->value;
echo $_smarty_tpl->tpl_vars['cancel']->value;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['unsort']->value;
echo $_smarty_tpl->tpl_vars['updatethumbs']->value;?>
</p>
	</div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['itemcount']->value === 0) {?>
	<h4><?php echo $_smarty_tpl->tpl_vars['nofilestext']->value;?>
</h4>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>


<?php echo '<script'; ?>
 type="text/javascript">
<?php if (!empty($_smarty_tpl->tpl_vars['uploadimages']->value)) {?>
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles', // you can pass in id...
		container: document.getElementById('gallerycontainer'), // ... or DOM Element itself
		url : '<?php echo $_smarty_tpl->tpl_vars['upload_url']->value;?>
',
		flash_swf_url : 'lib/plupload/Moxie.swf',
		multipart : true,
		multipart_params: {
			uploaddir : '<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
'
		},

		filters: {
			max_file_size : '<?php echo $_smarty_tpl->tpl_vars['file_size_limit']->value;?>
',
			mime_types: [{
				title : 'Image files', 
				extensions : '<?php echo $_smarty_tpl->tpl_vars['file_types']->value;?>
'
			}]
		},

<?php if (!empty($_smarty_tpl->tpl_vars['maximagewidth']->value) && !empty($_smarty_tpl->tpl_vars['maximageheight']->value)) {?>
		resize: {
			width: <?php echo $_smarty_tpl->tpl_vars['maximagewidth']->value;?>
,
			height: <?php echo $_smarty_tpl->tpl_vars['maximageheight']->value;?>
,
			quality: <?php echo $_smarty_tpl->tpl_vars['imagejpgquality']->value;?>

		},
<?php }?>

		init: {
			PostInit: function() {
				document.getElementById('filelist').innerHTML = '';
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
				});
				setTimeout(uploader.start(), 500);
			},

			UploadProgress: function(up, file) {
				document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			},
			
			UploadComplete: function() {
				// refresh page after 2 seconds
				var url = location.href + '<?php echo $_smarty_tpl->tpl_vars['msg_complete']->value;?>
';
				setTimeout('window.location.href = \'' + url + '\'', 2000);
			},

			Error: function(up, err) {
				document.getElementById('filelist').innerHTML += '<div id="' + err.file.id + '">' + err.file.name + ' (Error #' + err.code + ": " + err.message + ')</div>';
			}
		}
	});

	uploader.init();

<?php }?>
	$(function() {
		$( ".datepicker input" ).datepicker({
			dateFormat: 'yy-mm-dd',
			showOtherMonths: true,
			selectOtherMonths: true
		});
	});
<?php echo '</script'; ?>
>
<?php }
}
