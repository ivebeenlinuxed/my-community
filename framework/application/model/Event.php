<?php
namespace Model;

class Event extends DBObject {
	public static function getTable($read=true) {
		return "event";
	}
	public static function getPrimaryKey() {
		return "id";
	}
	public static function getToday() {
		//FIXME Need to get events for just today
		return self::getAll();
	}
	
	/**
	 * Gets the group which is associated with the event
	 * 
	 * @return \Model\Group
	 */
	public function getGroup() {
		return new Group($this->group);
	}
	
	/**
	 * Get the events hosted by a particular group
	 * 
	 * @param \Model\Group $g The group which events should be searched for
	 * 
	 * @return \Model\Event
	 */
	public static function getByGroup(Group $g) {
		return self::getByAttribute("group", $g->id);
	}
	
	/**
	 * Converts BYDAY to a full day, usable with strtime
	 * 
	 * @return string
	 */
	public function getWeekday() {
		$a = array(
				"MO"=>"Monday",
				"TU"=>"Tuesday",
				"WE"=>"Wednesday",
				"TH"=>"Thursday",
				"FR"=>"Friday",
				"SA"=>"Saturday",
				"SU"=>"Sunday"
				);
		return $a[$this->BYDAY];
	}
}