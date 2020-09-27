<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class Database{
	static private function assoc(array $row, array $innerClassParameters, string $innerClassName){
		$arguments = array();
		foreach($innerClassParameters as $innerClassParameter)
			$arguments[] = $row[$innerClassParameter];
		return new $innerClassName(...$arguments);
	}
	static function fetch(\Hackaton\Develop\DatabaseResult $result, \Hackaton\Develop\ClassValidInsertable $class){
		$className = $class->get_className();
		$innerClassName = $className::get_innerClassName();
		$innerClassParameters = $className::get_innerClassParameters();
		$resultMysql = $result->get_resource();
		$insertable = new $className();
		while(!is_null($row = mysqli_fetch_assoc($resultMysql))){
			var_dump($row);
			$insertable->insert(self::assoc($row, $innerClassParameters, $innerClassName));
		}
		return $insertable;
	}
}
