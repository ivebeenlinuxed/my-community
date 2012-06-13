<?php
namespace Model;

class GroupNews extends DBObject implements NewsArticle {
	public static function getTable($read=true) {
		return "group_news";
	}
	public static function getPrimaryKey() {
		return "id";
	}

	public static function getByGroup(Group $g) {
		return self::getByAttribute("group", $g->id);
	}
}