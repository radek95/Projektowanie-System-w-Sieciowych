<?php

namespace app\controllers;
use PDOException;
use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $lista1 = array("K", "M");
	private $lista2 = array("brak", "niska", "umiarkowana", "wysoka", "bardzo wysoka");

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->plec = getFromRequest('plec',true,'Błędne wywołanie aplikacji');
		$this->form->waga = getFromRequest('waga',true,'Błędne wywołanie aplikacji');
		$this->form->wzrost = getFromRequest('wzrost',true,'Błędne wywołanie aplikacji');
		$this->form->wiek = getFromRequest('wiek',true,'Błędne wywołanie aplikacji');
		$this->form->aktywnosc = getFromRequest('aktywnosc',true,'Błędne wywołanie aplikacji');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->plec ) && isset ( $this->form->waga ) && isset ( $this->form->wzrost ) && isset ( $this->form->wiek ) && isset ( $this->form->aktywnosc ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		
		if (empty(trim($this->form->plec))) {
			getMessages()->addError('Podaj płeć. Wybierz 1 z opcji: K, M');
		}
		if (empty(trim($this->form->waga))) {
			getMessages()->addError('Wprowadź wagę.');
		}
		if (empty(trim($this->form->wzrost))) {
			getMessages()->addError('Wprowadź wzrost.');
		}
		if (empty(trim($this->form->wiek))) {
			getMessages()->addError('Wprowadź wiek');
		}
		if (empty(trim($this->form->aktywnosc))) {
			getMessages()->addError('Wprowadź swoja aktywność. Wybierz 1 z opcji: brak, niska, umiarkowana, wysoka, bardzo wysoka');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy waga, wzrost i wiek są liczbami całkowitymi i czy wiek jest liczba rzeczywista 
			if (! in_array($this->form->plec, $this->lista1)) {
				getMessages()->addError('Podanano niepoprawna płeć.');
			}
			if (! is_numeric ( $this->form->waga )) {
				getMessages()->addError('Waga nie jest liczbą całkowitą.');
			}
			if (! is_numeric ( $this->form->wzrost )) {
				getMessages()->addError('Wzrost nie jest liczbą całkowitą.');
			}
			if (! is_numeric ( $this->form->wiek )) {
				getMessages()->addError('Wiek nie jest liczbą całkowitą.');
			}
			if (! in_array($this->form->aktywnosc, $this->lista2)) {
				getMessages()->addError('Podanano niepoprawna aktywność.');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
			// 2. Zapis danych w bazie
			try {
				//2.1 Nowy rekord
				if (inRole('admin') && $this->form->wiek<18){
					getMessages()->addError('Tylko administrator może obliczac zapotrzebowanie kaloryczne dla osob niepelnoletnich');
				}else{
					//2.2 Edycja rekordu o danym ID
						getDB()->update("CalorityID", [
							"plec" => $this->form->plec,
							"waga" => $this->form->waga,
							"wzrost" => $this->form->wzrost,
							"wiek" => $this->form->wiek,
							"aktywnosc" => $this->form->aktywnosc,
							//wykonanie operacji
							"result" => $this->TDEE($this->BMR($this->form->plec, $this->form->waga, $this->form->wzrost, $this->form->wiek), $this->form->aktywnosc),
						]);
						getMessages()->addInfo('Wykonano obliczenia.');
				}
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
				
		}else{
			// Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Oblicz kalorycznosc swojej diety');
		$this->generateView();
	}

	//Funkcja obliczająca BMR
	public function BMR($plec, $waga, $wzrost, $wiek) {
		if ($plec == "M") {
			return 88.362 + (13.397 * $waga) + (4.799 * $wzrost) - (5.677 * $wiek);
		} else {
			return 447.593 + (9.247 * $waga) + (3.098 * $wzrost) - (4.330 * $wiek);
		}
	}
	
	// Funkcja obliczająca całkowite zapotrzebowanie kaloryczne
	public function TDEE($bmr, $aktywnosc) {
		switch ($aktywnosc) {
			case "brak":
				return $bmr * 1.2;
			case "niska":
				return $bmr * 1.375;
			case "umiarkowana":
				return $bmr * 1.55;
			case "wysoka":
				return $bmr * 1.725;
			case "bardzo wysoka":
				return $bmr * 1.9;
			default:
				return "Podana aktywnosc jest nieprawidlowa";
		}
	}
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('pwiek_title','Obliczenie kalorycznosci');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
