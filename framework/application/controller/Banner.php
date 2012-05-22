<?php
namespace Controller;

class Banner {
	function index() {
		$output = array();


		//FILMS!
		$films = "http://uk.feed.previewnetworks.com/v3.1/cinema/coming-40/";

		$dd = new \DOMDocument();
		$dd->load($films);

		$xp = new \DOMXpath($dd);

		$titles = $xp->query("//movies/movie/original_title");
		$images = $xp->query("//movies/movie/regions/region[@name='UK']/pictures/picture[1]/url");
		$descriptions = $xp->query("//movies/movie/regions/region[@name='UK']/products/product[@name='cinema']/description");
		$distributors = $xp->query("//movies/movie/regions/region[@name='UK']/products/product[@name='cinema']/distributors/distributor");
		$premiere = $xp->query("//movies/movie/regions/region[@name='UK']/products/product[@name='cinema']/pub_date");

		for ($i=0; $i<$titles->length; $i++) {
			$f = $titles->item($i);
			$img = $images->item($i);
			$d = $descriptions->item($i);
			$di = $distributors->item($i);
			$pr = $premiere->item($i);
			$it = new \stdClass();
			$it->title = $f->nodeValue;
			$it->content = $d->nodeValue;
			$it->img = $img->nodeValue;
			$it->footer = "Release on ".date("jS F Y", strtotime($pr->nodeValue))." Published by ".$di->nodeValue;
			$it->category = "Film";
			$output[] = $it;
		}
		/*
		//The Lichfield Blog
		$lbf = "http://thelichfieldblog.co.uk/feed/";

		$dd = new \DOMDocument();
		$dd->load($lbf);

		$xp = new \DOMXpath($dd);

		$titles = $xp->query("//item/title");
		$descriptions = $xp->query("//item/description");
		$links = $xp->query("//item/link");

		for ($i=0; $i<$titles->length; $i++) {
			$it = new \stdClass();
			$it->title = $titles->item($i)->nodeValue;
			$it->content = $descriptions->item($i)->nodeValue;
			$it->footer = "Read on <a target='_blank' href='".$links->item($i)->nodeValue."'>The Lichfield Blog</a>";
			$it->img = "/images/lb.png";
			$it->category = "News";
			$output[] = $it;
		}
	*/







		$twitter = "lichfieldblog";
		//$data = json_decode(file_get_contents("https://api.twitter.com/1/statuses/user_timeline.json?screen_name=lichfieldblog"));
		//var_dump($data);

		$bcs_key = "somemassivelylarge1235234key";
		$bcs_secret = "9424a92348very423423secert234jljio9secret";

		shuffle($output);

		echo json_encode($output);
	}
}