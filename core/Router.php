<?php
namespace Core;

class Router
{
	/**
	* Принимает роуты и URI текущей страницы
	* Возвращает объект класса Track. Записывает в него выбранный контроллер, действие, параметры
	*/
	function getTrack($routes, $uri)
	{
		foreach ($routes as $route) {
			$pattern = $this->createPattern($route->path);

			//Если замена по регулярному выражению равна URI текущей страницы - записывает результат в переменную $params
			if(preg_match($pattern, $uri, $params)) {
				$params = $this->clearParams($params);
				
				return new Track($route->controller, $route->action, $params);
			}
		}
	}

	/**
	* Принимает путь (записанный в роуте)
	* Выполняет поиск и замену по регулярному выражению
	* Возвращает замену по регулярному выражению
	*/
	private function createPattern($path)
	{
		return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
	}

	/**
	* Принимает параметры, найденные в URI текущей страницы
	* Возвращает ассоциативный массив, ключ - название параметра(передается в роуте), значение - значение, прописано в URI
	*/
	private function clearParams($params)
	{
		$result = [];

		foreach ($params as $key => $value) {
			if(!is_int($key)) {
				$result[$key] = $value;
			}
		}

		return $result;
	}

}