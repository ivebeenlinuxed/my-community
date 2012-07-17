<?php
/**
 * Place controller
 *
 * PHP Version: 5.3
 *
 * @category Place
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @version  GIT: $Id$
 * @link     http://www.bcslichfield.com/
 *
 */
namespace Controller;

/**
 * Place controller
 *
 * @category Place
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @version  GIT: $Id$
 * @link     http://www.bcslichfield.com/
 *
 */
class Place extends BaseController {
	
	/**
	 * Displays in index page
	 * 
	 * @return null
	 */
	public function index() {
		//FIXME Follow code form \Controller\Group or \Controller\Event
		$this->getTemplateTop();
		echo "INDEX PAGE FOR PLACES";
		$this->getTemplateBottom();
	}
}