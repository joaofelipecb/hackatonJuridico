<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Bots implements \Hackaton\Interfac\Insertable{
	private $list;
	static function get_innerClassName(){
		return 'Hackaton\\Struct\\Bot';
	}
	static function get_innerClassParameters(){
		return array('id','name','code');
	}
	function __construct(){
		$this->list = array();
	}
	function insert($item){
		\Hackaton\Control\Clas::assert_instanceOf(get_class($item), self::get_innerClassName());
		$this->list[] = $item;
	}
	function get_list(){
		return $this->list;
	}
}
