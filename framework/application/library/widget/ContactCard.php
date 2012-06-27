<?php
namespace \Library\Widget;

class ContactCard extends PageWidget {
	public $title;
	public $link;
	public $sublines;
	
	public function setTitle($t) {
		$this->title = $t;
	}
	
	public function setLink($l) {
		$this->link = $l;
	}
	
	public function addSubline($l) {
		$this->subline[] = $l;
	}
	
	public function Render() {
		echo $this->title;
	}
}