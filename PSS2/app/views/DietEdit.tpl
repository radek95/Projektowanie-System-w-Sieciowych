{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="name">diet_name</label>
            <input id="name" type="text" placeholder="diet_name" name="diet_name" value="{$form->diet_name}">
        </div>
		<div class="pure-control-group">
            <label for="surname">diet_type</label>
            <input id="surname" type="text" placeholder="diet_type" name="diet_type" value="{$form->diet_type}">
        </div>
		<div class="pure-control-group">
            <label for="birthdate">calority</label>
            <input id="calority" type="text" placeholder="calority" name="calority" value="{$form->calority}">
        </div>
        <div class="pure-control-group">
            <label for="number_of_dishes">calority</label>
            <input id="number_of_dishes" type="text" placeholder="number_of_dishes" name="number_of_dishes" value="{$form->number_of_dishes}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}dietList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="dietID" value="{$form->dietID}">
</form>	
</div>

{/block}
