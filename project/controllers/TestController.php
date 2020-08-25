<?php
namespace Project\Controllers;
use \Core\Controller;
use \Project\Models\Hello;
use \Project\Models\Menu;

class TestController extends Controller
{
	function test($params) {
		$hello = new Hello;

		$menu = (new Menu)->getMenu();

		$this->sidebarData = ['menu' => $menu];
		$this->headerData = ['header' => 'хедер'];
		$this->footerData = ['footer' => 'футер'];
		$this->title = 'Все';

		return $this->render('test/test', [ 'id' => $params['id'] ]);
	}
}