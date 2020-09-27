<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class Login{
	static function is_logged(){
		return (isset($_COOKIE['login'])
				&& ($_COOKIE['login'] === 'judicial'
					|| $_COOKIE['login'] === 'extrajudicial'));
	}
	static function get_user_or_empty(){
		if(!isset($_COOKIE['login']))
			return '';
		return $_COOKIE['login'];
	}
	static function get_login_if_logged(){
		if(!isset($_COOKIE['login']))
			return null;
		$login = $_COOKIE['login'];
		if(\Hackaton\Command\Login::is_role_judicial($login))
			return new \Hackaton\Develop\LoginJudicial($login);
		else if(\Hackaton\Command\Login::is_role_extrajudicial($login))
			return new \Hackaton\Develop\LoginExtrajudicial($login);
		else return null;
	}
	static function get_data_by_role(\Hackaton\Develop\LoginValid $login){
		if($login instanceOf \Hackaton\Develop\LoginJudicial)
			return '\Hackaton\Data\LoginJudicial';
		else if($login instanceOf \Hackaton\Develop\LoginExtrajudicial)
			return '\Hackaton\Data\LoginExtrajudicial';
		throw new \Hackaton\Except\NotFound(get_class($login),'\Hackaton\Data');
	}
	static function assert_user_is_allowed_action(string $action){
		if(!self::is_logged())
			throw new \Hackaton\Except\UserForbiden(null,$action);
		$user = self::get_login_if_logged();
		$data = self::get_data_by_role($user);
		$allowed = $data::get_actions_allowed();
		if(!in_array($action,$allowed))
			throw new \Hackaton\Except\UserForbiden($user,$action);
	}
	static function assert_user_exists(string $user){
		if(in_array($user,\Hackaton\Data\Login::get_user_list()))
			return;
		throw new \Hackaton\Except\LoginInvalid($user);
	}
	static function get_menu_list_by_role(){
		$login = self::get_login_if_logged();
		if($login instanceOf \Hackaton\Develop\LoginJudicial)
			return \Hackaton\Data\LoginJudicial::get_menu_list();
		else if($login instanceOf \Hackaton\Develop\LoginExtrajudicial)
			return \Hackaton\Data\LoginExtrajudicial::get_menu_list();
		throw new \Hackaton\Except\NotFound(get_class($login),'\Hackaton\Data');
	}
}