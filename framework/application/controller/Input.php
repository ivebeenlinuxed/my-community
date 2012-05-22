<?php
namespace Controller;

class Input {
	public function event() {
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
			\Core\Router::loadView("template_top");
			\Core\Router::loadView("input/event");
			\Core\Router::loadView("template_bottom");
		} else {
			$start = \DateTime::createFromFormat("d/m/Y G:i", $_POST['start_date']." ".$_POST['start_hour'].":".$_POST['start_minute']);
			$end = \DateTime::createFromFormat("d/m/Y G:i", $_POST['end_date']." ".$_POST['end_hour'].":".$_POST['end_minute']);
			$ical = array("Mon"=>"MO", "Tue"=>"TU", "Wed"=>"WE", "Thu"=>"TH", "Fri"=>"FR", "Sat"=>"SA", "Sun"=>"SU");
			\Model\Event::Create(array(
				"DTSTART"=>$start->getTimestamp(),
				"DTEND"=>$end->getTimestamp(),
				"FREQ"=>$_POST['repeat'],
				"COUNT"=>$_POST['repeat_count'],
				"BYDAY"=>$ical[$start->format("D")],
				"WKST"=>"MO",
				"INTERVAL"=>$_POST['repeat_interval'],
				"venue"=>$_POST['venue'],
				"group"=>$_POST['group'],
				"title"=>$_POST['title'],
				"description"=>$_POST['description'],
				"description"=>$_POST['link']
			));
			header("Location: /");
		}
	}
	
	public function group() {
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			\Core\Router::loadView("template_top");
			\Core\Router::loadView("input/group");
			\Core\Router::loadView("template_bottom");
		} else {
			$group = \Model\Group::Create(array(
				"name"=>$_POST['name'],
				"link"=>$_POST['link'],
				"image"=>"",
				"description"=>$_POST['description']
			));
			
			header("Location: /");
		}
	}
	
	public function venue() {
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			\Core\Router::loadView("template_top");
			\Core\Router::loadView("input/venue");
			\Core\Router::loadView("template_bottom");
		} else {
			\Model\Venue::Create($_POST);
			header("Location: /");
		}
	}
	
	public function youfind() {
		$activity = json_decode(file_get_contents("https://api.scraperwiki.com/api/1.0/datastore/sqlite?format=jsondict&name=youfind_staffordshire&query=select%20*%20from%20%60activity%60"));
		$organisation = json_decode(file_get_contents("https://api.scraperwiki.com/api/1.0/datastore/sqlite?format=jsondict&name=youfind_staffordshire&query=select%20*%20from%20%60organisation%60"));
		$venue = json_decode(file_get_contents("https://api.scraperwiki.com/api/1.0/datastore/sqlite?format=jsondict&name=youfind_staffordshire&query=select%20*%20from%20%60venue%60"));
		$contact = json_decode(file_get_contents("https://api.scraperwiki.com/api/1.0/datastore/sqlite?format=jsondict&name=youfind_staffordshire&query=select%20*%20from%20%60activity%60"));
			
		foreach ($venue as $v) {
			$v->id += 10000;
			if ($v->easting != 0 && $v->northing != 0) {
				$ne = new \Library\GeoLib\OSRef($v->easting, $v->northing);
				//var_dump($ne, $v);
				//die();
				$ll = $ne->toLatLng();
				$v->lat = $ll->lat;
				$v->lng = $ll->lng;
			} else {
				$v->lat = $v->lng = null;
			}
			unset($v->easting);
			unset($v->northing);
			try {
				\Model\Venue::Create(\System\Library\StdLib::makeArray($v));
			} catch (\Library\Database\DBException $e) {}
		}
		
		foreach ($organisation as $o) {
			$o->id += 10000;
			try {
				$o->name = ucwords ( $o->name );
				\Model\Group::Create(\System\Library\StdLib::makeArray($o));
			} catch (\Library\Database\DBException $e) {
				$m = new \Model\Group($o->id);
				$m->Delete();
				\Model\Group::Create(\System\Library\StdLib::makeArray($o));
			}
			if ($o->image != "") {
				$ch = curl_init($o->image);
				curl_setopt($ch, CURLOPT_FILE, fopen(BOILER_LOCATION."../htdocs/uploads/group/".$o->id."_profile_pic.jpg", "w+"));
				//var_dump(BOILER_LOCATION."../htdocs/uploads/group/".$o->id."_profile_pic.jpg");
				curl_exec($ch);
			}
		}
		
		foreach ($activity as $a) {
			$a->id += 10000;
			$a->group = $a->organisation + 10000;
			$a->venue += 10000;
			//$a->id += 10000;
			$o = new \Model\Group($a->group);
			if ($o->image != "") {
				$ch = curl_init($o->image);
				curl_setopt($ch, CURLOPT_FILE, fopen(BOILER_LOCATION."../htdocs/uploads/event/".$o->id."_profile_pic.jpg", "w+"));
				//var_dump(BOILER_LOCATION."../htdocs/uploads/group/".$o->id."_profile_pic.jpg");
				curl_exec($ch);
			}
			unset($a->organisation);
			//FIXME create categories
			unset($a->category);
			
			try {
				\Model\Event::Create(\System\Library\StdLib::makeArray($a));
			} catch (\Library\Database\DBException $e) {}
		}
		
	}
}