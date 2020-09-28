<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Demands{
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
