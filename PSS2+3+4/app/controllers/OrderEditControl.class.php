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

	public function action_orderSave() {
		$result = []; // tablica z wynikiem
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// weryfikacja poprawności otrzymanych danych
			if ($this->validateSave()) {
				try {
					// stworzenie asocjacyjnej tablicy z danymi zamowienia
					$order = [
						"amount" => $this->form->amount,
						"date_order" => $this->form->date_order,
						"order_adress" => $this->form->order_adress
						];
					// zapis diety w bazie danych
					if ($this->form->orderID == '') {
						getDB()->insert("orders", $order);
						$result["message"] = "Pomyślnie dodano zamówienie.";
					} else {
						getDB()->update("orders", $order, [
							"orderID" => $this->form->orderID,
						]);
						$result["message"] = "Pomyślnie zaktualizowano zamówienie.";
					}
				} catch (PDOException $e) {
					$result["error"] = "Wystąpił błąd podczas zapisywania zamówienia.";
					if (getConf()->debug) {
						$result["error_details"] = $e->getMessage();
					}
				}
			} else {
				// błędy walidacji formularza
				$result["error"] = "Niepoprawnie wypełniony formularz.";
				$result["errors"] = getMessages()->getErrors();
			}
		} else {
			// żądanie HTTP innego typu niż POST
			$result["error"] = "Niewłaściwy typ żądania HTTP.";
		}
	
		// wysłanie wyniku w postaci JSON
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('OrderEdit.tpl');
	}
}
 