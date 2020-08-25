<?php
namespace Core;

class View
{
	/**
	*	Принимает объект класса Page.
	*	Возвращает файл лойаута с подключенным представлением, переданным в объекте класса Page
	*/
	function ViewRender(Page $page) {
		return $this->renderLayot($page, $this->renderChank($page));
	}

	/**
	*	Принимает объект класса Page. И $content - подключение представления
	*	Возвращает подключение файла лойаута с тайтлом(хранится в переменной $title) и подключенным файлом представления
	*/
	private function renderLayot(Page $page, $chanks = []) {

		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/layouts/{$page->layout}.php";

		if(file_exists($layoutPath)) {
			ob_start();
				$title = $page->title;
				extract($chanks);
				include $layoutPath;
			return ob_get_clean();
		} else {
			echo "renderLayot Файл с макетом(layout) {$page->layout} не обнаружен по пути $layoutPath"; die();
		}
	}

	/**
	* 	Принимает объект класса Page, в котором содержится массив с частями стриницы (чанки - объекты класса Chank, свойства: путь к файлу и данные для отображения в файле)
	*
	*	Возвращает массив, где ключ - это название переменной, значение которой - это страница представления (путь к которой передается в чанке). Можно передавать сколько угодно страниц представления и менять их в контроллерах, в которых они вызываются
	*/
	private function renderChank(Page $page)
	{
		$result = [];

		foreach ($page->chanks as $var => $chank) 
		{
			$path = $_SERVER['DOCUMENT_ROOT'] . "/$chank->path";

			if(file_exists($path)) {
				//буфер обмена
				ob_start();
					//ложим в буфер обмена данные чанков
					$data = $chank->data;
					if(is_array($data)) {
						// extract - функция обрабатывает массив, создает переменные, название которых - это ключи массива, ложит в переменные значения по ключам массива
						extract($data);
					} else {
						echo "renderChank Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
					}
					include $path;
				$result[$var] = ob_get_clean();
			} else {
				echo "Файл с представлением {$chank->path} не обнаружен по пути $path"; die();
			}

		}

		return $result;

	}

}