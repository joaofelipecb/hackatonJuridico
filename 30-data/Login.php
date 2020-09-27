<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Login{
	static function get_user_list(){
		return array('judicial','extrajudicial');
	}
}