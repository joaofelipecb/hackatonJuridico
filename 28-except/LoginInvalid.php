<?php
namespace Hackaton\Except;
class LoginInvalid extends \Exception{
	private $user;
	function __construct($user){
		$this->user = $user;
		parent::__construct($user.' is not a valid user');
	}
}
