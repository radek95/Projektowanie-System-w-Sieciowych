{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
        <div class="pure-control-group">
            <label for="password">password</label>
            <input id="password" type="text" placeholder="password" name="password" value="{$form->password}">
        </div>
		<div class="pure-control-group">
            <label for="name">name</label>
            <input id="name" type="text" placeholder="name" name="name" value="{$form->name}">
        </div>
		<div class="pure-control-group">
            <label for="surname">surname</label>
            <input id="surname" type="text" placeholder="surname" name="surname" value="{$form->surname}">
        </div>
		<div class="pure-control-group">
            <label for="address">address</label>
            <input id="address" type="text" placeholder="address" name="address" value="{$form->address}">
        </div>
		<div class="pure-control-group">
            <label for="email_address">email_address</label>
            <input id="email_address" type="text" placeholder="email_address" name="email_address" value="{$form->email_address}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}personList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
