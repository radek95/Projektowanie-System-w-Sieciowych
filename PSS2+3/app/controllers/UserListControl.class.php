<?php

namespace app\controllers;
use app\forms\UserSearchForm;
use PDOException;
use JasonGrimes\Paginator;

class ListCtrl {

	private $form; //dane formularza wyszukiwania
	private $records; //rekordy pobrane z bazy danych

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new UserSearchForm();
	}
		
	public function validate() {
		// 1. sprawdzenie, czy parametry zostały przekazane
		$this->form->userID = getFromRequest('userID',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	public function action_UserList(){

		$page = getFromRequest('page');
		if (empty($page)) {
    	$page = 1;
		}
		$recordsPerPage = 20;

		// 1. Walidacja danych formularza (z pobraniem)
		$this->validate();
		
		// 2. Przygotowanie mapy z parametrami wyszukiwania 
		$search_params = []; //przygotowanie pustej struktury 
		if ( isset($this->form->userID) && strlen($this->form->userID) > 0) {
			$search_params['userID[~]'] = $this->form->userID.'%';
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
		$where ["ORDER"] = "userID";
		//wykonanie zapytania

		$totalItems = getDB()->count("users", $where);
		$totalPages = ceil($totalItems / $recordsPerPage);

		$paginator = new Paginator($totalItems, $recordsPerPage, $page, '/userList?page=(:num)');
		$paginator->setMaxPagesToShow(10);
		
		try{
			$this->records = getDB()->select("users", [
					"userID",
					"password",
					"wname",
					"surname",
					"address",
					"address_email"
				], array_merge($where, [
					"LIMIT" => [$recordsPerPage * ($page - 1), $recordsPerPage],
				]));
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		
		// 4. wygeneruj widok
		getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->assign('user',$this->records);  // lista rekordów z bazy danych
		getSmarty()->display('UserList.tpl');
	}
	
}
