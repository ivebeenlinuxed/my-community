<?php
class Bug0000043Test extends PHPUnit_Framework_TestCase {
	public $group;
	public $venue;
	public $event;
	protected function setUp() {
		$this->group = \Model\Group::Create(array("name"=>"Test Group"));
		$this->venue = \Model\Venue::Create(
			array(
				"name"=>"Test Venue",
				"lat"=>52.6790015,
				"lng"=>-1.8134258
			)
		);
		$this->event = \Model\Event::Create(
			array(
				"DTSTART"=>1328126400,
				"DTEND"=>1328133600,
				"FREQ"=>"WEEKLY",
				"COUNT"=>7,
				"BYDAY"=>"WE",
				"WKST"=>"MO",
				"group"=>$this->group->id,
				"venue"=>$this->venue->id,
				"DURATION"=>0,
				"INTERVAL"=>1,
				"title"=>"Test Event",
				"description"=>"Testing Events"
			)
		);
		//var_dump($this->event);
	}
	
	/**
	 * Tests bug #0000043
	 * 
	 * @return null
	 */
	public function test_strToTime() {
		$this->assertEquals(date('l', strtotime("WED")), date('l', strtotime($this->event->getWeekday())));
		date('l', strtotime("WED"));
	}
	
	protected function tearDown() {
		$this->event->Delete();
		$this->group->Delete();
		$this->venue->Delete();
	}
}