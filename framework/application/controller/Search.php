<?php
/**
 * Search controller
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
 * Search controller
 *
 * PHP Version: 5.3
 *
 * @category Controller
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @link     http://www.bcslichfield.com/
 * @todo     Create views for JSON and HTML
 *
 */
class Search extends BaseController {
	public $default_radius = 10;
	/**
	 * General search for all types of resource
	 * 
	 * @return null
	 */
	public function index() {
		/**
		 * Variables to pass to view
		 */
		$var;
		
		/**
		 * Only load template if we aren't a PJAX request
		 */
		if (!isset($_SERVER['HTTP_X_PJAX'])) {
			$this->getTemplateTop();
		}
		$q = isset($_GET['q'])? str_replace(",", " ", $_GET['q']) : "";
		$out = array();
		$out['venues'] = \Model\Venue::Search($q, "name");
		$out['groups'] = \Model\Group::Search($q, "name");
		$out['events'] = \Model\Event::Search($q, "title");
		if (\Core\Router::$mode == \Core\Router::MODE_JSON) {
			echo json_encode($out);
		} elseif (\Core\Router::$mode == \Core\Router::MODE_HTML) {
			$var = array("data"=>$out, "q"=>$_GET['q']);
			if (isset($_GET['map'])) {
				\Core\Router::loadView("search/map", $var);
			} else {
				\Core\Router::loadView("search/list", $var);
			}
			
		} else {
			//FIXME Search HTML view needs to be made
			throw new Exception("Not yet implemented");
		}
		if (!isset($_SERVER['HTTP_X_PJAX'])) {
			$this->getTemplateBottom();
		}
	}
	
	/**
	 * Do the searches and return results
	 * 
	 * @param int   $type   The type of search
	 * @param int   $lat    The latitude to search around
	 * @param int   $lng    The Longitude to search around
	 * @param float $radius The radius to search in km
	 * 
	 * @return array List of results
	 */
	private function doSearch($type=false, $lat=false, $lng=false, $radius=false) {
		$db = \Model\Venue::getDB();
		if ($lat && $lng) {
			$s = $db->Select("\Model\Venue");
			$and = $s->getAndFilter();
			
		}
		switch ($type) {
			case self::TYPE_EVENT:
				
				break;
			case self::TYPE_VENUE:
				break;
			case self::TYPE_GROUP:
		}
	}
	
	/**
	 * Backend for Ajax Counter
	 * 
	 * @return null
	 */
	public function total() {
		echo json_encode($_GET);
		return;
	}
}