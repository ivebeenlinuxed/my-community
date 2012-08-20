<?php
$results = array();
foreach ($data as $d) {
//for ($i=0; $i<50; $i++) {
	$resultItem = new \Library\Widget\SearchResult();
	if (is_a($d, "\Model\Venue")) {
		$resultItem->title = $d->name;
		$resultItem->description = $d->description? $d->description : "This venue has no description";
		$resultItem->link = "/venue/{$d->id}";
	} elseif (is_a($d, "\Model\Group")) {
		$resultItem->title = $d->name;
		$resultItem->description = $d->description? $d->description : "This group has no description";
		$resultItem->link = "/group/{$d->id}";
	}
	$results[] = $resultItem;
}
$searchList = new \Library\Widget\SearchResults($results);
$searchList->hasThumbnails = true;
$searchList->page = (int)$_GET['page'];
$searchList->paginationLink = function($page, $controller) {
	return "/search?".http_build_query(array_merge($_GET, array("page"=>$page)));
};
$searchList->Render();