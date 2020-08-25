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
	//private $sidebar;//сайдбар страницы (сторона расположения определяется в пути)
	private $view;//путь к представлению
	private $data;//данные для представления

	function __construct($layout, $title = '', $view = null, $data = [])
	{
		$this->layout = $layout;
		$this->title = $title;
		$this->view = $view;
		$this->data = $data;
	}

	function __get($property) {
		return $this->$property;
	}
}