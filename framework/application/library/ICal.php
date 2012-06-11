<?php
namespace Library;

class ICal {
	public static function parseFrequency($data) {
		date_default_timezone_set('Europe/London');
		if ($data->FREQ == "WEEKLY"){
			$wkdays = array('SU'=>'Sun', 'MO'=>'Mon', 'TU'=>'Tue', 'WE'=>'Wed', 'TH'=>'Thu', 'FR'=>'Fri', 'SA'=>'Sat');
			return "Each ".date('l', strtotime($wkdays[$o->BYDAY]))." at ".date('h:ia', $o->DTSTART);
		}
		else if ($data->FREQ == "DAILY"){
			return "Every day at ".date('h:ia', $o->DTSTART);
		} else {
			throw new Exception("iCal date has not been parsed");
		}
	}
}