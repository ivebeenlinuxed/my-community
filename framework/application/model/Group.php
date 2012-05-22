<?php
namespace Model;

class Group extends DBObject {
	public static function getTable($read=true) {return "group";}
	public static function getPrimaryKey() {return "id";}

	public function __construct($Id) {
		parent::__construct($Id);
		$this->flags = (int)$this->flags;
	}
	
	public function getNews() {
		return GroupNews::getByGroup($this);
	}
	
	public function getActivities() {
		return Event::getByGroup($this);
	}
}