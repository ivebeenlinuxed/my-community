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
	/**
	 * General search for all types of resource
	 * 
	 * @return null
	 */
	public function index() {
		$q = $_GET['q'];
		$out = array();
		$out['venues'] = \Model\Venue::Search($q, "name");
		$out['groups'] = \Model\Group::Search($q, "name");
		$out['events'] = \Model\Event::Search($q, "title");
		if (\Core\Router::$mode == \Core\Router::MODE_JSON) {
			echo json_encode($out);
		} else {
			//FIXME Search HTML view needs to be made
			throw new Exception("Not yet implemented");
		}
	}
}