<?php

namespace app\controllers;
use app\forms\RolesSearchForm;
use PDOException;
use JasonGrimes\Paginator;

class RolesListControl {

	private $form; //dane formularza wyszukiwania
	private $records; //rekordy pobrane z bazy danych

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new RolesSearchForm();
	}
		
	public function validate() {
		// 1. sprawdzenie, czy parametry zostały przekazane
		$this->form->rolesID = getFromRequest('rolesID',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	public function action_rolesList(){

		$page = getFromRequest('page');
		if (empty($page)) {
    	$page = 1;
		}
		$recordsPerPage = 20;

		// 1. Walidacja danych formularza (z pobraniem)
		$this->validate();
		
		// 2. Przygotowanie mapy z parametrami wyszukiwania 
		$search_params = []; //przygotowanie pustej struktury 
		if ( isset($this->form->rolesID) && strlen($this->form->rolesID) > 0) {
			$search_params['rolesID[~]'] = $this->form->rolesID.'%';
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
		$where ["ORDER"] = "rolesID";
		//wykonanie zapytania

		$totalItems = getDB()->count("roles", $where);
		$totalPages = ceil($totalItems / $recordsPerPage);

		$paginator = new Paginator($totalItems, $recordsPerPage, $page, '/rolesList?page=(:num)');
		$paginator->setMaxPagesToShow(10);
		
		try{
			$this->records = getDB()->select("roles", [
					"rolesID",
					"role_name",
					"permissions",
					"role_description",
				], array_merge($where, [
					"LIMIT" => [$recordsPerPage * ($page - 1), $recordsPerPage],
				]));
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		
		// 4. wygeneruj widok
		getSmarty()->assign('RolesSearchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->assign('roles',$this->records);  // lista rekordów z bazy danych
		getSmarty()->display('RolesList.tpl');
	}
	
}
