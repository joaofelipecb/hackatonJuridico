<?php
require_once(__DIR__.'/24-control/Login.php');
\Hackaton\Control\Login::redirect_if_logged();
?>
<!DOCTYPE html>
<html>
<head>
	<style link="style.css" rel="stylesheet"></style>
	<title>Desjudicializa!</title>
</head>
<body>
	<h1>Desjudicializa!</h1>
	<?php
	if(isset($_GET['loginError'])){ ?>
	<div class="error">
Login incorreto, tente novamente.	
	</div>
	<?php }
	?>
	<form action="login.php" method="post">
		<div class="table">
			<div class="tr>
				<div class="td"><label for="">usu&aacute;rio:</label></div>
				<div class="td"><input name="user"></div>
			</div>
			<div class="tr">
				<div class="td"><label for="">senha:</label></div>
				<div class="td"><input name="pass" type="password"></div>
			</div>
			<div class="tr">
				<div class="td"></label></div>
				<div class="td"><input type="submit"></div>
			</div>
		</div>
	</form>
</body>
</html>
