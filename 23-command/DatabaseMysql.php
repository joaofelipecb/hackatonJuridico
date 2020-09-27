<?php
namespace Hackaton\Command;
require_once(__DIR__.'/../include.php');
class DatabaseMysql{
	static function query(\Hackaton\Develop\DatabaseConnectionInitiedMysql $connectionInitied, string $query){
		$link = $connectionInitied->get_link();
		$result = mysqli_query($link,$query);
		if(!$result)
			throw new \Hackaton\Except\DatabaseQueryException();
		return new \Hackaton\Develop\DatabaseResultMysql($result);
	}
}
