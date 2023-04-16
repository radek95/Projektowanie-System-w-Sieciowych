{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="amount">amount</label>
            <input id="amount" type="text" placeholder="amount" name="amount" value="{$form->amount}">
        </div>
		<div class="pure-control-group">
            <label for="date_order">date_order</label>
            <input id="date_order" type="text" placeholder="date_order" name="date_order" value="{$form->date_order}">
        </div>
		<div class="pure-control-group">
            <label for="order_adress">data ur.</label>
            <input id="order_adress" type="text" placeholder="data ur." name="order_adress" value="{$form->order_adress}">
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
