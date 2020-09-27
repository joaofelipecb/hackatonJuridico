<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Demands{
	/*function select(){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT conflit_id as id, conflit_cod_classe_processual as cod_classe_processual, conflit_cod_assunto as cod_assunto,
       conflit_valor as valor, conflit_processo_prioritario as processo_prioritario, conflit_status as status
FROM conflits
LIMIT 25;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValidInsertable('\\Hackaton\\Struct\\Conflits');
		$conflicts = \Hackaton\Control\Database::fetch($result,$class);
		return $conflicts;
	}*/
	function get_by_id(int $id){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT demand_id as id, demand_name as name
FROM demands
WHERE demand_id = $id;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValid('\\Hackaton\\Struct\\Demand');
		$conflicts = \Hackaton\Control\Database::get($result,$class);
		return $conflicts;
	}
}
