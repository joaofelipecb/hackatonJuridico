<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Bot{
	private $id;
	private $name;
	private $code;
	function __construct(int $id, string $name, string $code){
		$this->id = $id;
		$this->name = $name;
		$this->code = $code;
	}
	function get_id(){
		return $this->id;
	}
	function get_name(){
		return $this->name;
	}
	function get_code(){
		return $this->code;
	}
}
