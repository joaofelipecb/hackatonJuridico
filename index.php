<?php
require_once(__DIR__.'/include.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link href="30-data/style.css" rel="stylesheet"></style>
	<title>Desjudica</title>
</head>
<body>
	<header>
		<div class="logo">DES<span class="logodetail">JUDICA</span></div>
	</header>
	<div class="smallboxborder">
	<div class="smallbox">
		<div class="title">Acessar sua conta <span class="logostyle">DESJUDICA</span></div>
		<?php
		if(isset($_GET['loginError'])){ ?>
		<div class="error">
Login incorreto, tente novamente.	
		</div>
		<?php } ?>
		<form action="login.php" method="post">
			<div>
				<div class="spaced">
					<div><label for="" class="big">usu&aacute;rio:</label></div>
					<div><input name="user" class="big"></div>
				</div>
				<div class="spaced">
					<div><label for="" class="big">senha:</label></div>
					<div><input name="pass" type="password" class="big"></div>
				</div>
				<div class="spaced">
					<div></div>
					<div><input class="bigbutton" type="submit" style="margin-left:123px;"></div>
				</div>
			</div>
		</form>
	</div>
	</div>
</body>
</html>
