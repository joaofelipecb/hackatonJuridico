<?php
require_once(__DIR__.'/include.php');
if(isset($_POST['unclassify'])
&& isset($_POST['conflit_id'])){
	$conflit_id = intVal($_POST['conflit_id']);
	\Hackaton\Data\Conflits::unclassify($conflit_id);
	header('Location: conflit.php?id='.$conflit_id);
}
else if(isset($_POST['classify'])
&& isset($_POST['conflit_id'])
&& isset($_POST['demand_id'])){
	$conflit_id = intVal($_POST['conflit_id']);
	$demand_id = intVal($_POST['demand_id']);
	\Hackaton\Data\Conflits::classify($conflit_id,$demand_id);
	header('Location: conflit.php?id='.$conflit_id);
}
