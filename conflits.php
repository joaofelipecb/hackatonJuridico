<?php
require_once(__DIR__.'/include.php');
try{
	\Hackaton\Control\Login::assert_user_is_allowed_action('conflits.php');
}
catch(\Hackaton\Except\UserForbiden $e){
	header('Location: user_forbiden.php');
}
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
		<div class="title">Conflitos</div>
		<?php
		$conflitsData = new \Hackaton\Data\Conflits();
		$conflits = $conflitsData->select();
		$options = array();
		$options['headerAlias'] = array('id'=>'ID',
										'cod_classe_processual'=>'Cod. Classe Processual',
										'cod_assunto'=>'Cod. Assunto',
										'valor'=>'Valor',
										'processo_prioritario'=>'Processo Priorit&aacute;rio',
										'status'=>'Status');
		$options['action'] = 'conflit.php?id=';
		echo \Hackaton\Control\HTMLTable::present($conflits,$options);
		?>
	</div>
	</div>
</body>
</html>
