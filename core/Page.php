<?php
namespace Core;

/**
* Вспомогательный класс для открытия представления View
* 
*/
class Page
{
	private $layout;//название макета страницы
	private $title;//заголовок страницы

	private $sidebarPath;//путь к сайдбару страницы (сторона расположения определяется в пути)
	private $sidebarData;//сайдбар страницы (сторона расположения определяется в пути)

	private $headerPath;//путь к сайдбару страницы (сторона расположения определяется в пути)
	private $headerData;//сайдбар страницы (сторона расположения определяется в пути)

	private $footerPath;//путь к сайдбару страницы (сторона расположения определяется в пути)
	private $footerData;//сайдбар страницы (сторона расположения определяется в пути)

	private $view;//путь к представлению
	private $data;//данные для представления

	function __construct($layout = '', $title = '', $sidebarPath = '', $sidebarData = [], $headerPath = '', $headerData = [], $footerPath = '', $footerData = [], $view = null, $data = [])
	{
		$this->layout = $layout;
		$this->title = $title;

		$this->sidebarPath = $sidebarPath;
		$this->sidebarData = $sidebarData;

		$this->headerPath = $headerPath;
		$this->headerData = $headerData;

		$this->footerPath = $footerPath;
		$this->footerData = $footerData;

		$this->view = $view;
		$this->data = $data;
	}

	function __get($property) {
		return $this->$property;
	}

}