<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Login{
	static protected function set_user_protected(string $user){
		setcookie('login',$user);
	}
	static function clear_user(){
		setcookie('login','',0);
	}
	static function get_user(){
		return \Hackaton\Control\Login::get_user_or_empty();
	}
	function __toString(){
		return self::get_user();
	}
}
