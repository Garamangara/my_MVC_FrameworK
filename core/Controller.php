<?php
namespace Core;

class Controller
{
	//Страница сайта по умолчанию
	private $layaut = 'default';
	private $sidebar = 'right/default';
	private $title = '';

	/**
	* Принимает $view - путь к представлению, $data - данные для создания переменных во View 
	* Возвращает объект класса Page со всеми настройками для View
	*/
	function render($view, $data = []) {
		return new Page($this->layaut, $this->title, $view, $data);
	}

	// function sidebar($path, $data = []) {

	// }
}