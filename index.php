<?php
namespace Core;

//Отображать все ошибки
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Подключаю настройки для подключения к БД (константы)
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

// spl_autoload_register(function($class) {
//     $ds = DIRECTORY_SEPARATOR;
//     $filename = $_SERVER['DOCUMENT_ROOT'] . $ds . str_replace('\\', $ds, $class) . '.php';
    
//     require($filename);
// });

/**
* Автозагрузка классов 
* @ToDo: 1)Регулярные выражения, 2)Исключения(try/catch/throw)
*
*/
spl_autoload_register(function($class) {
		preg_match('#(.+)\\\\(.+?)$#', $class, $match);
		
		$nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
		$className = $match[2];
		
		$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';
		
		if (file_exists($path)) {
			require_once $path;
			
			if (class_exists($class, false)) {
				return true;
			} else {
				throw new \Exception("Класс $class не найден в файле $path. Проверьте правильность написания имени класса внутри указанного файла.");
			}
		} else {
			throw new \Exception("Для класса $class не найден файл $path. Проверьте наличие файла по указанному пути. Убедитесь, что пространство имен вашего класса совпадает с тем, которое пытается найти фреймворк для данного класса. Например, вы создаете класса модели, но забыли заюзать ее через use. В этом случае вы пытаетесь вызвать класс модели в пространстве имен контроллера, а такого файла нет.");
		}
		
	});

//подключение массива роутов
$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';

//Сравнивает путь прописанный в роуте и URI и возвращает курс(track) - название контроллера, действия, параметры
$track = (new Router) -> getTrack($routes, $_SERVER['REQUEST_URI']);

//Ищет переданный контроллер и проверяет, есть ли в данном контроллере переданное действие
$page = (new Dispatcher) -> getPage($track);

$menu = (new \Project\Controllers\MenuController) -> getMenu();

//Подключаем отображение представления
echo (new View) -> ViewRender($page, $menu);


?>