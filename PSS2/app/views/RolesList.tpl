{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}RoleList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="rolesID" name="rolesID" value="{$searchForm->rolesID}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}RoleNew">+ Nowa rola</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>rolesID</th>
		<th>role_name</th>
		<th>permissions</th>
		<th>role_description</th>
		<th>result</th>
	</tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["rolesID"]}</td>
		<td>{$p["role_name"]}</td>
		<td>{$p["permissions"]}</td>
		<td>{$p["role_description"]}</td>
		<td>{$p["result"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}RoleEdit&id={$p['idRole']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}RoleDelete&id={$p['idRole']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
