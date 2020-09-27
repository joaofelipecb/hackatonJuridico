<?php
namespace Hackaton\Command;
require_once(__DIR__.'/../include.php');
class IADemandasRepetitivas{
	static function call($id){
		$conflit = \Hackaton\Data\Conflits::get_by_id($id);
		$command = 'C:\\Users\\usuario\\AppData\\Local\\Programs\\Python\\Python38-32\\python.exe IADemandasRepetitivas.py';
		$command .= ' '.$conflit->get_cod_classe_processual();
		$command .= ' '.$conflit->get_cod_assunto();
		$command .= ' '.$conflit->get_valor();
		$command .= ' '.($conflit->get_processo_prioritario()=='S'?1:0);
		ob_start();
		passthru($command);
		$result = ob_get_contents();
		ob_end_clean();
		$result = str_replace(' NULL','',$result);
		$parts = explode("\n",$result);
		$demand_id = trim($parts[0]);
		$demand_repeatable = trim($parts[1]);
		$demand = \Hackaton\Data\Demands::get_by_id($demand_id);
		echo $demand_id."\n".$demand_repeatable."\n".$demand->get_name()."\n";
	}
}
IADemandasRepetitivas::call($_GET['id']);
