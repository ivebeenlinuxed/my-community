<?php
namespace Model;

class Venue extends DBObject {
	public static function getTable($read=true) {return "venue";}
	public static function getPrimaryKey() {return "id";}
	
}