<?php
namespace Library;

class Pagination {
	public $pageSize = 10;
	public $items = array();
	public function __construct($items) {
		$this->items = $items;
	}
	
	public function getPage($num=0) {
		$start = $num*$this->pageSize;
		$end = $num*($this->pageSize+1)-1;
		if (count($this->items) < $start) {
			return array();
		}
		/*
		if (count($this->items) < $end) {
			$end = count($this->items)-1;
		}
		*/
		return array_slice($this->items, $start, $this->pageSize);
	}
	
	public function getPages() {
		return ceil(count($this->items)/$this->pageSize);
	}
}