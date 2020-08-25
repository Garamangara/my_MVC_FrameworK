<?php
namespace Project\Controllers;
use \Core\Controller;
use \Project\Models\Hello;

class TestController extends Controller
{
	function test($params) {
		$hello = new Hello;

		return $this->render('test/test', [ 'id' => $params['id'] ]);
	}
}