<?php
namespace Hackaton\Except;
require_once(__DIR__.'/../include.php');
class NotImplementedYet extends \Exception{
	private $what;
	function __construct($what){
		$this->what = $what;
		parent::__construct($what.' was not implemented yet');
	}
}
