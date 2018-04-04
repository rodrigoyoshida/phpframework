<?php

/* ----------------------------------------------------------------
** Arquivo principal do site
** --------------------------------------------------------------*/




/* SEO 
--------------------------------------------------------------*/
$seo_title = "Título da página - " . $GLOBALS["nome_padrao"];
$seo_description = "Descrição da página";



/* Open Graph Tag
--------------------------------------------------------------*/
$OpenGraphTag["ativo"] = false; 
$OpenGraphTag["type"] = ""; 
$OpenGraphTag["url"] = ""; 
$OpenGraphTag["img"] = ""; 



/* Cabeçalho do site
--------------------------------------------------------------*/
include $localbase . "_modulos/cabecalho.php"; 





/* Conteúdo da página
--------------------------------------------------------------*/
?>
<section id="corpo">

		<h1>Página inicial</h1>

</section>
<?php



/* Rodapé do site
--------------------------------------------------------------*/
include $localbase . "_modulos/rodape.php"; 

?>