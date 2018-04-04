<?php

/* ----------------------------------------------------------------
** Arquivo principal do site
** --------------------------------------------------------------*/




/* Inclui o arquivo de inicialização do site
--------------------------------------------------------------*/
include "iniciar.php";





/* Força um tipo de domínio por padrão
--------------------------------------------------------------

// Recupera a URL informada 
$urlInformada = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Caso a URL informada esteja fora do padrão 
if ( strpos($urlInformada, ".org") !== false ) {
	
	// Altera a URL informada para o domínio correto 
	$urlInformada = str_replace(".org", ".com", $urlInformada); 
	
	// Envia o cabeçalho e redireciona o usuário para a URL correta 
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $urlInformada");
	
}*/





/* Trata e transforma em array a url amigável
--------------------------------------------------------------*/

// Separa em arrays a string crua
$paramUrl = explode('/', $_GET["urlamigavel"]);

// Limpa as arrays vazias
$paramUrl = array_filter($paramUrl);

// Passa tratando os valores das arrays
foreach($paramUrl as $numero => $valor) { 

	$paramUrl[$numero] = trataStrings::trataCampo($valor); 

} 



/* Valida e insere a seção na página
--------------------------------------------------------------*/

// Se alguma seção foi indicada para ser incluída
if ( $paramUrl[0] != "" ) {
	
	//Se o cache fixo estiver ativo
	if($cacheConfig["ativo"] == true and $cacheConfig["tipo"] == 1 and !in_array($paramUrl[0],$paginasSemCache)){

		//Monta o caminho da seção em cache
		$arq_cache = $localbase . "_cache/" . trataStrings::stringPura($_SERVER['REQUEST_URI']) . ".php";

		ob_start();

		//Se existir a seção em cache
		if (file_exists($arq_cache)) {

			//Inclui a seção definida em cache
			include($arq_cache); 

			//Para a execução do script
			exit;

		}

	}

	// Monta o caminho da seção a ser inserida
	$arq_secao = $localbase . "_secoes/" . $paramUrl[0] . ".php";
	
	// Se o arquivo não existe 
	if (!file_exists($arq_secao)) { 
		
		// Seta a home para ser exibida 
		$arq_secao = $localbase . "_secoes/home.php"; 
		
	}
	
}

// Caso nenhuma seção tenha sido definida
else {
	
	//Se o cache fixo estiver ativo
	if($cacheConfig["ativo"] == true and $cacheConfig["tipo"] == 1){

		//Monta o caminho da seção em cache
		$arq_cache = $localbase . "_cache/home.php";

		//Se existir a seção em cache
		if (file_exists($arq_cache)) {

			//Inclui a seção definida em cache
			include($arq_cache); 

			//Para a execução do script
			exit;

		}

	}

	// Seta a home para ser exibida
	$arq_secao = $localbase . "_secoes/home.php"; 
	
}



// Inclui a seção definida
include $arq_secao;



?>