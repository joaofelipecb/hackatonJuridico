<?php
namespace Hackaton\Except;
require_once(__DIR__.'/../include.php');
class ClassNotExists extends \Exception{
	private $className;
	function __construct($className){
		$this->className = $className;
		parent::__construct('Class '.$className.' does not exists');
	}
}
