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

	public function action_roleSave() {
		$result = []; // tablica z wynikiem
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// weryfikacja poprawności otrzymanych danych
			if ($this->validateSave()) {
				try {
					// stworzenie asocjacyjnej tablicy z danymi zamowienia
					$role = [
							"role_name" => $this->form->role_name,
							"permissions" => $this->form->permissions,
							"birthdate" => $this->form->birthdate
						];
					// zapis diety w bazie danych
					if ($this->form->roleID == '') {
						getDB()->insert("roles", $role);
						$result["message"] = "Pomyślnie dodano rolę.";
					} else {
						getDB()->update("roles", $role, [
							"roleID" => $this->form->roleID,
						]);
						$result["message"] = "Pomyślnie zaktualizowano rolę.";
					}
				} catch (PDOException $e) {
					$result["error"] = "Wystąpił błąd podczas zapisywania roli.";
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
		getSmarty()->display('RolesEdit.tpl');
	}
}
 