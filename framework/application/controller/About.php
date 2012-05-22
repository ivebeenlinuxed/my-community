<?php
namespace Controller;

class About {
	function index() {
		\Core\Router::loadView("template_top", array("banner"=>false));
		echo "About us page";
		\Core\Router::loadView("template_top");
	}
}