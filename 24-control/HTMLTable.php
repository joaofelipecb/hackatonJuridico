<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class HTMLTable{
	static function present(\Hackaton\Interfac\Table $table){
		$output = '';
		$output .= '<table>'.PHP_EOL;
		if($table->has_header())
			$output .= self::present_header($table);
		$output .= self::present_body($table);
		$output .= '</table>'.PHP_EOL;
		return $output;
	}
}
