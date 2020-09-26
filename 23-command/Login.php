<?php
namespace Hackaton\Command;
require_once(__DIR__.'/../include.php');
class Login{
	static function is_role_judicial(string $login){
		return $login === 'judicial';
	}
	static function is_role_extrajudicial(string $login){
		return $login === 'extrajudicial';
	}
}
