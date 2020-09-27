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
	<link href="30-data/style.css" rel="stylesheet"></style>
	<title>Desjudica</title>
</head>
<body>
	<header>
		<div class="logo">DES<span class="logodetail">JUDICA</span></div>
		<nav>
			<?php
			//echo \Hackaton\Control\Menu::present_html();
			?>
		</nav>
	</header>
	<div class="smallboxborder">
	<div class="smallbox">
		<?php
			$menuList = \Hackaton\Control\Login::get_menu_list_by_role();
			foreach($menuList as $menu){ ?>
				<div class="spaced"><a class="big" href="<?=$menu->get_action()?>"><?=$menu->get_name()?></a></div>
			<?php } ?>
	</div>
	</div>	
</body>
</html>
