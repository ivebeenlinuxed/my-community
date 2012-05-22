<?php
namespace Controller;

class Group {
	public function index($id=null, $action="view") {
		if ($id == null || !\Model\Group::Exists($id)) {
			header("Location: /");
		}
		
		\Core\Router::loadView("template_top", array("banner"=>false));
		\Core\Router::loadView("detail/group", array("group"=>new \Model\Group($id), "action"=>$action));
		\Core\Router::loadView("detail/modals");
		\Core\Router::loadView("template_bottom");
		
	}
}