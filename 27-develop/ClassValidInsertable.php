<?php
namespace Hackaton\Develop;
require_once(__DIR__.'/../include.php');
class ClassValidInsertable extends ClassValid{
	function __construct(string $className){
		\Hackaton\Control\Clas::assert_instanceOf($className,'\\Hackaton\\Interfac\\Insertable');
		parent::__construct($className);
	}
}
