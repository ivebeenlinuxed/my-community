<?php
namespace Library;

class CellRenderer {
	public static function iCalFrequency($data, $col) {
		return \Library\ICal::parseFrequency($data);
	}
	
	public static function EventDescription($data, $col) {
		return '<a href="/event/'.$o->id.'">'.(($data->title == "") ? substr($data->description, 0, 50).'</a>...' : $data->title).'</a>';
	}
}