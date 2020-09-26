<?php
require_once(__DIR__.'/24-control/Login.php');
require_once(__DIR__.'/24-control/Menu.php');
\Hackaton\Control\Login::redirect_if_not_logged();
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
