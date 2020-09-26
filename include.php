<?php
spl_autoload_register(function ($class_name) {
    $parts = explode('\\',$class_name);
	if(count($parts) <= 2)
		return;
	if($parts[0] != 'Hackaton')
		return;
	$table = array('Command' => '23-command',
                   'Control' => '24-control',
				   'Interfac' => '25-interface',
				   'Struct' => '26-struct',
				   'Develop' => '27-develop',
				   'Except' => '28-except',
				   'Test' => '29-test',
				   'Data' => '30-data');
	if(!isset($table[$parts[1]]))
		return;
	$dir = $table[$parts[1]];
	require_once(__DIR__.'/'.$dir.'/'.$parts[2].'.php');
});