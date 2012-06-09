<?php
namespace Library\Widget;

class EventTable extends PageWidget {
	public $events;
	public $id;
	public $page = 0;
	public $pageSize = 10;
	
	public $paginationLink = "";
	
	public function __construct($events) {
		$this->events = $events;
		$this->id = "eventtable_".rand(1000, 9999);
	}
	
	public function Render() {
		if ($this->paginationLink != "") {
			$pagination = new \Library\Pagination($this->events);
			$pagination->pageSize = $this->pageSize;
			$events = $pagination->getPage($this->page);
		} else {
			$events = $this->events;
		}
		\Core\Router::loadView("widget/event_table", array("events"=>$events, "pagination"=>$pagination, "current_page"=>$this->page, "link"=>$this->paginationLink, "id"=>$this->id));
	}
	
	
	
}