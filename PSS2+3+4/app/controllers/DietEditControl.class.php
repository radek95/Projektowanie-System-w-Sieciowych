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

	public function action_dietSave() {
		$result = []; // tablica z wynikiem
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// weryfikacja poprawności otrzymanych danych
			if ($this->validateSave()) {
				try {
					// stworzenie asocjacyjnej tablicy z danymi diety
					$diet = [
						"diet_name" => $this->form->diet_name,
						"diet_type" => $this->form->diet_type,
						"calority" => $this->form->calority,
						"number_of_dishes" => $this->form->number_of_dishes,
					];
	
					// zapis diety w bazie danych
					if ($this->form->dietID == '') {
						getDB()->insert("diets", $diet);
						$result["message"] = "Pomyślnie dodano dietę.";
					} else {
						getDB()->update("diets", $diet, [
							"dietID" => $this->form->dietID,
						]);
						$result["message"] = "Pomyślnie zaktualizowano dietę.";
					}
				} catch (PDOException $e) {
					$result["error"] = "Wystąpił błąd podczas zapisywania diety.";
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
		getSmarty()->display('DietEdit.tpl');
	}
}
 