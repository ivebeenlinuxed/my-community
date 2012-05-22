<?php
namespace Controller;
use \Model\GroupNews;

class Cron {
	public function news() {
		$db = Group::getDB();
		$s = $db->Select("\Model\Group");
		$and = $db->getAndFilter();
		$and->neq("rss", "");
		$s->setFilter($and);
		foreach ($s->Exec() as $group) {
			$xml = new \SimpleXMLElement(file_get_contents($group['rss']));
			var_dump(count($xml->xpath("//item")));
			foreach ($xml->xpath("//item") as $item) {
				$article = array(
					"title"=>(string)$item->title,
					"text"=>(string)$item->description,
					"link"=>(string)$item->link,
					"guid"=>(string)$item->guid,
					"date"=>(string)$item->pubDate,
					"group"=>$group['id']
				);
				if (count(GroupNews::getByAttributes(array("guid"=>$article['guid'], "group"=>$article['group']))) == 0) {
					GroupNews::Create($article);
				}
				var_dump($article);
			}
		}
	}
}