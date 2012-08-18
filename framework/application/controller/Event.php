<?php
/**
 * Event Controller
 * 
 * PHP Version: 5.3
 * 
 * @category Controller
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @version  GIT: $Id$
 * @link     http://www.bcslichfield.com/
 * 
 */
namespace Controller;

/**
 * Displays event related pages
 * 
 * @category Controller
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @link     http://www.bcslichfield.com/
 *
 */
class Event extends BaseController {
	/**
	 * Displays either an index page or the details page of events
	 * 
	 * @param int    $id     ID of the event to display
	 * @param string $action Page mode
	 * 
	 * @return null
	 */
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
	
	/**
	 * Get the index page
	 * 
	 * @return null
	 */
	private function indexed() {
		$this->getTemplateTop();
		echo "INDEX PAGE FOR Event";
		$this->getTemplateBottom();
	}
	
	private function search() {
		
	}
}