<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$filepickertitle}</title>
<link rel="stylesheet" type="text/css" href="{$rooturl}/FileManager/filepicker.css" />
{literal}
<script language="javascript" type="text/javascript">

function ChooseFile(filename) {
{/literal}
  var URL = filename;

  opener.document.{$formname}.{$fieldname}.value=filename;
   // close popup window
  window.close();
{literal}
}
{/literal}
</script>
</head>
<body>
<div id="full-fp">

<div class="header">

{if isset($messagefail) && $messagefail!=""}
<fieldset class="fp-error">
<legend>{$errortext}</legend>
{$messagefail}
</fieldset>
{/if}

{if isset($messagesuccess) && $messagesuccess!=""}
<fieldset class="fp-sucess">
<legend>{$successtext}</legend>
{$messagesuccess}
</fieldset>
{/if}

<fieldset>
<legend>{$youareintext}</legend>
<h2><img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/dir.png" title="{$subdir}" alt="{$subdir}" />/{$subdir}</h2>
</fieldset>

{if isset($formstart) && $formstart!=''}
<fieldset>
<legend>{$fileoperations}</legend>
{$formstart}

<table width="100%">
<tr>
<td align="left">
{$fileuploadtext}: {$fileuploadinput}{$fileuploadsubmit}
</td>
<td align="right">
{$newdirtext}: {$newdirinput}{$newdirsubmit}
</td>
</tr>
</table>

{$formend}
</fieldset>
{/if}

</div>
<div class="filelist">
<table width="100%">
<thead>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td width="1%" align="right" style="white-space:nowrap;"><b>{$dimensionstext}</b></td>
<td width="1%" align="right" style="white-space:nowrap;"><b>{$sizetext}</b></td>
</tr>
</thead>
  {foreach from=$files item=file}
  <tr>
  {if $file->isdir=="1"}
    <td width="1%" align="center"><img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/dir.png" title="Dir" alt="Dir" /></td> <!-- diricon?? -->
    <td>{$file->namelink} </td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  {else}
    <td align="right">
    {if $filepickerstyle=="filename"}
      {if $file->isimage=="1"}
      <img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/png.png" title="{$file->name}" alt="{$file->name}" />
      {else}
      <img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/{$file->fileicon}" title="{$file->name}" alt="{$file->name}" />
      {/if}
    {else}
      <div class="thumbnail">
      <a title="{$file->name}" href='#' onclick='ChooseFile("{$file->fullurl}")'>
      {if isset($file->thumbnail) && $file->thumbnail!=''}

        {$file->thumbnail}
      {else}

        {if $file->isimage=="1"}
        <img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/png.png" title="{$file->name}" alt="{$file->name}" />
        {else}
        <img src="{$rooturl}/modules/FileManager/icons/themes/{$admintheme}/extensions/{$file->fileicon}" title="{$file->name}" alt="{$file->name}" />
        {/if}
      {/if}
      </a>
      </div>
    {/if}
    </td>
    <td align="left">
       <a title="{$file->name}" href='#' onclick='ChooseFile("{$file->fullurl}")'>
     {$file->name}
       </a>
    </td>
    <td width="1%" align="right">{$file->dimensions}</td>
    <td width="1%" align="right">{$file->size}</td>
  {/if}
  </tr>
  {/foreach}
