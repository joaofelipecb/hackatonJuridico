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
		$result = str_replace(' NULL','',passthru($command));
	}
}
IADemandasRepetitivas::call($_GET['id']);
