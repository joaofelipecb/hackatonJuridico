<?php
namespace Hackaton\Interfac;
require_once(__DIR__.'/../include.php');
interface Insertable{
	static function get_innerClassName();
	static function get_innerClassParameters();
	function insert($item);
}
