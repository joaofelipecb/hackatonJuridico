<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Conflits implements \Hackaton\Interfac\Table{
	private $list;
	function __construct(){
		$this->list = array();
	}
	function add_conflit(Conflit $conflit){
		$this->list[] = $conflit;
	}
}
