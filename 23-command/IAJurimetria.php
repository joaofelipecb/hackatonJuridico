<?php
namespace Hackaton\Command;
require_once(__DIR__.'/../include.php');
class IAJurimetria{
	static function call($id){
		$conflit = \Hackaton\Data\Conflits::get_by_id($id);
		$command = 'C:\\Users\\usuario\\AppData\\Local\\Programs\\Python\\Python38-32\\python.exe IAJurimetria.py';
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
		$improcedente = trim($parts[0]);
		$parcial = trim($parts[1]);
		$procedente = trim($parts[2]);
		echo $improcedente ."\n".$parcial."\n".$procedente."\n";
	}
}
IAJurimetria::call($_GET['id']);