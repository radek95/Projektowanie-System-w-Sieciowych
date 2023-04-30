<?php

namespace app\controllers;

use app\forms\userEditForm;
use DateTime;
use PDOException;

class userEditCtrl {

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new userEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		$this->form->password = getFromRequest('password',true,'Błędne wywołanie aplikacji');
		$this->form->name = getFromRequest('name',true,'Błędne wywołanie aplikacji');
		$this->form->surname = getFromRequest('surname',true,'Błędne wywołanie aplikacji');
		$this->form->address = getFromRequest('adress',true,'Błędne wywołanie aplikacji');
		$this->form->email_address = getFromRequest('email_address',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->password))) {
			getMessages()->addError('Wprowadź haslo');
		}
		if (empty(trim($this->form->name))) {
			getMessages()->addError('Wprowadź imię');
		}
		if (empty(trim($this->form->surname))) {
			getMessages()->addError('Wprowadź nazwisko');
		}
		if (empty(trim($this->form->name))) {
			getMessages()->addError('Wprowadź adres');
		}
		if (empty(trim($this->form->surname))) {
			getMessages()->addError('Wprowadź adres email');
		}
		
		if ( getMessages()->isError() ) return false;
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy użytkowników (parametr jest wymagany)
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_userNew(){
		$this->generateView();
	}
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_userEdit(){
		// 1. walidacja id użytkownika do edycji
		if ( $this->validateEdit() ){
			try {
				// 2. odczyt z bazy danych użytkownika o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("user", "*",[
					"userID" => $this->form->id
				]);
				// 2.1 jeśli użytkownik istnieje to wpisz dane do obiektu formularza
				$this->form->id = $record['userID'];
				$this->form->name = $record['name'];
				$this->form->surname = $record['surname'];
				$this->form->password = $record['password'];
				$this->form->address = $record['address'];
				$this->form->address_email = $record['address_email'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		
		// 3. Wygenerowanie widoku
		$this->generateView();		
	}

	public function action_userDelete(){		
		// 1. walidacja id użytkownika do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("user",[
					"userID" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy użytkowników
		forwardTo('userList');		
	}

	public function action_userSave() {
		$result = []; // tablica z wynikiem
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// weryfikacja poprawności otrzymanych danych
			if ($this->validateSave()) {
				try {
					// stworzenie asocjacyjnej tablicy z danymi zamowienia
					$user = [
							"password" => $this->form->password,
							"name" => $this->form->name,
							"surname" => $this->form->surname,
							"address" => $this->form->address,
							"address_email" => $this->form->address_email
						];
					// zapis diety w bazie danych
					if ($this->form->userID == '') {
						getDB()->insert("users", $user);
						$result["message"] = "Pomyślnie dodano użytkownika.";
					} else {
						getDB()->update("users", $user, [
							"userID" => $this->form->userID,
						]);
						$result["message"] = "Pomyślnie zaktualizowano użytkownika.";
					}
				} catch (PDOException $e) {
					$result["error"] = "Wystąpił błąd podczas zapisywania użytkownika.";
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
		getSmarty()->display('userEdit.tpl');
	}
}
 