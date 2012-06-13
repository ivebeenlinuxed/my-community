<?php
namespace Core;

class Router extends \System\Core\Router {
	const MODE_JSON = 0;
	const MODE_HTML = 1;
	
	public static $mode;
	
	/**
	 * Does the startup stuff, like removing the extention so we know what mode we are in
	 * 
	 * @param array $array The path to be parsed
	 * 
	 * @return array A callable array
	 * 
	 */
	public static function getController($array) {
		preg_match("/[a-zA-Z]+(\.(?<extension>html|json))?/", $array[count($array)-1], $matches);
		if (isset($matches['extension'])) {
			switch ($matches['extension']) {
				case "json":
					self::$mode = MODE_JSON;
					break;
				case "html":
					self::$mode = MODE_HTML;
					break;
				default:
					self::$mode = MODE_HTML;
					break;
			}
			$array[count($array)-1] = substr($array[count($array)-1], 0, (strlen($matches['extension'])+1)*-1);
		}
		return parent::getController($array);
	}
}