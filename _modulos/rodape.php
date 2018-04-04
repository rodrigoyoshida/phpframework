		
	
	</div>

	<!-- Arquivos Javascript --> 
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/jsfuncoes.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/jquery.placeholder.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS["urlbase_atual"]; ?>_scripts/javascript/retina.js"></script>

</body>
</html>
<?php

//Recupera o cache da página (cache fixo)
$cachefile = "_cache/" . trataStrings::stringPura($_SERVER['REQUEST_URI']).".php";

//Se o cache fixo estiver ativo
if($cacheConfig["ativo"] == true and $cacheConfig["tipo"] == 1 and !file_exists($arq_cache) and !in_array($paramUrl[0],$paginasSemCache)){

	$fp = fopen($cachefile, 'w'); 

	fwrite($fp, ob_get_contents()); 

	fclose($fp); 

	ob_end_flush(); 

}

/* Se o site se conecta com um banco de dados 
--------------------------------------------------------------*/
if ( $conectaDB === true ) {
	
	// Destrói o objeto do banco de dados
	unset($dbConn); 
	
}


?>