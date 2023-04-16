<?php

namespace app\controllers;
use app\forms\OrderSearchForm;
use PDOException;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

class OrderListControl {

	private $form; //dane formularza wyszukiwania
	private $records; //rekordy pobrane z bazy danych

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new OrderSearchForm();
	}
		
	public function validate() {
		// 1. sprawdzenie, czy parametry zostały przekazane
		$this->form->orderID = getFromRequest('orderID',true,'Błędne wywołanie aplikacji');
		
		return ! getMessages()->isError();
	}
	
	public function action_orderList(){

		$page = getFromRequest('page');
		if (empty($page)) {
    	$page = 1;
		}
		$recordsPerPage = 20;

		// 1. Walidacja danych formularza (z pobraniem)
		
		$this->validate();
		
		// 2. Przygotowanie mapy z parametrami wyszukiwania 
		$search_params = []; //przygotowanie pustej struktury 
		if ( isset($this->form->orderID) && strlen($this->form->orderID) > 0) {
			$search_params['orderID[~]'] = $this->form->orderID.'%';
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
		$where ["ORDER"] = "orderID";
		//wykonanie zapytania

		$totalItems = getDB()->count("orders", $where);
		$totalPages = ceil($totalItems / $recordsPerPage);

		$paginator = new Paginator($totalItems, $recordsPerPage, $page, '/ordersList?page=(:num)');
		$paginator->setMaxPagesToShow(10);
		
		try{
			$allRecords = getDB()->select("orders", [
					"orderID",
					"asmount",
					"date_order",
					"order_adress",
				], array_merge($where, [
					"LIMIT" => [$recordsPerPage * ($page - 1), $recordsPerPage],
				]));
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		 
		// 4. Stronicowanie wyników
		$adapter = new ArrayAdapter($allRecords);
		$pagerfanta = new Pagerfanta($adapter);
		$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$pagerfanta->setCurrentPage($currentPage);
		$pagerfanta->setMaxPerPage(10);

		// 6. Wygeneruj widok
		//getSmarty()->assign('pagination', $pagination);
		getSmarty()->assign('orderSearchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->assign('orders',$this->records);  // lista rekordów z bazy danych
		getSmarty()->display('OrderList.tpl');
	}
	
}
