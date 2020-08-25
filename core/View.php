<?php
namespace Core;

class View
{
	/**
	*	Принимает объект класса Page.
	*	Возвращает файл лойаута с подключенным представлением, переданным в объекте класса Page
	*/
	function ViewRender(Page $page) {
		return $this->renderLayot($page, $this->renderView($page), $this->renderMenu($page), $this->renderHeader($page), $this->renderFooter($page));
	}

	/**
	*	Принимает объект класса Page. И $content - подключение представления
	*	Возвращает подключение файла лойаута с тайтлом(хранится в переменной $title) и подключенным файлом представления
	*/
	private function renderLayot(Page $page, $content, $sidebar, $header, $footer) {
		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/layouts/{$page->layout}.php";

		if(file_exists($layoutPath)) {
			ob_start();
				$title = $page->title;
				include $layoutPath;
			return ob_get_clean();
		} else {
			echo "renderLayot Файл с макетом(layout) {$page->layout} не обнаружен по пути $layoutPath"; die();
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
					echo "renderView Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $viewPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$page->view} не обнаружен по пути $viewPath"; die();
		}
	}

	private function renderMenu(Page $page) {
		$sidebarPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/sidebars/{$page->sidebarPath}.php";

		if(file_exists($sidebarPath)) {
			ob_start();
				$sidebarData = $page->sidebarData;
				if(is_array($sidebarData)) {
					extract($sidebarData);
				} else {
					echo "renderMenu Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $sidebarPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$page->sidebarPath} не обнаружен по пути $sidebarPath"; die();
		}
	}

	private function renderHeader(Page $page) {
		$headerPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/headers/{$page->headerPath}.php";

		if(file_exists($headerPath)) {
			ob_start();
				$headerData = $page->headerData;
				if(is_array($headerData)) {
					extract($headerData);
				} else {
					echo "renderHeader Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $headerPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$page->headerPath} не обнаружен по пути $headerPath"; die();
		}
	}

	private function renderFooter(Page $page) {
		$footerPath = $_SERVER['DOCUMENT_ROOT'] . "/project/pages/footers/{$page->footerPath}.php";

		if(file_exists($footerPath)) {
			ob_start();
				$footerData = $page->footerData;
				if(is_array($footerData)) {
					extract($footerData);
				} else {
					echo "renderFooter Для правильного преобразования данных представления в переменные должен быть передан массив. Где название переменной - это ключ, а значение - это значение по ключу массива"; die();
				}
				include $footerPath;
			return ob_get_clean();
		} else {
			echo "Файл с представлением {$page->footerPath} не обнаружен по пути $footerPath"; die();
		}
	}

}