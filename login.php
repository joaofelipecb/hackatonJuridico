<?php
require_once(__DIR__.'/include.php');
if(!isset($_POST['user'])
|| !isset($_POST['pass'])){
	//header('Location: index.php');
}
$user = $_POST['user'];
$pass = $_POST['pass'];
try{
	\Hackaton\Develop\LoginValid::set_user($user);
	header('Location: home.php');
}
catch(\Hackaton\Except\LoginInvalid $e){
	header('Location: index.php?loginError');
}

