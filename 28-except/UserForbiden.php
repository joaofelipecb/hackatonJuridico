<?php
namespace Hackaton\Except;
class UserForbiden extends \Exception{
	private $user;
	private $action;
	function __construct($user,$action){
		$this->user = $user;
		$this->action = $action;
		parent::__construct($user.' is forbiden to'.$action);
	}
}
