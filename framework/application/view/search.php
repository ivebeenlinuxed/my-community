<?php
if ($view = "list") {
	$searchList = new \Library\Widget\SearchResults();
	foreach ($data as $d) {
		$resultItem = new \Library\Widget\SearchResult();
		$searchList->addItem($resultItem);
	}
	$searchList->Render();
} else {
	throw new Exception("Not yet implemented");
}