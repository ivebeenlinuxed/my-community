<?php
/**
 * Extends the core DBObject with database settings from the config
 * 
 * PHP Version: 5.3
 * 
 * @category Model
 * @package  Boiler
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  GPL v3.0 http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.bcslichfield.com/
 *
 */

namespace Model;

/**
 * DBObject override for \Core\Model
 * 
 * DBObject is the main class that all models should extend.
 * It provides core functionality.
 * 
 * @category Model
 * @package  Boiler
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  GPL v3.0 http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.bcslichfield.com/
 * @see      \Core\Model
 *
 */
abstract class DBObject extends \System\Model\DBObject {
	
	public static function getDB() {
		return \Library\Database\LinqDB::getDB(\Core\Router::$settings['database']['server'], \Core\Router::$settings['database']['user'], \Core\Router::$settings['database']['passwd'], \Core\Router::$settings['database']['db']);
	}
	
	/**
	 * Get the PrimaryKey
	 * 
	 * @return array
	 */
	public function getID() {
		if (!is_array($key = $this->getPrimaryKey())) {
			$key = array($key);
		}
		
		$out = array();
		foreach ($key as $k) {
			$out[$k] = $this->$k;
		}
		return $out;
	}
	
	/**
	 * Gets a string which acts as a unique identifier for the object
	 * 
	 * @return string
	 */
	public function getUniqueIdentifier() {
		$id = $this->getID();
		$out = "";
		foreach ($id as $i) {
			$out .= "{$i}-";
		}
		return substr($out, 0, -1);
	}
	
	public static function Count() {
		$db = self::getDB();
		$c = get_called_class();
		$s = $db->Select($c);
		$s->addCount("c");
		$e = $s->Exec();
		echo $e[0]->c;
	}
}