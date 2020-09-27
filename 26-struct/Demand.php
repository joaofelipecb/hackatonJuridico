<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Demand{
	private $id;
	private $name;
	function __construct(int $id, string $name){
		$this->id = $id;
		$this->name = $name;
	}
	function get_id(){
		return $this->id;
	}
	function get_name(){
		return $this->name;
	}
}
