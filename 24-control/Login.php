<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../28-except/LoginInvalid.php');
require_once(__DIR__.'/../30-data/Login.php');
class Login{
	static function is_logged(){
		return (isset($_COOKIE['login'])
				&& ($_COOKIE['login'] === 'judicial'
					|| $_COOKIE['login'] === 'extrajudicial'));
	}
	static function get_user_if_exists(){
		if(isset($_COOKIE['login']))
			return $_COOKIE['login'];
		else return null;
	}
	static function assert_user_exists(string $user){
		if(in_array($user,\Hackaton\Data\Login::get_user_list()))
			return;
		throw new \Hackaton\Except\LoginInvalid($user);
	}
	static function redirect_if_logged(){
		if(self::is_logged())
			header('Location: home.php');
	}
	static function redirect_if_not_logged(){
		if(!self::is_logged())
			header('Location: index.php');
	}
	static function get_menu_list_by_role(){
		if(!self::is_logged())
			return array();
		if($_COOKIE['login'] === 'judicial')
			return \Hackaton\Data\Login::get_menu_list_judicial();
		else if($_COOKIE['login'] === 'extrajudicial')
			return \Hackaton\Data\Login::get_menu_list_extrajudicial();
	}
}