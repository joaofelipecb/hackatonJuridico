<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class DatabaseConnectionMysql{
	static function connect(\Hackaton\Struct\DatabaseConnectionMysql $connection){
		$host = $connection->get_host();
		$user = $connection->get_user();
		$password = $connection->get_password();
		$dbname = $connection->get_dbname();
		$link = mysqli_connect($host,$user,$password,$dbname);
		if(!$link)
			throw new \Hackaton\Except\DatabaseConnectionException();
		return new \Hackaton\Struct\DatabaseConnectionInitiedMysql($host,$user,$password,$dbname,$link);
	}
}