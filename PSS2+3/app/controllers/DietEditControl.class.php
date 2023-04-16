<?php

namespace app\controllers;
use app\forms\DietEditForm;
use PDOException;

class DietEditCtrl{

	private $form; //dane formularza

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new DietEditForm();
	}

	//validacja danych przed zapisem (nowe dane lub edycja)
	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->dietID = getFromRequest('dietID',true,'Błędne wywołanie aplikacji');
		$this->form->diet_name = getFromRequest('diet_name',true,'Błędne wywołanie aplikacji');
		$this->form->diet_type = getFromRequest('diet_type',true,'Błędne wywołanie aplikacji');
		$this->form->calority = getFromRequest('calority',true,'Błędne wywołanie aplikacji');
		$this->form->number_of_dishes = getFromRequest('number_of_dishes',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->diet_name))) {
			getMessages()->addError('Wprowadź nazwe diety');
		}
		if (empty(trim($this->form->diet_type))) {
			getMessages()->addError('Wprowadź typ diety');
		}
		if (empty(trim($this->form->calority))) {
			getMessages()->addError('Wprowadź kalorycznosc diety');
		}
		if (empty(trim($this->form->number_of_dishes))) {
			getMessages()->addError('Wprowadź liczbę dań');
		}

		if ( getMessages()->isError() ) return false;
		
		return ! getMessages()->isError();
	}

	//validacja danych przed wyswietleniem do edycji
	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy diet (parametr jest wymagany)
		$this->form->dietID = getFromRequest('dietID',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_dietNew(){
		$this->generateView();
	}
	
	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'
	public function action_dietEdit(){
		// 1. walidacja id diety do edycji
		if ( $this->validateEdit() ){
			try {
				// 2. odczyt z bazy danych diety o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("diets", "*",[
					"dietID" => $this->form->dietID,
				]);
				// 2.1 jeśli dieta istnieje to wpisz dane do obiektu formularza
				$this->form->dietID = $record['dietID'];
				$this->form->diet_name = $record['diet_name'];
				$this->form->diet_type = $record['diet_type'];
				$this->form->calority = $record['calority'];
				$this->form->number_of_dishes = $record['number_of_dishes'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		
		// 3. Wygenerowanie widoku
		$this->generateView();		
	}

	public function action_dietDelete(){		
		// 1. walidacja id diety do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("diets",[
					"dietID" => $this->form->dietID,
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy diet
		forwardTo('DietList');		
	}

	public function action_dietSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->dietID == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("diets");
					if ($count <= 20) {
						getDB()->insert("diet", [
							"diet_name" => $this->form->diet_name,
							"diet_type" => $this->form->diet_type,
							"calority" => $this->form->calority,
							"number_of_dishesbirthdate" => $this->form->number_of_dishes,
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("diets", [
						"diet_name" => $this->form->diet_name,
						"diet_type" => $this->form->diet_type,
						"calority" => $this->form->calority,
						"number_of_dishesbirthdate" => $this->form->number_of_dishes,
					], [ 
						"dietID" => $this->form->dietID,
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy diet (w ramach tego samego żądania http)
			forwardTo('DietList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('DietEdit.tpl');
	}
}
 