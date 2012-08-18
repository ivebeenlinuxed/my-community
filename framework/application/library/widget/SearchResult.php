<?php
/**
 * 
 */
namespace Library\Widget;

/**
 * 
 * @author star241
 *
 */
class SearchResult extends PageWidget {
	/**
	 * 
	 * @var string Title of the result
	 */
	public $title = "Unknown Title";
	
	/**
	 * 
	 * @var string Description of the item
	 */
	public $description = "No Description";
	
	/**
	 * 
	 * @var string Link (if blank no link)
	 */
	public $link = "";
	
	public function Render() {
		echo "<div class='search-result'>";
		echo "<h3>{$this->title}</h3>";
		echo "<div>{$this->description}</div>";
		echo "</div>";
	}
}