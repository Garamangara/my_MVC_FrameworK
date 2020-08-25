<?php
namespace Core;
//юзаем PDO, чтобы не возникало путаницы в пространствах имен. Если этого не сделать класс PDO скрипт будет искать в Core\PDO
use PDO;

// class Model
// {
// 	//чтобы конструктор запускался при создании первой модели, а остальные модели использовали существующее подключение
// 	//свойство делаем статическим
// 	private static $link;

// 	function __construct() {
// 		if(!self::$link) {
// 			try {
// 				//обработка ошибок
// 				$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// 				self::$link = new PDO("".DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET."", 
// 					DB_USER, DB_PASS, $options);

// 			} catch (PDOException $error) {
// 				echo 'Connection falded: ' . $error->getMessage();
// 			}
// 		}
// 	}

// 	// protected function findOne($query) {

// 	// }

// 	protected function findAll($query) {
// 		try {

// 			$exe = $this->execute($query);
// var_dump($exe);
// 			$result = $exe->fetchAll(PDO::FETCH_ASSOC);
		


// 			if($result === false) {
// 				return [];
// 			}

// 			return $result;

// 		} catch (PDOException $error) {
// 			echo 'findAll falded: ' . $error->getMessage();
// 		}
// 	}

// 	protected  function execute($query) {
// 		// try {

// 			$prepare = self::$link->prepare($query);
// var_dump($prepare);
// 			return $prepare->execute();

// 		// } catch (PDOException $error) {
// 		// 	echo 'findAll falded: ' . $error->getMessage();
// 		// }
// 	}

// }

// namespace Core;

class Model
{
	private static $link;
	
	public function __construct()
	{
		if (!self::$link) {
			self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			mysqli_query(self::$link, "SET NAMES 'utf8'");
		}
	}
	
	protected function findOne($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return mysqli_fetch_assoc($result);
	}
	
	protected function findAll($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		return $data;
	}
}