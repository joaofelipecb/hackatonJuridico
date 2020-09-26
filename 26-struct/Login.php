<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../24-control/Login.php');
class Login{
	static protected function set_user(string $user){
		setcookie('login',$user);
	}
	static function clear_user(){
		setcookie('login','',0);
	}
	static function get_user(){
		\Hackaton\Control\Login::get_user_if_exists();
	}
}
