<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class LoginJudicial extends Login{
	static function get_actions_allowed(){
		return array('home.php','conflits.php','bots.php');
	}
	static function get_menu_list(){
		return array(
			new \Hackaton\Struct\MenuItem('Conflitos','conflits.php'),
			new \Hackaton\Struct\MenuItem('Robos','bots.php'),
			new \Hackaton\Struct\MenuItem('Sair','logout.php')
		);
	}
}
