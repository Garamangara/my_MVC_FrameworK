<?php
namespace Core;

/**
*	Вспомогательный класс. Хранит в себе: 
*	$path - путь к представлению
*	$data - массив данных, которые будут доступны в представлении в виде переменных
*
*/
class Chank
{
	private string $path;//путь к представлению
	private array $data;//массив данных, которые будут доступны в представлении в виде переменных

	function __construct(string $path, array $data) {
		$this->path = $path;
		$this->data = $data;
	}

	function __get($property) {
		return $this->$property;
	}

}