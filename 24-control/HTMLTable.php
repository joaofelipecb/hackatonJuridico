<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class HTMLTable{
	static private function present_header(\Hackaton\Interfac\Table $table){
		$header = $table->get_header();
		$output = '';
		$output .= '<tr>'.PHP_EOL;
		foreach($header as $head)
			$output .= '<th>'.$head.'</th>'.PHP_EOL;
		$output .= '</tr>'.PHP_EOL;
		return $output;
	}

	static private function present_body(\Hackaton\Interfac\Table $table){
		$rows = $table->get_rows();
		$header = $table->get_header();
		$output = '';
		foreach($rows as $row){
			$output .= '<tr>'.PHP_EOL;
			foreach($header as $head){
				$function = 'get_'.$head;
				$output .= '<td>'.$row->$function().'</td>'.PHP_EOL;
			}
			$output .= '</tr>'.PHP_EOL;
		}
		return $output;
	}
	static function present(\Hackaton\Interfac\Table $table){
		$output = '';
		$output .= '<table>'.PHP_EOL;
		$output .= self::present_header($table);
		$output .= self::present_body($table);
		$output .= '</table>'.PHP_EOL;
		return $output;
	}
}
