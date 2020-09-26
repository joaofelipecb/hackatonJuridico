<?php
namespace Hackaton\Develop;
require_once(__DIR__.'/../24-control/Login.php');
require_once(__DIR__.'/../26-struct/Login.php');
class LoginValid extends \Hackaton\Struct\Login{
	static function set_user(string $user){
		\Hackaton\Control\Login::assert_user_exists($user);
		parent::set_user($user);
	}
}
