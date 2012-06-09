<?php
namespace Controller;

class Place extends BaseController {
	public function index() {
		//FIXME Follow code form \Controller\Group or \Controller\Event
		$this->getTemplateTop();
		echo "INDEX PAGE FOR PLACES";
		$this->getTemplateBottom();
	}
}