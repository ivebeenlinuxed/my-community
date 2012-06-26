<?php
namespace Library\Widget;

class DataTable extends PageWidget {
	public $data;
	public $id;
	public $page = 0;
	public $pageSize = 10;
	
	public $paginationLink = "";
	
	public $columns = array();
	public $hidden_columns = array();
	
	public function __construct($data) {
		$this->data = $data;
		$this->id = "eventtable_".rand(1000, 9999);
	}
	
	public function Render() {
		if ($this->paginationLink != "") {
			$pagination = new \Library\Pagination($this->data);
			$pagination->pageSize = $this->pageSize;
			$data = $pagination->getPage($this->page);
		} else {
			$data = $this->data;
		}
		\Core\Router::loadView("widget/data_table", array("data"=>$data, "pagination"=>$pagination, "controller"=>&$this));
	}
	
	public function addColumn($name, $label=false, $renderer=false) {
		$this->columns[] = array($name, $label, $renderer);
	}
	
	public function addHiddenColumn($name, $renderer) {
		$this->hidden_columns[] = array($name, $renderer);
	}
	
	public function getCellTitle($col) {
		return $this->columns[$col][1] === false?
		$this->columns[$col][0]
		:
		$this->columns[$col][1];
	}
	
	public function renderCell($data, $col) {
		$dbCol = $this->columns[$col][0];
		if ($this->columns[$col][2] === false) {
			return $data->$dbCol;
		} else {
			return call_user_func_array($this->columns[$col][2], array($data, $dbCol));
		}
	}
	
	public function renderHiddenCell($data, $col) {
		$dbCol = $this->hidden_columns[$col][0];
		return call_user_func_array($this->hidden_columns[$col][1], array($data, $dbCol));
	}
}