<?php
require_once(__DIR__.'/include.php');
var_dump($_POST);
if(isset($_POST['conflit_id'])
&& isset($_POST['draw'])){
	$conflit_id = intVal($_POST['conflit_id']);
	$parts = explode(';',$_POST['draw']);
	$improcedente = floatVal($parts[0]);
	$parcial = floatVal($parts[1]);
	$procedente = floatVal($parts[2]);
	$draw = mt_rand() / mt_getrandmax();
	if($draw <= $improcedente)
		$result = 'improcedente';
	else if($draw <= ($improcedente+$parcial))
		$result = 'parcial';
	else $result = 'procedente';
	\Hackaton\Data\Conflits::draw($conflit_id,$result);
	header('Location: conflit.php?id='.$conflit_id);
}
