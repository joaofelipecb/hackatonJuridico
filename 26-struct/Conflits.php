<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Conflits implements \Hackaton\Interfac\Table, \Hackaton\Interfac\Insertable{
	private $list;
	static function get_header(){
		return array('id','cod_classe_processual','cod_assunto','valor','processo_prioritario','status');
	}
	function get_rows(){
		return $this->list;
	}
	static function get_innerClassName(){
		return 'Hackaton\\Struct\\Conflit';
	}
	static function get_innerClassParameters(){
		return array('id','cod_classe_processual','cod_assunto','valor','processo_prioritario','status');
	}
	function __construct(){
		$this->list = array();
	}
	function insert($item){
		\Hackaton\Control\Clas::assert_instanceOf(get_class($item), self::get_innerClassName());
		$this->list[] = $item;
	}
}
