<?php
namespace Project\Controllers;
use \Core\Controller;
// use \Project\Models\Hello;
use \Project\Models\Menu;

class TestController extends Controller
{
	function test($params) {

		$this->title = 'У меня все получилось!!!!!!';

		$menu = (new Menu)->getMenu();

		$chanks = [
			'footer' => $this->setChank('project/pages/footers/default.php', ['footer' => 'футер']),
			'header' => $this->setChank('project/pages/headers/default.php', ['header' => 'хедер']),
			'sidebar' => $this->setChank('project/pages/sidebars/right/default.php', ['menu' => $menu]),
			'content' => $this->setChank('project/views/test/test.php', ['id' => $params['id']]),
		];

		return $this->render($chanks);
	}
}