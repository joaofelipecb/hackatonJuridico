<?php
namespace Hackaton\Develop;
require_once(__DIR__.'/../include.php');
class ClassValid extends \Hackaton\Struct\Clas{
	function __construct(string $className){
		\Hackaton\Control\Clas::assert_class_exists($className);
		parent::__construct($className);
	}
}
