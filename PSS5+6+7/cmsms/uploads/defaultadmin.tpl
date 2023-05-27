<script type="text/javascript">
$(document).ready(function(){
  $('img.viewhelp').click(function(){
    var n = $(this).attr('name');
    $('#'+n).dialog();
  });

  $(document).on('click','#clearlocks,#cssclearlocks',function(ev){
     var url = $(this).attr('href');
     ev.preventDefault();
     cms_confirm('{$mod->Lang('confirm_clearlocks')|escape:'javascript'}').done(function(){
       window.location = url;
     })
  });
});
</script>

{* always display templates tab *}
{tab_header name='templates' label=$mod->Lang('prompt_templates')}

{if $manage_stylesheets}
	{tab_header name='stylesheets' label=$mod->Lang('prompt_stylesheets')}
{/if}

{if $manage_designs}
	{tab_header name='designs' label=$mod->Lang('prompt_designs')}
{/if}

{if $manage_templates}
	{tab_header name='types' label=$mod->Lang('prompt_templatetypes')}
	{tab_header name='categories' label=$mod->Lang('prompt_categories')}
{/if}

{* templates tab displayed at all times*}
{tab_start name='templates'}
{include file='module_file_tpl:DesignManager;admin_defaultadmin_templates.tpl' scope='root'}

{if $manage_stylesheets}
	{tab_start name='stylesheets'}
	{include file='module_file_tpl:DesignManager;admin_defaultadmin_stylesheets.tpl' scope='root'}
{/if}

{if $manage_designs}
	{tab_start name='designs'}
	{include file='module_file_tpl:DesignManager;admin_defaultadmin_designs.tpl' scope='root'}
{/if}

{if $manage_templates}
	{tab_start name='types'}
	{include file='module_file_tpl:DesignManager;admin_defaultadmin_types.tpl' scope='root'}
	{tab_start name='categories'}
	{include file='module_file_tpl:DesignManager;admin_defaultadmin_categories.tpl' scope='root'}
{/if}

{tab_end}<div class="pageoptions">
  <a href="{cms_action_url action=edit_profile}">{admin_icon alt="{$mod->Lang('add_profile')}" title="{$mod->Lang('add_profile')}" icon='newobject.gif'} {$mod->Lang('add_profile')}</a>
</div>

<table class="pagetable">
    <thead>
      <tr>
        <th>{$mod->Lang('th_id')}</th>
        <th>{$mod->Lang('th_name')}</th>
        <th>{$mod->Lang('th_reltop')}</th>
        <th>{$mod->Lang('th_default')}</th>
        <th>{$mod->Lang('th_created')}</th>
        <th>{$mod->Lang('th_last_edited')}</th>
        <th class="pageicon">&nbsp;</th>
        <th class="pageicon">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
	{if !empty($profiles)}
		{foreach $profiles as $profile}
		  <tr class="{cycle values='row1,row2'}">
			{cms_action_url action=edit_profile pid=$profile->id assign='edit_url'}
			<td>{$profile->id}</td>
			<td><a href="{$edit_url}" title="{$mod->Lang('edit_profile')}">{$profile->name|cms_escape}</a></td>
		<td>{$profile->reltop}</td>
		<td>
		   {if $profile->id == $dflt_profile_id}
			 {admin_icon title=lang('yes') icon='true.gif'}
		   {else}
			 <a href="{cms_action_url action=setdflt_profile pid=$profile->id}">{admin_icon title=lang('no') icon='false.gif'}</a>
		   {/if}
		</td>
			<td>{$profile->create_date|cms_date_format}</td>
			<td>{$profile->modified_date|cms_date_format}</td>
			<td><a href="{$edit_url}" class="pageoptions">{admin_icon alt="{$mod->Lang('edit_profile')}" title="{$mod->Lang('edit_profile')}" icon='edit.gif'}</a></td>
			<td><a href="{cms_action_url action=delete_profile pid=$profile->id}" class="pageoptions">{admin_icon alt="{$mod->Lang('delete_profile')}" title="{$mod->Lang('delete_profile')}" icon='delete.gif'}</a></td>
		  </tr>
		{/foreach}
	{else}
		<tr><td colspan="8"><p class="information">{$mod->Lang('no_profiles')}</p></td></tr>
	{/if}
    </tbody>
</table>