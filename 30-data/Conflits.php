<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Conflits{
	function select(){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT conflit_id, conflit_status
FROM conflits
LIMIT 25;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$conflicts = \Hackaton\Control\Database::fetch($result,'\Hackaton\Struct\Conflits');
		return $conflicts;
	}
}
