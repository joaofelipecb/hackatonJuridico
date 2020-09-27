<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class Clas{
	static function assert_class_exists(string $className){
		if(!class_exists($className))
			throw new \Hackaton\Except\ClassNotExists($className);
	}
	static function assert_instanceOf(string $className, string $baseClassName){
		if(!is_subclass_of($className,$baseClassName)
		&& $className !== $baseClassName)
			throw new \Hackaton\Except\ClassConstraintException($className);
	}
}
