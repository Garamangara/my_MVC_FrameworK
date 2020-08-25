<?php
namespace Project\Controllers;
use \Core\Sidebar;
use \Project\Models\Menu;

class MenuController extends Sidebar
{
	function getMenu() {
		$sidebar = new Menu;

		$menu = $sidebar->getMenu();

		return new Sidebar('right/default', [ 'menu' => $menu ]);
	}
}