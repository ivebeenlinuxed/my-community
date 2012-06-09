<?php
/**
 * 
 * @package Controller
 * @author ivebeenlinuxed <will@bcslichfield.com>
 * @link
 * @category
 * @license 
 *
 */
namespace Controller;

class Event extends BaseController {
	public function index($id=null, $action="view") {
		if ($id == null || !\Model\Event::Exists($id)) {
			$this->indexed();
			return;
		}
		
		\Core\Router::loadView("template_top", array("banner"=>false));
		\Core\Router::loadView("detail/event", array("event"=>new \Model\Event($id), "action"=>$action));
		\Core\Router::loadView("detail/modals");
		\Core\Router::loadView("template_bottom");
		
	}
	
	public function indexed() {
		$this->getTemplateTop();
		echo "INDEX PAGE FOR Event";
		$this->getTemplateBottom();
	}
}