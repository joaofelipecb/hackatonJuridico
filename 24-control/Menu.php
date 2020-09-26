<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class Menu{
	static function present_html(){
		$menuList = \Hackaton\Control\Login::get_menu_list_by_role();
		$output = '';
		foreach($menuList as $menu)
			$output .= '<div><a href="'.$menu->get_action().'">'.$menu->get_name().'</a></div>'.PHP_EOL;
		return $output;
	}
}