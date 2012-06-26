<?php
namespace Controller;

class Home extends BaseController {
	function index() {
		if ($_SERVER['HTTP_X_PJAX']) {
			$this->event_table();
			return;
		}
		$this->getTemplateTop();
		\Core\Router::loadView("home", array("controller"=>&$this));
		$this->getTemplateBottom();
		
	}
	
	public function event_table() {
		$page = $_GET['page']? (int)$_GET['page'] : 0;
		$e = \Model\Event::getAll();
		foreach ($e as $event) {
			$v = $event->getVenue();
			$event->lat = $v->lat;
			$event->lng = $v->lng;
		}
		$table = new \Library\Widget\DataTable($e);
		$table->paginationLink = "/home?action=event_table&page=";
		$table->page = $page;
		$table->addColumn("date", "Date and Time", array("\Library\CellRenderer", "iCalFrequency"));
		$table->addColumn("title", "Title", array("\Library\CellRenderer", "EventDescription"));
		$table->addHiddenColumn("lat", array("\Library\CellRenderer", "HiddenField"));
		$table->addHiddenColumn("lng", array("\Library\CellRenderer", "HiddenField"));
		
		$table->Render();
	}
}