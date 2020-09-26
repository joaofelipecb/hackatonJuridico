<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class DatabaseConnection{
	static function connect(\Hackaton\Struct\DatabaseConnection $connection){
		if($connection instanceOf \Hackaton\Struct\DatabaseConnectionMysql)
			return \Hackaton\Control\DatabaseConnectionMysql::connect($connection);
		throw new \Hackaton\Except\NotImplementedYet('database connection with dbms diferent of mysql');
	}
}
