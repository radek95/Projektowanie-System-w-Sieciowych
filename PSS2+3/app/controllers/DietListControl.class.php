<?php

namespace app\controllers;
use app\forms\DietSearchForm;
use PDOException;
use JasonGrimes\Paginator;

class DietListControl {

	private $form; //dane formularza wyszukiwania
	private $records; //rekordy pobrane z bazy danych

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new DietSearchForm();
 
	}
		
	public function validate() {
		// 1. sprawdzenie, czy parametry zostały przekazane
		$this->form->diet_name = getFromRequest('diet_name',true,'Błędne wywołanie aplikacji');
		$this->form->diet_type = getFromRequest('diet_type',true,'Błędne wywołanie aplikacji');
		$this->form->calority = getFromRequest('calority',true,'Błędne wywołanie aplikacji');
		$this->form->number_of_dishes = getFromRequest('number_of_dishes',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}
	
	public function action_dietList(){

		$page = getFromRequest('page');
		if (empty($page)) {
    	$page = 1;
		}
		$recordsPerPage = 20;

		// 1. Walidacja danych formularza (z pobraniem)
		$this->validate();
		
		// 2. Przygotowanie mapy z parametrami wyszukiwania 
		$search_params = []; //przygotowanie pustej struktury 
		if ( isset($this->form->recordID) && strlen($this->form->recordID) > 0) {
			$search_params['recordID[~]'] = $this->form->recordID.'%';
		}
		
		// 3. Pobranie listy rekordów z bazy danych
		
		//przygotowanie frazy where na wypadek większej liczby parametrów
		$num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "AND" => &$search_params ];
		} else {
			$where = &$search_params;
		}
		//dodanie frazy sortującej po ID
		$where ["ORDER"] = "dietID";
		//wykonanie zapytania

		$totalItems = getDB()->count("diets", $where);
		$totalPages = ceil($totalItems / $recordsPerPage);

		$paginator = new Paginator($totalItems, $recordsPerPage, $page, '/dietList?page=(:num)');
		$paginator->setMaxPagesToShow(10);
		
		try{
			$this->records = getDB()->select("diets", [
					"dietID",
					"diet_name",
					"diet_type",
					"calority",
					"number_of_dishes",
				], array_merge($where, [
					"LIMIT" => [$recordsPerPage * ($page - 1), $recordsPerPage],
				]));
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		 
		// 4. wygeneruj widok
		getSmarty()->assign('dietSearchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->assign('people',$this->records);  // lista rekordów z bazy danych
		getSmarty()->display('DietList.tpl');
	}
	
}
