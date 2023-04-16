{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}UserList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="UserID" name="UserID" value="{$searchForm->UserID}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}UserNew">+ Nowa osoba</a>
</div>	

<div class="pagination">
    <?php echo $paginator; ?>
</div>

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>UserID</th>
		<th>password</th>
		<th>name</th>
		<th>surname</th>
		<th>address</th>
		<th>address_email</th>
	</tr>
</thead>
<tbody>
{foreach $people as $p}
{strip}
	<tr>
		<td>{$p["UserID"]}</td>
		<td>{$p["password]}</td>
		<td>{$p["name"]}</td>
		<td>{$p["wsurname"]}</td>
		<td>{$p["address"]}</td>
		<td>{$p["email_address"]}</td>
		<td>{$p["result"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}UserEdit&id={$p['idUser']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}UserDelete&id={$p['idUser']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
