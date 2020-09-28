<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Conflits{
	function select(){
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
	}
	function get_by_id(int $id){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT conflit_id as id, conflit_cod_classe_processual as cod_classe_processual, conflit_cod_assunto as cod_assunto,
       conflit_valor as valor, conflit_processo_prioritario as processo_prioritario, conflit_status as status,
	   demand_id, conflit_draw as draw
FROM conflits
WHERE conflit_id = $id;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValid('\\Hackaton\\Struct\\Conflit');
		$conflicts = \Hackaton\Control\Database::get($result,$class);
		return $conflicts;
	}
	function classify(int $conflit_id, int $demand_id ){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
UPDATE conflits
SET
	demand_id = $demand_id,
	conflit_status = 'classificado'
WHERE conflit_id = $conflit_id;
HEREDOC;
		\Hackaton\Command\Database::query($connectionInitied, $query);
	}
	function unclassify(int $conflit_id){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
UPDATE conflits
SET
	conflit_status = 'desclassificado'
WHERE conflit_id = $conflit_id;
HEREDOC;
		\Hackaton\Command\Database::query($connectionInitied, $query);
	}
	function draw(int $conflit_id, string $result){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
UPDATE conflits
SET
	conflit_status = 'sorteado',
	conflit_draw = '$result'
WHERE conflit_id = $conflit_id;
HEREDOC;
		\Hackaton\Command\Database::query($connectionInitied, $query);
	}
}