<tr><td colspan="4">&nbsp;</td></tr>
</table>
</div>
{*
<div class="rightbox">
Toolbox, what should go here?

</div>
*}
</div><!--end full-fp-->
</body>
</html>
<!doctype html>
<html lang="en" data-cmsfp-inst="{$inst}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
		<title>{$mod->Lang('filepickertitle')}</title>
		<link rel="stylesheet" type="text/css" href="{$cssurl}">
	</head>
	{strip}
	<body class="cmsms-filepicker">
		<div id="full-fp">
			<div class="filepicker-navbar">
				<div class="filepicker-navbar-inner">
					<div class="filepicker-view-option">
						<p>
							<span class="js-trigger view-list filepicker-button" title="{$mod->Lang('switchlist')}"><i class="cmsms-fp-th-list"></i></span>
							<span class="js-trigger view-grid filepicker-button active" title="{$mod->Lang('switchgrid')}"><i class="cmsms-fp-th"></i></span>
						</p>
					</div>
					<div class="filepicker-options">
						<p>
							{if $profile->can_mkdir}
							<span class="filepicker-button make-dir filepicker-cmd" data-cmd="mkdir" title="{$mod->Lang('create_dir')}">
								<span class="filepicker-icon-stack">
									<i class="cmsms-fp-folder-close filepicker-icon-stack-1x"></i>
									<i class="cmsms-fp-folder-plus filepicker-icon-stack-1x">+</i>
								</span>
							</span>
							{/if}
                                                        {if $profile->can_upload}
							<span class="filepicker-button upload-file btn-file">
							   <i class="cmsms-fp-upload"></i> {$mod->Lang('upload')}
							   <input id="filepicker-file-upload" type="file" multiple="" title="{$mod->Lang('select_upload_files')}">
							</span>
                                                        {/if}
						</p>
					</div>
					{$type=$profile->type|default:'any'}{if $type == 'any'}
					<div class="filepicker-type-filter">
						<p><span class="filepicker-option-title">{$mod->Lang('filterby')}:&nbsp;</span>
							<span class="js-trigger filepicker-button" data-fb-type='image' title="{$mod->Lang('switchimage')}"><i class="cmsms-fp-picture"></i></span>&nbsp;
							<span class="js-trigger filepicker-button" data-fb-type='video' title="{$mod->Lang('switchvideo')}"><i class="cmsms-fp-film"></i></span>&nbsp;
							<span class="js-trigger filepicker-button" data-fb-type='audio' title="{$mod->Lang('switchaudio')}"><i class="cmsms-fp-music"></i></span>&nbsp;
							<span class="js-trigger filepicker-button" data-fb-type='archive' title="{$mod->Lang('switcharchive')}"><i class="cmsms-fp-zip"></i></span>&nbsp;
							<span class="js-trigger filepicker-button" data-fb-type='file' title="{$mod->Lang('switchfiles')}"><i class="cmsms-fp-file"></i></span>&nbsp;
							<span class="js-trigger filepicker-button active" data-fb-type='reset' title="{$mod->Lang('switchreset')}"><i class="cmsms-fp-reorder"></i></span>
						</p>
					</div>
					{/if}
				</div>
			</div>
			<div class="filepicker-container">
				<div id="filepicker-progress" class="filepicker-breadcrumb">
					<p class="filepicker-breadcrumb-text" title="{$mod->Lang('youareintext')}:"><i class="cmsms-fp-folder-open filepicker-icon"></i> {$cwd_for_display}</p>
                                        <p id="filepicker-progress-text" style="display: none;"></p>
				</div>
				<div id="filelist">
					<ul class="filepicker-list" id="filepicker-items">
						<li class="filepicker-item filepicker-item-heading">
							<div class="filepicker-thumb no-background">&nbsp;</div>
							<div class="filepicker-file-information">
								<h4 class="filepicker-file-title">{$mod->Lang('filename')}</h4>
							</div>
							<div class="filepicker-file-details">
								<span class="filepicker-file-dimension">
									{$mod->Lang('dimension')}
								</span>
								<span class="filepicker-file-size">
									{$mod->Lang('size')}
								</span>
								<span class="filepicker-file-ext">
									{$mod->Lang('type')}
								</span>
							</div>
						</li>
						{foreach $files as $file}
						<li class="filepicker-item{if $file.isdir} dir{else} {$file.filetype}{/if}" title="{if $file.isdir}{$mod->Lang('changedir')}: {/if}{$file.name}" data-fb-ext='{$file.ext}' data-fb-fname="{$file.name}">
							<div class="filepicker-thumb{if ($profile->show_thumbs && isset($file.thumbnail) && $file.thumbnail != '') || $file.isdir || ($profile->show_thumbs && $file.is_thumb)} no-background{/if}">
							{if !$file.isdir && $profile->can_delete && !$file.isparent}
								<span class="filepicker-delete filepicker-cmd cmsms-fp-delete" data-cmd="del" title="{$mod->Lang('delete')}">
									<i class="cmsms-fp-close"></i>
								</span>
							{/if}
							{if $file.isdir}
								<a class="icon-no-thumb" href="{$file.chdir_url}" title="{if $file.isdir}{$mod->Lang('changedir')}: {/if}{$file.name}"><i class="cmsms-fp-folder-close"></i></a>
							{elseif $profile->show_thumbs && isset($file.thumbnail) && $file.thumbnail != ''}
								<a class="filepicker-file-action js-trigger-insert" href="{$file.relurl}" title="{$file.name}">{$file.thumbnail}</a>
							{elseif $profile->show_thumbs && $file.is_thumb}
								<a class="filepicker-file-action js-trigger-insert" href="{$file.relurl}" title="{$file.name}"><img src="{$file.fullurl}" alt="{$file.name}"/></a>
							{else}
								<a class="filepicker-file-action js-trigger-insert icon-no-thumb" title="{$file.name}" href="{$file.relurl}">
									{if $file.filetype == 'image'}
										<i class="cmsms-fp-picture"></i>
									{elseif $file.filetype == 'video'}
										<i class="cmsms-fp-facetime-video"></i>
									{elseif $file.filetype == 'audio'}
										<i class="cmsms-fp-music"></i>
									{elseif $file.filetype == 'archive'}
										<i class="cmsms-fp-zip"></i>
									{else}
										<i class="cmsms-fp-file"></i>
									{/if}
								</a>
							{/if}


							</div>
							<div class="filepicker-file-information">
								<h4 class="filepicker-file-title">
								{if $file.isdir}
									<a class="filepicker-dir-action" href="{$file.chdir_url}" title="{if $file.isdir}{$mod->Lang('changedir')}: {/if}{$file.name}">{$file.name}</a>
								{else}
									<a class="filepicker-file-action js-trigger-insert" href="{$file.relurl}" title="{if $file.isdir}{$mod->Lang('changedir')}: {/if}{$file.name}" data-fb-filetype='{$file.filetype}'>{$file.name}</a>
								{/if}
								</h4>
							</div>
							<div class="filepicker-file-details visuallyhidden">
								<span class="filepicker-file-dimension">
									{$file.dimensions}
								</span>
								<span class="filepicker-file-size">
									{if !$file.isdir}{$file.size}{/if}
								</span>
								<span class="filepicker-file-ext">
									{if !$file.isdir}{$file.ext}{else}dir{/if}
								</span>
								{if !$file.isdir && $profile->can_delete && !$file.isparent}
									<span class="filepicker-delete filepicker-cmd cmsms-fp-delete" data-cmd="del" title="{$mod->Lang('delete')}">
										<i class="cmsms-fp-close"></i>
									</span>
								{/if}
							</div>
						</li>
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</body>
	{/strip}
	{cms_jquery exclude='ui_touch_punch,nestedSortable,json,migrate,cms_autorefresh,cms_dirtyform,cms_hiersel,cms_lock,cms_filepicker'}
        <script type="text/javascript" src="{$mod->GetModuleURLPath()}/js/ext/jquery.fileupload.js"></script>
        <script type="text/javascript" src="{$mod->GetModuleURLPath()}/lib/js/cmsms_filebrowser/filebrowser.js"></script>
  	<script type="text/javascript">
          $(document).ready(function(){
            var options = {};
            options.cmd_url = '{cms_action_url action=ajax_cmd forjs=1}&showtemplate=false';
            options.cwd = '{$cwd}';
	    options.sig = '{$sig}';
	    options.inst = '{$inst}';
            options.lang = {$lang_js};
            options.prefix = '{$profile->prefix}';
            var filepicker = new CMSFileBrowser(options);
          })
  	</script>

  	<div id="mkdir_dlg" title="{$mod->Lang('title_mkdir')}" style="display: none;" data-oklbl="{$mod->Lang('ok')}">
		<div class="dlg-options">
       	<label>{$mod->Lang('name')}:</label> <input type="text" id="fld_mkdir" size="40"/>
    	</div>
  	</div>
</html>
