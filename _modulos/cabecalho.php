<!DOCTYPE html>
<html> 


<head> 
	<!-- Charset utf8 -->
	<meta charset="UTF-8">

	<!-- Título e meta description --> 
	<title><?php echo $seo_title; ?></title>
	<meta name="description" content="<?php echo $seo_description; ?>"> 
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1" />
	<meta name="format-detection" content="telephone=no">
	
	<?php
	
	// Se as Open Graph Tag foram autorizadas
	if ( $OpenGraphTag["ativo"] == true ) {
		
		?>
		<!-- Open Graph tag -->
		<meta property="og:type" content="<?php echo $OpenGraphTag["type"]; ?>">
		<meta property="og:site_name" content="<?php echo $GLOBALS["nome_padrao"]; ?>">
		<meta property="og:title" content="<?php echo $seo_title; ?>">
		<meta property="og:description" content="<?php echo $seo_description; ?>">
		<meta property="og:url" content="<?php echo $OpenGraphTag["url"]; ?>">
		<meta property="og:image" content="<?php echo $OpenGraphTag["img"]; ?>">
		<?php
		
	}
	
	?>
	
	
	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo $GLOBALS["urlbase_atual"]; ?>_imagens/layout/favicon.gif"> -->
	

	<!-- Arquivos CSS --> 
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 980px)">
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 979px)">
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/sistema.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/jquery-ui.css" rel="stylesheet" type="text/css">
	
	<!-- Script para funcionamento do HTML 5 em navegadores anteriores ao IE8 --> 
	<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/html5shiv.js"></script> 
	<![endif]-->
	
	<!--[if lte IE 9]>
	    <link href="<?php echo $GLOBALS["urlbase_atual"]; ?>_css/ie.css" rel="stylesheet" type="text/css">
	<![endif]-->

</head> 



<body>

	<div id="website">
