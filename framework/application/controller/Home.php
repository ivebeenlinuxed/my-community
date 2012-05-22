<?php
namespace Controller;

class Home extends BaseController {
	function index() {
		$this->getTemplateTop();
		\Core\Router::loadView("home");
		$this->getTemplateBottom();
	}
}