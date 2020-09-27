<?php
namespace Hackaton\Interfac;
require_once(__DIR__.'/../include.php');
interface Table{
	static function get_header();
	function get_rows();
}
