<?php
$results = array();
//foreach ($data as $d) {
for ($i=0; $i<50; $i++) {
	$resultItem = new \Library\Widget\SearchResult();
	$resultItem->title = "Test Item $i";
	$resultItem->description = "Item number #$i";
	$resultItem->link = "/venue/$i";
	$results[] = $resultItem;
}
$searchList = new \Library\Widget\SearchResults($results);
$searchList->page = (int)$_GET['page'];
$searchList->paginationLink = function($page, $controller) {
	return "/search?".http_build_query(array_merge($_GET, array("page"=>$page)));
};
$searchList->Render();