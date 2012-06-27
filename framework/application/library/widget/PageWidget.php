<?php
namespace Library\Widget;

abstract class PageWidget {
	public $editMode = false;
	public $cssClass = array();
	
	abstract function Render();
	
	/**
	 * Adds the CSS Class to the widget container
	 * 
	 * @param string $name The CSS Class to add
	 * 
	 * @return null
	 */
	public function addCSSClass($name) {
		$this->cssClass[] = $name;
	}
	
	/**
	 * Gets the CSS Selectors as a string
	 * 
	 * @return string
	 */
	public function getCSSString() {
		return implode(" ", $this->cssClass);
	}
	
	
	public function isEditMode() {
		return $this->editMode;
	}
	
	public function setEditMode($e) {
		$this->editMode = $e;
	}
}