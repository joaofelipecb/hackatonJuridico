<?php
require_once(__DIR__.'/include.php');
try{
	\Hackaton\Control\Login::assert_user_is_allowed_action('conflit.php');
}
catch(\Hackaton\Except\UserForbiden $e){
	header('Location: user_forbiden.php');
}
$invalidId = false;
if(!isset($_GET['id']))
	$invalidId = true;
if(!is_numeric($_GET['id']))
	$invalidId = true;
if($invalidId)
	header('Location: conflits.php');
$conflitId = intVal($_GET['id']);
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
		<nav>
			<?php
			echo \Hackaton\Control\Menu::present_html();
			?>
		</nav>
	</header>
	<div class="bigboxborder">
	<div class="bigbox">
		<div class="title">Conflito</div>
		<?php
		$conflit = \Hackaton\Data\Conflits::get_by_id($conflitId);
		?>
		<div class="margin">
		<span class="big"><b>ID:</b> <?=$conflit->get_id()?></span><br />
		<span class="big"><b>Cod. Classe Processual:</b> <?=$conflit->get_cod_classe_processual()?></span><br />
		<span class="big"><b>Cod. Assunto:</b> <?=$conflit->get_cod_assunto()?></span><br />
		<span class="big"><b>Valor:</b> <?=$conflit->get_valor()?></span><br />
		<span class="big"><b>Processo Priorit&aacute;rio:</b> <?=$conflit->get_processo_prioritario()?></span><br />
		<span class="big"><b>Status:</b> <?=$conflit->get_status()?></span><br />
		</div>
		<div class="title">Etapa 1 - Identifica&ccedil;&atilde;o da Demanda Repetitiva</div>
	</div>
	</div>
</body>
</html>
