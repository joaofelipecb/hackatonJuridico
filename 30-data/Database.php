<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Database{
	static function get_connection(){
		return new \Hackaton\Struct\DatabaseConnectionMysql('localhost','root','','hackaton');
	}
}
