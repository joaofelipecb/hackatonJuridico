<?php
namespace Hackaton\Control;
require_once(__DIR__.'/../include.php');
class HTMLTable{
	static private function present_header(\Hackaton\Interfac\Table $table, array $options = array()){
		$header = $table->get_header();
		$output = '';
		$output .= '<tr>'.PHP_EOL;
		foreach($header as $head)
			if(isset($options['headerAlias'][$head]))
				$output .= '<th>'.$options['headerAlias'][$head].'</th>'.PHP_EOL;
			else $output .= '<th>'.$head.'</th>'.PHP_EOL;
		if(isset($options['action']))
			$output .= '<th></th>'.PHP_EOL;
		$output .= '</tr>'.PHP_EOL;
		return $output;
	}

	static private function present_body(\Hackaton\Interfac\Table $table, array $options = array()){
		$rows = $table->get_rows();
		$header = $table->get_header();
		$output = '';
		foreach($rows as $row){
			$output .= '<tr>'.PHP_EOL;
			foreach($header as $head){
				$function = 'get_'.$head;
				$output .= '<td>'.$row->$function().'</td>'.PHP_EOL;
			}
			if(isset($options['action']))
				$output .= '<td><a href="'.$options['action'].$row->get_id().'">acessar</a></td>'.PHP_EOL;
			$output .= '</tr>'.PHP_EOL;
		}
		return $output;
	}
	static function present(\Hackaton\Interfac\Table $table, array $options = array()){
		$output = '';
		$output .= '<table>'.PHP_EOL;
		$output .= self::present_header($table, $options);
		$output .= self::present_body($table, $options);
		$output .= '</table>'.PHP_EOL;
		return $output;
	}
}
