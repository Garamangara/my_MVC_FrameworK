<?php
namespace Core;

/**
* Вспомогательный класс. Хранит в себе роут (URI)
* $path - URI, при котором запустится хранящееся и действее $action в контроллере $controller
*/
class Route
{
	private $path;
	private $controller;
	private $action;

	function __construct($path, $controller, $action)
	{
		$this->path = $path;
		$this->controller = $controller;
		$this->action = $action;
	}

	function __get($property) {
		return $this->$property;
	}
}