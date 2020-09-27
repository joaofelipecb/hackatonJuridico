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
	<script src="24-control/Ajax.js"></script>
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
		<script>
var timer_barra;
var barra_progresso;
var barra_progresso_ac;
function animar_barra(){
	var demandaRepetitivasBar = document.getElementById('demandaRepetitivasBar');
	var demandaRepetitivasBarInner = document.getElementById('demandaRepetitivasBarInner');
	var demandaRepetitivasDivForm = document.getElementById('demandaRepetitivasDivForm');
	demandaRepetitivasBarInner.style.width = barra_progresso+'px';
	if(barra_progresso_ac>0.3)
		barra_progresso_ac-=0.042;
	barra_progresso+=barra_progresso_ac;
	if(barra_progresso>=298){
		clearInterval(timer_barra);
		demandaRepetitivasBar.style.display = 'none';
		demandaRepetitivasDivForm.style.display = 'block';
	}
}

function demanda_repetitiva_start(){
	var demandaRepetitivasAIButton = document.getElementById('demandaRepetitivasAIButton');
	var demandaRepetitivasBar = document.getElementById('demandaRepetitivasBar');
	demandaRepetitivasBar.style.display = 'block';
	demandaRepetitivasAIButton.style.display = 'none';
	barra_progresso_ac = 5;
	barra_progresso = 1;
	timer_barra = setInterval(animar_barra,60);
}
function demanda_repetitiva_callback(data){
	var parts = data.split('\n');
	var codigo_demanda = document.getElementById('codigo_demanda');
	var demanda_repetitiva = document.getElementById('demanda_repetitiva');
	var demandaRepetitivasButtonClassificar = document.getElementById('demandaRepetitivasButtonClassificar');
	codigo_demanda.value = parts[0].trim();
	if(parts[1].trim()=='True'){
		demanda_repetitiva.value = 'sim';
		demandaRepetitivasButtonClassificar.style.display = 'inline-block';
	}
	else{
		demanda_repetitiva.value = 'não';
		demandaRepetitivasButtonClassificar.style.display = 'none';
	}
}
		</script>
		<input id="demandaRepetitivasAIButton" type="button" onclick="demanda_repetitiva_start();ajaxCall('23-command/IADemandasRepetitivas.php?id=<?=$conflit->get_id()?>',demanda_repetitiva_callback)" class="big" value="Identificar por IA" style="margin-left:380px;">
		<div id="demandaRepetitivasBar" style="display:none;width:300px;border:1px solid #000000;height:30px;margin-left:415px;">
		<div id="demandaRepetitivasBarInner" style="width:1px;background-color:#f3574a;height:28px;margin-top:1px;margin-left:1px;">
		</div>
		</div>
		<div id="demandaRepetitivasDivForm" style="display:none;margin-left:290px;">
		<div class="mtable" style="margin-left:40px;">
		<div class="mtr">
			<div class="mtd"><label class="medium">C&oacute;digo da demanda</label></div>
			<div class="mtd"><input id="codigo_demanda" disabled class="medium"></div>
		</div>
		<div class="mtr">
			<div class="mtd"><label class="medium">Demanda repetitiva</label></div>
			<div class="mtd"><input id="demanda_repetitiva" disabled class="medium"></div>
		</div>
		</div>
		<input class="medium" type="submit" value="desclassificar">
		<input class="medium" type="submit" value="classificar" id="demandaRepetitivasButtonClassificar">
		</div>
		<?php
		/*$output = array();
		$command = 'C:\\Users\\usuario\\AppData\\Local\\Programs\\Python\\Python38-32\\python.exe 23-command\\IADemandasRepetitivas.py 1 1 1 1';
		
		var_dump(passthru($command));*/
		?>
	</div>
	</div>
</body>
</html>
