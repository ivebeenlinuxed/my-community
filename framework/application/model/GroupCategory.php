<?php
namespace Model;

class GroupCategory extends DBObject {
	public static function getTable($read=true) {
		return "group_category";
	}
	public static function getPrimaryKey() {
		return "id";
	}
	
}