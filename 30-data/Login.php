<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Login{
	static function get_user_list(){
		return array('judicial','extrajudicial');
	}
	static function get_actions_allowed_judicial(){
		return array('home.php','conflits.php','bots.php');
	}
	static function get_actions_allowed_extrajudicial(){
		return array('home.php','bots.php');
	}
	static function get_menu_list_judicial(){
		return array(
			new \Hackaton\Struct\MenuItem('Conflitos','conflits.php'),
			new \Hackaton\Struct\MenuItem('Robos','bots.php'),
			new \Hackaton\Struct\MenuItem('Sair','logout.php')
		);
	}
	static function get_menu_list_extrajudicial(){
		return array(
			new \Hackaton\Struct\MenuItem('Robos','bots.php'),
			new \Hackaton\Struct\MenuItem('Sair','logout.php')
		);
	}
}