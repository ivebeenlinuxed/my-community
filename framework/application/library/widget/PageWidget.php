<?php
namespace Library\Widget;

abstract class PageWidget {
	public $editMode = false;
	
	abstract function Render();
	
	
	public function isEditMode() {
		return $this->editMode;
	}
	
	public function setEditMode($e) {
		$this->editMode = $e;
	}
}