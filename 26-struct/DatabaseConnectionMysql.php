<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class DatabaseConnectionMysql extends DatabaseConnection{
	private $host;
	private $user;
	private $password;
	private $dbname;
	function __construct(string $host, string $user, string $password, string $dbname){
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->dbname = $name;
	}
	function get_dbms(){
		return $this->dbms;
	}
	function get_host(){
		return $this->host;
	}
	function get_user(){
		return $this->user;
	}
	function get_password(){
		return $this->password;
	}
	function get_dbname(){
		return $this->dbname;
	}
}
