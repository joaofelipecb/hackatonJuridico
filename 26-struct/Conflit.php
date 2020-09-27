<?php
namespace Hackaton\Struct;
require_once(__DIR__.'/../include.php');
class Conflit{
	private $id;
	private $cod_classe_processual;
	private $cod_assunto;
	private $valor;
	private $processo_prioritario;
	private $status;
	private $demand_id;
	function __construct(int $id, int $cod_classe_processual, int $cod_assunto, float $valor, string $processo_prioritario, string $status, $demand_id=null){
		$this->id = $id;
		$this->cod_classe_processual = $cod_classe_processual;
		$this->cod_assunto = $cod_assunto;
		$this->valor = $valor;
		$this->processo_prioritario = $processo_prioritario;
		$this->status = $status;
		$this->demand_id = $demand_id;
	}
	function get_id(){
		return $this->id;
	}
	function get_cod_classe_processual(){
		return $this->cod_classe_processual;
	}
	function get_cod_assunto(){
		return $this->cod_assunto;
	}
	function get_valor(){
		return $this->valor;
	}
	function get_processo_prioritario(){
		return $this->processo_prioritario;
	}
	function get_status(){
		return $this->status;
	}
	function get_demand_id(){
		return $this->demand_id;
	}
}
