<?php
use \Core\Route;

	//роуты, которые будут использоваться на сайте
	return [
		//Тестовый роут (проверка подключения к БД)
		new Route('/test/:id/', 'test', 'test'),
		new Route('/', 'home', 'home'),
	];