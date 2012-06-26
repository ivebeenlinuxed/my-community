<?php
namespace Model;

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
}