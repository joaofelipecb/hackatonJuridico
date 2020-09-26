<?php
namespace Hackaton\Except;
class NotFound extends \Exception{
	private $what;
	private $where;
	function __construct($what,$where){
		$this->what = $what;
		$this->where = $where;
		parent::__construct($what.' was not found in '.$where);
	}
}
