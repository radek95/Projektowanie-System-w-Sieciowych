{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}RoleSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="role_name">role_name</label>
            <input id="role_name" type="text" placeholder="role_name" name="role_name" value="{$form->role_name}">
        </div>
		<div class="pure-control-group">
            <label for="permissions">permissions</label>
            <input id="permissions" type="text" placeholder="permissions" name="permissions" value="{$form->permissions}">
        </div>
		<div class="pure-control-group">
            <label for="role_description">role_description</label>
            <input id="role_description" type="text" placeholder="role_description" name="role_description" value="{$form->role_description}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}RoleList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
