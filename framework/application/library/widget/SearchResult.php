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
	
	/**
	 * Sets a thumbnail should be rendered
	 * 
	 * @var bool
	 * @see Library::Widget::SearchResults.showThumbnail
	 */
	public $renderThumbnail = false;
	
	/**
	 * Renders a search result
	 * 
	 * @see Library::Widget::PageWidget.Render()
	 * 
	 * @return null
	 */
	public function Render() {
		echo "<div class='search-result'>";
		echo "<h3>";
		if ($this->link != "") {
			echo "<a href='{$this->link}'>";
		}
		echo $this->title;
		if ($this->link != "") {
			echo "</a>";
		}
		echo "</h3>";
		echo "<div>{$this->description}</div>";
		echo "</div>";
	}
}