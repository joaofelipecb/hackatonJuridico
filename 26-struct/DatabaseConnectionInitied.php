<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class DatabaseConnectionInitied extends DatabaseConnection{
	private $host;
	private $user;
	private $password;
	private $dbname;
	private $link;
	function __construct(string $host, string $user, string $password, string $dbname, \mysqli $link){
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->link = $link;
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
	function get_link(){
		return $this->link;
	}
}
