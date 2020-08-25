<?php
namespace Core;

/**
*	Вспомогательный класс для создания роута
*	$path - URI, при котором запустится действее $action в контроллере $controller
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