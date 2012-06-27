<?php
namespace Controller;

class Home extends BaseController {
	function index() {
		if ($_SERVER['HTTP_X_PJAX']) {
			switch ($_GET['action']) {
				case "event_table":
					$this->event_table();
					break;
				case "contact_container":
					$this->contact_container();
					break;
			}
			return;
		}
		$this->getTemplateTop();
		\Core\Router::loadView("home", array("controller"=>&$this));
		$this->getTemplateBottom();
	}
	
	public function saveURL() {
		$params = array("event_table", "contact_container");
		foreach ($params as $param) {
			if (isset($_GET[$param])) {
				$this->getURLParams[$param] = $_GET[$param];
			}
		}
	}
	
	public function event_table() {
		$this->saveURL();
		$page = $_GET['event_table']? (int)$_GET['event_table'] : 0;
		$e = \Model\Event::getAll();
		foreach ($e as $event) {
			$v = $event->getVenue();
			$event->lat = $v->lat;
			$event->lng = $v->lng;
		}
		$table = new \Library\Widget\DataTable($e);
		$table->paginationLink = array(&$this, "generatePaginationLink");
		$table->page = $page;
		$table->addColumn("date", "Date and Time", array("\Library\CellRenderer", "iCalFrequency"));
		$table->addColumn("title", "Title", array("\Library\CellRenderer", "EventDescription"));
		$table->addHiddenColumn("lat", array("\Library\CellRenderer", "HiddenField"));
		$table->addHiddenColumn("lng", array("\Library\CellRenderer", "HiddenField"));
		
		$table->Render();
	}
	
	public function generatePaginationLink($page, $obj) {
		$param = $this->getURLParams;
		if (is_a($obj, "\Library\Widget\DataTable")) {
			$param['event_table'] = $page;
			$param['action'] = "event_table";
		} else if (is_a($obj, "\Library\Widget\WidgetPaginationContainer")) {
			$param['contact_container'] = $page;
			$param['action'] = "contact_container";
		}
		return "/home?".http_build_query($param);
	}
	
	public function contact_container() {
		$this->saveURL();
		$page = $_GET['contact_container']? (int)$_GET['contact_container'] : 0;
		$cards = array();
		foreach (\Model\Group::getAll() as $g) {
			$w = new \Library\Widget\ContactCard();
			$w->addCSSClass("org");
			$w->setTitle($g->name);
			$w->setLink("/group/".$g->id);
			$w->addSubline($g->description);
		}
		$table = new \Library\Widget\ContactCardContainer($e);
		$table->paginationLink = "/home?action=contact_container";
		$table->page = $page;
		
	}
}