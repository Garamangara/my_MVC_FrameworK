<?php
namespace Core;

/**
*	Вспомогательный класс. Хранит в себе данные для отображения страницы
*/
class Page
{
	private string $layout;//название макета страницы (переводится в путь "/project/pages/layouts/{$layout}.php")
	private string $title;//заголовок страницы

	private array $chanks;// массив с объектами класса Chank

	function __construct($layout = '', $title = '', $chanks)
	{
		$this->layout = $layout;
		$this->title = $title;

		$this->chanks = $chanks;
	}

	function __get($property) {
		return $this->$property;
	}

}