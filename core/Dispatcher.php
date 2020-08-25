<?php
namespace Core;

class Dispatcher
{
	/**
	*	Принимает объект класса Track.
	* Создает путь по пространству имен к контроллеру, переданному свойством объекта класса Track
	*	Возвращает метод контроллера с переданными параметрами
	*/
	function getPage(Track $track)
	{
		$name = ucfirst($track->controller).'Controller';
		$fullName = "\\Project\\Controllers\\$name";

		try {
			$controller = new $fullName;

			//если метод в классе существует
			if(method_exists($controller, $track->action)) {
				$result = $controller->{$track->action}($track->params);

				if($result) {
					return $result;
				} else {
					return new Page('default', null, null, null, null);
				}

			} else {
				echo "Метод {$track->action} не найден в классе $fullName"; die();
			}

		} catch (\Excption $error) {
			echo $error->getMessage(); die();
		}
	}

}