<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class Database{
	static private function fetch_fields($resource){
		$fields = mysqli_fetch_fields($resource);
		$types = array();
		foreach($fields as $field) {
			if($field->type == 3)
				$types[$field->name] = 'int';
			else
				$types[$field->name] = null;
		}
		return $types;
	}
	static private function assoc(array $row, array $innerClassParameters, array $types, string $innerClassName){
		$arguments = array();
		foreach($innerClassParameters as $innerClassParameter)
			if($types[$innerClassParameter] == 'int')
				$arguments[] = intVal($row[$innerClassParameter]);
			else $arguments[] = $row[$innerClassParameter];
		return new $innerClassName(...$arguments);
	}
	static function fetch(\Hackaton\Develop\DatabaseResult $result, \Hackaton\Develop\ClassValidInsertable $class){
		$className = $class->get_className();
		$innerClassName = $className::get_innerClassName();
		$innerClassParameters = $className::get_innerClassParameters();
		$resultMysql = $result->get_resource();
		$insertable = new $className();
		$types = self::fetch_fields($resultMysql);
		while(!is_null($row = mysqli_fetch_assoc($resultMysql)))
			$insertable->insert(self::assoc($row, $innerClassParameters, $types, $innerClassName));
		return $insertable;
	}
	static function get(\Hackaton\Develop\DatabaseResult $result, \Hackaton\Develop\ClassValid $class){
		$className = $class->get_className();
		$resultMysql = $result->get_resource();
		$row = mysqli_fetch_assoc($resultMysql);
		if(is_null($row))
			throw new \Hackaton\Except\NotFound('by id',$className);
		$row = array_values($row);
		$object = new $className(...$row);
		return $object;
	}
}
