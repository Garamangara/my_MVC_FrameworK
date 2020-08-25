<?php
namespace Core;

/**
* Вспомогательный класс. Хранит в себе роут (URI)
* $path - URI, при котором запустится хранящееся и действее $action в контроллере $controller
*/
class Sidebar
{
	private $path = 'default';
	private $data;

	function __construct($path = '', $data = [])
	{
		$this->path = $path;
		$this->data = $data;
	}

	function __get($property) {
		return $this->$property;
	}
}