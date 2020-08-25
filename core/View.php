<?php
namespace Core;

class View
{
	/**
	*	Принимает объект класса Page.
	*	Возвращает файл лойаута с подключенным представлением, переданным в объекте класса Page
	*/
	function ViewRender(Page $page, $menu) {
		return $this->renderLayot($page, $this->renderView($page), $this->renderMenu($menu));
	}

	/**
	*	Принимает объект класса Page. И $content - подключение представления
	*	Возвращает подключение файла лойаута с тайтлом(хранится в переменной $title) и подключенным файлом представления
	*/
	private function renderLayot(Page $page, $content, $sidebar) {
		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/layouts/{$page->layout}.php";

		if(file_exists($layoutPath)) {
			ob_start();
				$title = $page->title;
				include $layoutPath;
			return ob_get_clean();
		} else {
			echo "Файл с макетом(layout) {$page->layout} не обнаружен по пути $layoutPath"; die();
		}
	}

	/**
	*	Принимает объект класса Page.
	*	Возвращает подключение файла представления с переданными данными (в виде переменных, доступных в переданном файле представления)
	*/
	private function renderView(Page $page) {
		$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/project/views/{$page->view}.php";

		if(file_exists($viewPath)) {
			ob_start();
				$data = $page->data;
				if(is_array($data)) {
					extract($data);
				} else {
					echo "Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $viewPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$page->view} не обнаружен по пути $viewPath"; die();
		}
	}

	private function renderMenu($menu) {
		$sidebarPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/sidebars/{$menu->path}.php";

		if(file_exists($sidebarPath)) {
			ob_start();
				$data = $menu->data;
				if(is_array($data)) {
					extract($data);
				} else {
					echo "renderMenu Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $sidebarPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$menu->path} не обнаружен по пути $viewPath"; die();
		}
	}

}