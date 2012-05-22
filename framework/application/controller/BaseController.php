<?php
namespace Controller;

abstract class BaseController {
	public function getTemplateTop() {
		\Core\Router::loadView("template_top");
	}
	
	public function getTemplateBottom() {
		\Core\Router::loadView("template_bottom");
	}
}