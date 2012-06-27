<?php
namespace Controller;

abstract class BaseController {
	/**
	 * Array of GET parameters which need to be appended to future requests
	 * 
	 * @var string[]
	 */
	public $getURLParams = array();
	
	/**
	 * Builds a page URL using the getURLParams
	 * 
	 * @param string $url the URL to build onto
	 * 
	 * @return string
	 */
	public function buildPageURL($url) {
		$u = parse_url($url);
		return $u['scheme']."://".$u['host'].$u['path']."?".http_build_query(array_merge($this->getURLParams, parse_str($u['query'])));
	}
	
	public function getTemplateTop() {
		\Core\Router::loadView("template_top");
	}
	
	public function getTemplateBottom() {
		\Core\Router::loadView("template_bottom");
	}
}