<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class LoginExtrajudicial extends Login{
	static function get_actions_allowed(){
		return array('home.php','bots.php');
	}
	static function get_menu_list(){
		return array(
			new \Hackaton\Struct\MenuItem('Robos','bots.php'),
			new \Hackaton\Struct\MenuItem('Sair','logout.php')
		);
	}
}