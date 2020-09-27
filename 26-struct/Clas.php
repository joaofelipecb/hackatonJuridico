<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Clas{
	private $className;
	function __construct(string $className){
		$this->className = $className;
	}
	function get_className(){
		return $this->className;
	}
}
