<?php

namespace app\controllers;

use app\forms\RolesEditForm;
use DateTime;
use PDOException;

class RolesEditControl {

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new RolesEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->rolesID = getFromRequest('rolesID',true,'Błędne wywołanie aplikacji');
		$this->form->role_name = getFromRequest('role_name',true,'Błędne wywołanie aplikacji');
		$this->form->permissions = getFromRequest('permissions',true,'Błędne wywołanie aplikacji');
		$this->form->role_description = getFromRequest('role_description',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->role_name))) {
			getMessages()->addError('Wprowadź nazwe roli');
		}
		if (empty(trim($this->form->permissions))) {
			getMessages()->addError('Wprowadź uprawnienia osoby o danej roli');
		}
		if (empty(trim($this->form->role_description))) {
			getMessages()->addError('Wprowadź opis roli');
		}

		if ( getMessages()->isError() ) return false;
		
		return ! getMessages()->isError();
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy ról (parametr jest wymagany)
		$this->form->rolesID = getFromRequest('rolesID',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_RolesNew(){
		$this->generateView();
	}
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_RolesEdit(){
		// 1. walidacja id roli do edycji
		if ( $this->validateEdit() ){
			try {
				// 2. odczyt z bazy danych roli o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("Roles", "*",[
					"rolesID" => $this->form->rolesID
				]);
				// 2.1 jeśli rola istnieje to wpisz dane do obiektu formularza
				$this->form->rolesID = $record['rolesID'];
				$this->form->role_name = $record['role_name'];
				$this->form->permissions = $record['permissions'];
				$this->form->birthdate = $record['birthdate'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		
		// 3. Wygenerowanie widoku
		$this->generateView();		
	}

	public function action_RolesDelete(){		
		// 1. walidacja id roli do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("roles",[
					"rolesID" => $this->form->rolesID
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy ról
		forwardTo('RolesList');		
	}

	public function action_RolesSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->rolesID == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("roles");
					if ($count <= 20) {
						getDB()->insert("roles", [
							"role_name" => $this->form->role_name,
							"permissions" => $this->form->permissions,
							"birthdate" => $this->form->birthdate
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("roles", [
						"role_name" => $this->form->role_name,
						"permissions" => $this->form->permissions,
						"birthdate" => $this->form->birthdate
					], [ 
						"rolesID" => $this->form->rolesID
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy ról (w ramach tego samego żądania http)
			forwardTo('RolesList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('RolesEdit.tpl');
	}
}
 