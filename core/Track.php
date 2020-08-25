<?php
namespace Core;

/**
* Вспомогательный класс. Хранит в себе название контроллера, действия и массив с параметрами.
* Все значения передаются в классе \Core\Router
*/
class Track
{
	private $controller;
	private $action;
	private $params;

	function __construct($controller, $action, $params = [])
	{
		$this->controller = $controller;
		$this->action = $action;
		$this->params = $params;
	}

	function __get($property) {
		return $this->$property;
	}
}