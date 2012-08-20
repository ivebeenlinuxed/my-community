<?php
/**
 * 
 */
namespace Library\Widget;

/**
 * Search results list
 * 
 * @author ivebeenlinuxed <will@bcslichfield.com>
 *
 */
class SearchResults extends WidgetPaginationContainer {
	/**
	 * True if search list should include thumbnail images
	 * 
	 * @var boolean
	 */
	public $hasThumbnails = false;
	
	public function Render() {
		if ($this->hasThumbnails) {
			$this->addCSSClass("search-result-thumbs");
		}
		foreach ($this->widgets as $w) {
			$w->renderThumbnail = true;
		}
		parent::Render();
	}
}