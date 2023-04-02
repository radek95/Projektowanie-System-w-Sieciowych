{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}dietList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="dietID" name="dietID" value="{$searchForm->dietID}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}dietNew">+ Nowa dieta</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>dietID</th>
		<th>diet_name</th>
		<th>diet_type</th>
		<th>calority</th>
		<th>number_of_dishes</th>
	</tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["dietID"]}</td>
		<td>{$p["kwota"]}</td>
		<td>{$p["liczba lat"]}</td>
		<td>{$p["wysokosc oprocentowania"]}</td>
		<td>{$p["result"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}dietEdit&id={$p['iddiet']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}dietDelete&id={$p['iddiet']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
