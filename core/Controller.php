<?php
namespace Core;

class Controller
{
	//Страница сайта по умолчанию
	private $layaut = 'default';
	private $title = '';

	private $sidebarPath = 'right/default';
	private $sidebarData = [];

	private $headerPath = 'default';
	private $headerData = [];

	private $footerPath = 'default';
	private $footerData = [];

	/**
	* Принимает $view - путь к представлению, $data - данные для создания переменных во View 
	* Возвращает объект класса Page со всеми настройками для View
	*/
	function render($view, $data = []) {
		return new Page($this->layaut, $this->title, $this->sidebarPath, $this->sidebarData, $this->headerPath, $this->headerData, $this->footerPath, $this->footerData, $view, $data);
	}

	function __set($property, $value) {
		$this->$property = $value;
	}
}