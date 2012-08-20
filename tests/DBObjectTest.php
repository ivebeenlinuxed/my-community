<?php
/**
 * Tests the DBObject class
 * 
 * @category Tests
 * @package  Boiler
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  GNU v3.0 http://www.gnu.org/licenses/gpl-3.0.txt
 * @version  GIT: $Id: 01ea145ae89ab01f3f937be4e484f56319a7deac $
 * @link     http://www.bcslichfield.com
 * @see      \Core\DBObject
 *
 */

/**
 * Tests the DBObject class
 *
 * @category Tests
 * @package  Boiler
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  GNU v3.0 http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.bcslichfield.com
 * @see      \Core\DBObject
 *
 */
class DBObjectTest extends PHPUnit_Framework_TestCase {
	/**
	 * Do some jiggery to the config
	 * 
	 * @return null
	 */
	protected function setUp() {
		$settings=array();
		$settings['database'] = array();
		$settings['database']['user'] = 'jenkins';
		$settings['database']['passwd'] = 'jenkinspasswd123=';
		$settings['database']['server'] = 'localhost';
		$settings['database']['port'] = '3306';
		$settings['database']['db'] = 'jenkins';
		\Core\Router::$settings = $settings;
	}
	
	/**
	 * Tests creation logic
	 * 
	 * @return null
	 */
	public function testCreate() {
		
	}
}

?>