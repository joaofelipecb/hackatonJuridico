<?php
namespace Hackaton\Data;
require_once(__DIR__.'/../include.php');
class Bots{
	function select(){
		$connection = Database::get_connection();
		$connectionInitied = \Hackaton\Control\DatabaseConnection::connect($connection);
		$query = <<<HEREDOC
SELECT bot_id as id, bot_name as name, bot_code as code
FROM bots
LIMIT 25;
HEREDOC;
		$result = \Hackaton\Command\Database::query($connectionInitied, $query);
		$class = new \Hackaton\Develop\ClassValidInsertable('\\Hackaton\\Struct\\Bots');
		$bots = \Hackaton\Control\Database::fetch($result,$class);
		return $bots;
	}
}
