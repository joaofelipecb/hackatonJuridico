<?php
namespace Hackaton\Struct;
class LoginInvalid extends \Exception{
	function __construct($user){
		parent::__construct($user.' is not a valid user');
	}
}
