<?php

namespace app\controllers;
use app\forms\OrderEditForm;
use DateTime;
use PDOException;

class OrderEditControl {

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new OrderEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->orderID = getFromRequest('orderID',true,'Błędne wywołanie aplikacji');
		$this->form->amount = getFromRequest('amount',true,'Błędne wywołanie aplikacji');
		$this->form->date_order = getFromRequest('date_order',true,'Błędne wywołanie aplikacji');
		$this->form->order_adress = getFromRequest('order_adress',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->amount))) {
			getMessages()->addError('Wprowadź kwote');
		}
		if (empty(trim($this->form->date_order))) {
			getMessages()->addError('Wprowadź date zamowienia');
		}
		if (empty(trim($this->form->order_adress))) {
			getMessages()->addError('Wprowadź adres zamowienia');
		}

		if ( getMessages()->isError() ) return false;
		
		// 2. sprawdzenie poprawności przekazanych parametrów
		
		$d = DateTime::createFromFormat('Y-m-d', $this->form->date_order);
		if ( $d === false ){
			getMessages()->addError('Zły format daty');
		}
		
		return ! getMessages()->isError();
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy zamowien (parametr jest wymagany)
		$this->form-> orderID = getFromRequest('orderID',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_OrderNew(){
		$this->generateView();
	}
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_OrderEdit(){
		// 1. walidacja id zamowienia do edycji
		if ( $this->validateEdit() ){
			try {
				// 2. odczyt z bazy danych zamowienia o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("orders", "*",[
					"orderID" => $this->form->orderID,
				]);
				// 2.1 jeśli zamówienie istnieje to wpisz dane do obiektu formularza
				$this->form->orderID = $record['orderID'];
				$this->form->amount = $record['amount'];
				$this->form->date_order = $record['date_order'];
				$this->form->order_adress = $record['order_adress'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		
		// 3. Wygenerowanie widoku
		$this->generateView();		
	}

	public function action_orderDelete(){		
		// 1. walidacja id zamowienia do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("orders",[
					"orderID" => $this->form->orderID
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy zamowien
		forwardTo('OrderList');		
	}

	public function action_orderSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->orderID == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("order");
					if ($count <= 20) {
						getDB()->insert("order", [
							"amount" => $this->form->amount,
							"date_order" => $this->form->date_order,
							"order_adress" => $this->form->order_adress
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("order", [
						"amount" => $this->form->amount,
						"date_order" => $this->form->date_order,
						"order_adress" => $this->form->order_adress,
					], [ 
						"orderID" => $this->form->orderID,
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy zamowien (w ramach tego samego żądania http)
			forwardTo('OrderList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('OrderEdit.tpl');
	}
}
 