<?php
namespace Controller;

class Event {
	public function index($id=null, $action="view") {
		if ($id == null || !\Model\Event::Exists($id)) {
			header("Location: /");
		}
		
		\Core\Router::loadView("template_top", array("banner"=>false));
		\Core\Router::loadView("detail/event", array("event"=>new \Model\Event($id), "action"=>$action));
		\Core\Router::loadView("detail/modals");
		\Core\Router::loadView("template_bottom");
		
	}
}