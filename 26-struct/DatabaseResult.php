<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class DatabaseResult{
	private $resource;
	function __construct($resource){
		$this->resource = $resource;
	}
	function get_resource(){
		return $this->resource;
	}
}
