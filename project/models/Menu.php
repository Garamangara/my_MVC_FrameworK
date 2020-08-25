<?php
namespace Project\Models;
use Core\Model;

class Menu extends Model
{
	function getMenu() {
		$sql = "SELECT * FROM category";
		$result = $this->findAll($sql);

		return $result;
	}
}