<?php
namespace Hackaton\Struct;
class MenuItem{
	private $name;
	private $action;
	function __construct(string $name,string $action){
		$this->name = $name;
		$this->action = $action;
	}
	function get_name(){
		return $this->name;
	}
	function get_action(){
		return $this->action;
	}
}