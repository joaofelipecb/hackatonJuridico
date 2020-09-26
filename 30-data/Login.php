<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../26-struct/MenuItem.php');
class Login{
	static function get_user_list(){
		return array('judicial','extrajudicial');
	}
	static function get_menu_list_judicial(){
		return array(
			new \Hackaton\Struct\MenuItem('Processos','processes.php'),
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