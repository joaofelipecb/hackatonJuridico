<?php
namespace Hackaton\Command;
require_once(__DIR__.'/../include.php');
class Database{
	static function query(\Hackaton\Develop\DatabaseConnectionInitied $connectionInitied, string $query){
		if($connectionInitied instanceOf \Hackaton\Develop\DatabaseConnectionInitiedMysql)
			return \Hackaton\Command\DatabaseMysql::query($connection, $query);
		throw new \Hackaton\Except\NotImplementedYet('database connection with dbms diferent of mysql');
	}
}
