<?php
require_once(__DIR__.'/include.php');
try{
	\Hackaton\Control\Login::assert_user_is_allowed_action('home.php');
}
catch(\Hackaton\Except\UserForbiden $e){
	header('Location: user_forbiden.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<style link="style.css" rel="stylesheet"></style>
	<title>Desjudicializa!</title>
</head>
<body>
	<h1>Desjudicializa!</h1>
	<nav>
		<?php
		echo \Hackaton\Control\Menu::present_html();
		?>
	</nav>
	
</body>
</html>
