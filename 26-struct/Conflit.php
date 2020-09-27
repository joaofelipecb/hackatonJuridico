<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Conflit{
	private $id;
	private $status;
	function __construct(int $id, string $status){
		$this->id = $id;
		$this->status = $status;
	}
	function get_id(){
		return $this->id;
	}
	function get_status(){
		return $this->status;
	}
}
