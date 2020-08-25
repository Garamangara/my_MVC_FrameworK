<?php
namespace Core;

class Controller
{
	private string $layaut = 'default';//Страница основного макета сайта по умолчанию
	private string $title = '';//Заголовок страницы

	private array $chanks = [];//Представления страницы (объекты класса Chank)

	/**
	* Принимает $view - путь к представлению, $data - данные для создания переменных во View 
	* Возвращает объект класса Page со всеми настройками для View
	*/
	function render(array $chanks) {
		return new Page($this->layaut, $this->title, $chanks);
	}

	/**
	*	Магическая функция __set для записи данных
	*	Запускается при попытке изменения приватных свойств
	*/
	function __set($property, $value) {
		$this->$property = $value;
	}

	/**
	*	Принимает: $path - путь и $data - данные 
	*	Возвращает объект класса \Core\Chank;
	*/
	function setChank($path = string, $data = []) {
		if (!is_array($data)) {
			echo "В данные (второй аргумент функции <b>setChank</b>) должен быть передан массив"; die();
		}
		return new Chank($path, $data);
	}

}