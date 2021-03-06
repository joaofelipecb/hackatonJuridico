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
	<script>
var timer_barra;
var barra_progresso;
var barra_progresso_ac;
function animar_barra(){
	var demandaRepetitivasBar = document.getElementById('demandaRepetitivasBar');
	var demandaRepetitivasBarInner = document.getElementById('demandaRepetitivasBarInner');
	var demandaRepetitivasDivForm = document.getElementById('demandaRepetitivasDivForm');
	var jurimetriaForm = document.getElementById('jurimetriaForm');
	demandaRepetitivasBarInner.style.width = barra_progresso+'px';
	if(barra_progresso_ac>0.3)
		barra_progresso_ac-=0.042;
	barra_progresso+=barra_progresso_ac;
	if(barra_progresso>=298){
		clearInterval(timer_barra);
		demandaRepetitivasBar.style.display = 'none';
		if(demandaRepetitivasDivForm !== null)
			demandaRepetitivasDivForm.style.display = 'block';
		if(jurimetriaForm !== null)
			jurimetriaForm.style.display = 'table';
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
	var descricao_demanda = document.getElementById('descricao_demanda');
	var demandaRepetitivasButtonClassificar = document.getElementById('demandaRepetitivasButtonClassificar');
	codigo_demanda.value = parts[0].trim();
	descricao_demanda.value = parts[2].trim();
	if(parts[1].trim()=='True'){
		demanda_repetitiva.value = 'sim';
		demandaRepetitivasButtonClassificar.style.display = 'inline-block';
	}
	else{
		demanda_repetitiva.value = 'não';
		demandaRepetitivasButtonClassificar.style.display = 'none';
	}
}
function jurimetria_callback(data){
	var parts = data.split('\n');
	var jurimetriaImprocedente = document.getElementById('jurimetriaImprocedente');
	var jurimetriaParcial = document.getElementById('jurimetriaParcial');
	var jurimetriaProcedente = document.getElementById('jurimetriaProcedente');
	var jurimetriaDraw = document.getElementById('jurimetriaDraw');
	jurimetriaImprocedente.innerHTML = (parseFloat(parts[0].trim())*100)+'%';
	jurimetriaParcial.innerHTML = (parseFloat(parts[1].trim())*100)+'%';
	jurimetriaProcedente.innerHTML = (parseFloat(parts[2].trim())*100)+'%';
	jurimetriaDraw.value = parts[0].trim()+';'+parts[1].trim()+';'+parts[2].trim();
}
	</script>
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
		$subject = \Hackaton\Data\Subjects::get_by_id($conflit->get_cod_assunto());
		$processClass = \Hackaton\Data\ProcessClasses::get_by_id($conflit->get_cod_classe_processual());
		?>
		<div class="margin">
		<span class="big"><b>ID:</b> <?=$conflit->get_id()?></span><br />
		<span class="big"><b>Cod. Classe Processual:</b> <?=$conflit->get_cod_classe_processual()?> - <?=$processClass->get_name()?></span><br />
		<span class="big"><b>Cod. Assunto:</b> <?=$conflit->get_cod_assunto()?> - <?=$subject->get_name()?></span><br />
		<span class="big"><b>Valor:</b> <?=$conflit->get_valor()?></span><br />
		<span class="big"><b>Processo Priorit&aacute;rio:</b> <?=$conflit->get_processo_prioritario()?></span><br />
		<span class="big"><b>Status:</b> <?=$conflit->get_status()?></span><br />
		</div>
		<br/>
		<div class="title">Etapa 1 - Identifica&ccedil;&atilde;o da Demanda Repetitiva</div>
<?php if($conflit->get_status() == 'cadastrado'){ ?>

		<input id="demandaRepetitivasAIButton" type="button" onclick="demanda_repetitiva_start();ajaxCall('23-command/IADemandasRepetitivas.php?id=<?=$conflit->get_id()?>',demanda_repetitiva_callback)" class="big" value="Identificar por IA" style="margin-left:380px;">
		<div id="demandaRepetitivasBar" style="display:none;width:300px;border:1px solid #000000;height:30px;margin-left:415px;">
		<div id="demandaRepetitivasBarInner" style="width:1px;background-color:#f3574a;height:28px;margin-top:1px;margin-left:1px;">
		</div>
		</div>
		<div id="demandaRepetitivasDivForm" style="display:none;margin-left:290px;">
		<form action="conflitClassify.php" method="post">
		<input name='conflit_id' type="hidden" value="<?=$conflit->get_id()?>">
		<div class="mtable" style="margin-left:40px;">
		<div class="mtr">
			<div class="mtd"><label class="medium">C&oacute;digo da demanda</label></div>
			<div class="mtd"><input name='demand_id' id="codigo_demanda" readonly class="medium"></div>
		</div>
		<div class="mtr">
			<div class="mtd"><label class="medium">Descri&ccedil;&atilde;o da demanda</label></div>
			<div class="mtd"><input id="descricao_demanda" readonly class="medium"></div>
		</div>
		<div class="mtr">
			<div class="mtd"><label class="medium">Demanda repetitiva</label></div>
			<div class="mtd"><input name='demand_repeatable' id="demanda_repetitiva" readonly class="medium"></div>
		</div>
		</div>
		<input class="medium" type="submit" name='unclassify' value="desclassificar">
		<input class="medium" type="submit" name='classify' value="classificar" id="demandaRepetitivasButtonClassificar">
		</form>
		</div>
		<?php
}
else if($conflit->get_status() == 'classificado'){
		$demand = \Hackaton\Data\Demands::get_by_id($conflit->get_demand_id()); ?>
		<div class="margin">
			<span class="medium"><b>C&oacute;digo da Demanda:</b> <?= $demand->get_id() ?> </span><br/>
			<span class="medium"><b>Descri&ccedil;&atilde;o da Demanda:</b> <?= $demand->get_name() ?> </span><br/>
			<span class="medium"><b>Demanda Repetitiva:</b> sim </span><br/>
		</div>
		<br/>
		<div class="title">Etapa 2 - Jurimetria da Demanda Repetitiva para o Caso</div>
		<input id="demandaRepetitivasAIButton" type="button" onclick="demanda_repetitiva_start();ajaxCall('23-command/IAJurimetria.php?id=<?=$conflit->get_id()?>',jurimetria_callback)" class="big" value="Identificar por IA" style="margin-left:380px;">
		<div id="demandaRepetitivasBar" style="display:none;width:300px;border:1px solid #000000;height:30px;margin-left:415px;">
		<div id="demandaRepetitivasBarInner" style="width:1px;background-color:#f3574a;height:28px;margin-top:1px;margin-left:1px;">
		</div>
		</div>
		<div id="jurimetriaForm" style="display:none;width:100%;">
		<form action="conflitDraw.php" method="post">
		<input name='conflit_id' type="hidden" value="<?=$conflit->get_id()?>">
		<input type="hidden" id="jurimetriaDraw" name="draw">
		<table>
			<tr>
				<th>Senten&ccedil;a</th>
				<th>Probabilidade</th>
			</tr>
			<tr>
				<td>Improcedente</td>
				<td id="jurimetriaImprocedente">0%</td>
			</tr>
			<tr>
				<td>Parcial</td>
				<td id="jurimetriaParcial">0%</td>
			</tr>
			<tr>
				<td>Procedente</td>
				<td id="jurimetriaProcedente">0%</td>
			</tr>
		</table>
		<input class="medium" type="submit" value="sortear" style="margin-left:415px;">
		</form>
		</div>
<?php }
else if($conflit->get_status() == 'sorteado'){
	$demand = \Hackaton\Data\Demands::get_by_id($conflit->get_demand_id());	?>
		<div class="margin">
			<span class="medium"><b>C&oacute;digo da Demanda:</b> <?= $demand->get_id() ?> </span><br/>
			<span class="medium"><b>Descri&ccedil;&atilde;o da Demanda:</b> <?= $demand->get_name() ?> </span><br/>
			<span class="medium"><b>Demanda Repetitiva:</b> sim </span><br/>
		</div>
		<br/>
		<div class="title">Etapa 2 - Jurimetria da Demanda Repetitiva para o Caso</div>
		<div class="margin">
			<span class="medium"><b>Sorteio:</b> <?= $conflit->get_draw() ?> </span><br/>
		</div>
		<br/>
		<div class="title">Etapa 3 - Discurso Juridico Robotizado</div>
		<?php
		$bots = \Hackaton\Data\Bots::select()->get_list();
		$results = array(array(),array(),array());
		foreach($bots as $bot){
			$code = $bot->get_code();
			ob_start();
			eval($code);
			$result = intVal(ob_get_contents());
			ob_end_clean();
			$results[$result][] = $bot->get_name();
		}
		?>
		<table>
			<tr>
				<th>Senten&ccedil;a</th>
				<th>Probabilidade</th>
			</tr>
			<tr>
				<td><?=($conflit->get_draw()=='improcedente'?'Improcedente':'')?></td>
				<td id="jurimetriaImprocedente"><?=join(', ',$results[0])?></td>
			</tr>
			<tr>
				<td><?=($conflit->get_draw()=='parcial'?'Parcial':'')?></td>
				<td id="jurimetriaParcial"><?=join(', ',$results[1])?></td>
			</tr>
			<tr>
				<td><?=($conflit->get_draw()=='procedente'?'Procedente':'')?></td>
				<td id="jurimetriaProcedente"><?=join(', ',$results[2])?></td>
			</tr>
		</table>
		<div class="margin">
		<p>
		<?php
		if(($conflit->get_draw()=='improcedente'
		&& count($results[0])==0)
		|| ($conflit->get_draw()=='parcial'
		&& count($results[1])==0)
		|| ($conflit->get_draw()=='procedente'
		&& count($results[2])==0)){
			echo 'O discurso robotizado n&atilde;o encontrou um justificativa razo&aacute;te para o resultado da Intelig&ecirc;ncia Artificial. Isso pode indiciar um vi&eacute;s nos dados que treinaram a intelig&ecirc;ncia e portanto o caso n&atilde;o poder&aacute; ser desjudicializado nessa ferramenta.';
		}
		?>
		</p>
		</div>
<?php } ?>
		</div>
	</div>
</body>
</html>
