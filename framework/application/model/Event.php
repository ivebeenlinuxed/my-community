<?php
namespace Model;

class Event extends DBObject {
	public static function getTable($read=true) {return "event";}
	public static function getPrimaryKey() {return "id";}
	public static function getToday() {
		return self::getAll();
	}
	
	public function getGroup() {
		return new Group($this->group);
	}
	
	public static function getByGroup(Group $g) {
		return self::getByAttribute("group", $g->id);
	}
}