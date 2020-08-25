<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'framework');

define('DB_CHARSET', 'utf8');
define('DB_DRIVER', 'mysql');

// try {
// 	$pdo = new PDO(" $db_type:host=".DB_HOST.";dbname=".DB_NAME."; charset=$charset ", DB_USER, DB_PASS);
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $error) {
// 	echo 'Подключение не удалось: ' . $error->getMessage();
// }

?>