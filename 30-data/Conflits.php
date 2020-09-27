<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Conflits{
	function select(){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT conflit_id as id, conflit_status as status
FROM conflits
LIMIT 25;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValidInsertable('\\Hackaton\\Struct\\Conflits');
		$conflicts = \Hackaton\Control\Database::fetch($result,$class);
		return $conflicts;
	}
}
