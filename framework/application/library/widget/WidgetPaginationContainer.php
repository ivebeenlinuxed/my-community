<?php
namespace \Library\Widget;

class WidgetPaginationContainer extends PageWidget {
	public $widgets;
	public $id;
	public $page = 0;
	public $pageSize = 10;

	public $paginationLink = "";


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

}