<?php
/**
 * 
 * @author star241
 *
 */
namespace Library\Widget;

/**
 * 
 * @author star241
 *
 */
class WidgetPaginationContainer extends PageWidget {
	/**
	 * The ID of the container (used for AJAX)
	 * @var string
	 */
	public $id;
	
	/**
	 * The current page
	 * 
	 * @var int
	 */
	public $page = 0;
	
	/**
	 * The size of the page
	 * 
	 * @var int
	 */
	public $pageSize = 10;

	/**
	 * 
	 * @var callable A function to generate the pagination link function(int $pageNumber, \Library\Pagination $controller)
	 * @see \Library\Pagination
	 */
	public $paginationLink = "";
	
	/**
	 * 
	 * @var \Library\Widget\PageWidget Widgets to be paginated
	 */
	public $widgets;

	/**
	 * Creates a container of Widgets
	 *
	 * @param \Library\Widget\PageWidget[] $widgetArray An array of ContactCard
	 */
	public function __construct($widgetArray) {
		$this->widgets = $widgetArray;
		$this->id = "widgetpagination_".rand(1000, 9999);
	}

	/**
	 * Render the container
	 *
	 * @return null
	 */
	public function Render() {
		if ($this->paginationLink != "") {
			$pagination = new \Library\Pagination($this->widgets);
			$pagination->pageSize = $this->pageSize;
			$data = $pagination->getPage($this->page);
		} else {
			$data = $this->widgets;
		}
		\Core\Router::loadView("widget/widget_pagination_container", array("data"=>$data, "pagination"=>$pagination, "controller"=>&$this));
	}
	
	/**
	 * Gets the total number of pages in current query
	 * 
	 * @return int
	 */
	public function getPages() {
		return ceil(count($this->widgets)/$this->pageSize);
	}
}