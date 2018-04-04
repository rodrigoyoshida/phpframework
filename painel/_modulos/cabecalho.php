<!DOCTYPE html>
<html> 


<head> 
	<title>Painel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<meta http-equiv="Cache-Control" content="no-store" />
	
	<!-- Arquivos CSS do admin --> 
	<link href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/_css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/sistema.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/_css/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/swipebox.css" rel="stylesheet" type="text/css">
	

	<!-- Arquivos Javascript -->
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/_scripts/javascript/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/_scripts/javascript/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/_scripts/javascript/jsfuncoes.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/jquery.swipebox.js"></script>

</head> 



<body>

<div id="website">
	
	<header>

		<h1><a href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/index.php?pag=home"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/layout/logo.png" alt="Painel"></a></h1>

		<nav>
			<ul>
				<li>
					<a href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/index.php?pag=home">Conteúdo</a>				
				</li>
				<li>
					<a href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/index.php?pag=senhas">Senhas</a>				
				</li>
			</ul>

			<a href="<?php echo $GLOBALS["urlbase_atual"].$dirAdmin; ?>/index.php?sair" class="sair"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/layout/btn_sair.png" alt="Sair"></a>

		</nav>

	</header>
