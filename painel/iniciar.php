<?php


/* Define algumas diretrizes do admin
--------------------------------------------------------------*/

// Diretório do admin à partir do site (sem barras)
$dirAdmin = "painel"; 



/* Inclui todos os arquivos PHP e de classes do admin
--------------------------------------------------------------*/

// Define o caminho do diretório
$camPHP = $localbase . "painel/_scripts/php/";

// Inclui o módulo do captcha
include $camPHP . "captcha/simple-php-captcha.php"; 

// Se houverem arquivos no diretório de classes
if ($listaPHP = opendir($camPHP)) {

    // Passa por todos os arquivos encontrados 
    while (false !== ($arqPHP = readdir($listaPHP))) {
        
        // Recupera os 4 últimos caracteres do nome do arquivo
        $ultCar = substr($arqPHP, -4); 
        
        // Se o arquivo a ser incluído for do tipo PHP
        if ( $ultCar == ".php" ) {
        	
        	// Inclui a classe do loop atual
        	include $camPHP . $arqPHP; 
        	
        }
        
    }
    
    // Fecha a listagem do diretório 
    closedir($listaPHP);
}

?>