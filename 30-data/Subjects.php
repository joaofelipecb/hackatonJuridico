<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Subjects{
	function get_by_id(int $id){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT subject_id as id, subject_name as name
FROM subjects
WHERE subject_id = $id;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValid('\\Hackaton\\Struct\\Subject');
		$conflicts = \Hackaton\Control\Database::get($result,$class);
		return $conflicts;
	}
}
