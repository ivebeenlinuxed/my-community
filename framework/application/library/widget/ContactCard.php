<?php
namespace Library\Widget;

class ContactCard extends PageWidget {
	public $title = "";
	public $link = "";
	public $sublines = array();
	public $image = "";
	
	public function setTitle($t) {
		$this->title = $t;
	}
	
	public function setLink($l) {
		$this->link = $l;
	}
	
	public function addSubline($l) {
		$this->subline[] = $l;
	}
	
	public function setImage($i) {
		$this->image = $i;
	}
	
	public function Render() {
		\Core\Router::loadView("widget/contact_card", array("controller"=>&$this));
	}
}