<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class ProcessClasses{
	function get_by_id(int $id){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT process_class_id as id, process_class_name as name
FROM process_classes
WHERE process_class_id = $id;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValid('\\Hackaton\\Struct\\ProcessClass');
		$conflicts = \Hackaton\Control\Database::get($result,$class);
		return $conflicts;
	}
}
