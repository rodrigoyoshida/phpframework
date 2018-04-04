<?php


/* Cabeçalho HTTP 
--------------------------------------------------------------*/
header('HTTP/1.0 404 Not Found');



/* SEO 
--------------------------------------------------------------*/
$seo_title = "Erro 404, página não encontrada";
$seo_description = "A página que você está tentando acessar não
foi encontrada, provavelmente ela não existe mais ou o endereço
está incorreto";



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
?><p class="msgerro">Erro 404 - Página não encontrada</p><?php 





/* Rodapé do site
--------------------------------------------------------------*/
include $localbase . "_modulos/rodape.php"; 

?>