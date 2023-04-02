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

	public function action_userSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("user");
					if ($count <= 20) {
						getDB()->insert("users", [
							"password" => $this->form->password,
							"name" => $this->form->name,
							"surname" => $this->form->surname,
							"address" => $this->form->address,
							"address_email" => $this->form->address_email
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("users", [
						"password" => $this->form->password,
						"name" => $this->form->name,
						"surname" => $this->form->surname,
						"address" => $this->form->address,
						"address_email" => $this->form->address_email
					], [ 
						"userID" => $this->form->id
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy użytkowników (w ramach tego samego żądania http)
			forwardTo('userList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla bnhhn cfddfswidoku
		getSmarty()->display('userEdit.tpl');
	}
}
 