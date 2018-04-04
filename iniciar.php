<?php

/* ----------------------------------------------------------------
** Arquivo de inicialização do sistema
** --------------------------------------------------------------*/




/* Inicia a sessão do usuário
--------------------------------------------------------------*/
session_start();




/* --------------------------------------------------------------
** EDITE O TRECHO ABAIXO PARA CONFIGURAR O FRAMEWORK
** ------------------------------------------------------------*/


// Define o nome padrão do site 
$nome_padrao = "Framework";

// Defina qual é a url padrão do site (defina sem o protocolo http nem barras)
$urlbase = 'localhost';


// Defina o caminho de subdiretórios onde está o site (se existirem)
// OBS: Defina sem a primeira, porém com a última barra, ex: "cliente/teste/site/"
// Caso não existam subdiretórios, apenas deixe vazio
$urlbase_subdir = "framework/";


// Defina o e-mail padrão do site
$email_padrao = "atendimento@localhost";

//Ativa ou desativa o prefixo "www" na url
$prefixo_www = false;

//Se o prefixo "www" está ativo e o site foi acessado sem "www"
if (substr($_SERVER['HTTP_HOST'], 0, 4) !== 'www.' and $prefixo_www == true) {
    
    //Redireciona para o site com o "www"
    //Header("HTTP/1.1 301 Moved Permanently");
    header('Location: http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 's':'').'://www.' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
}

//Se o prefixo "www" está desativado e o site foi acessado com "www"
elseif(substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.' and $prefixo_www == false){

    //Redireciona para o site sem o "www"
    //Header("HTTP/1.1 301 Moved Permanently");
    header('Location: http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 's':'').'://' . substr($_SERVER['HTTP_HOST'],4).$_SERVER['REQUEST_URI']);
    

}

/* Banco de dados 
--------------------------------------------------------------*/

// Define se o site irá se conectar com o banco de dados
// (também desliga o admin)
$conectaDB = true; 


// Define a localbase (endereço local dos arquivos)
$localbase = $_SERVER['DOCUMENT_ROOT'] . "/" . $urlbase_subdir;


/* Cache
--------------------------------------------------------------*/

//Define se o cache estará ativo
$cacheConfig["ativo"] = true;

/* Tipo do cache
 * (1) Fixo     : Carrega a página inteira em cache
 * (2) Dinâmico : Carrega o cache de partes específicas da página
 */
$cacheConfig["tipo"] = 2;

//Define as páginas que não serão salvas em cache
$paginasSemCache = array(
    //"exemplos"
);


/* --------------------------------------------------------------
** FIM DA EDIÇÃO - NÃO ALTERE ABAIXO
** ------------------------------------------------------------*/





/* Define as URLs do site
--------------------------------------------------------------*/

// Define a urlbase normal e segura
$urlbase_normal = "http://" . $urlbase . "/" . $urlbase_subdir;
$urlbase_segura = "https://" . $urlbase . "/" . $urlbase_subdir;

// Se o protocolo HTTPS foi utilizado 
if ( !empty($_SERVER['HTTPS']) ) {
	
	// Define a url padrão com HTTPS 
	$urlbase_atual = $urlbase_segura; 
	
}

// Caso o HTTPS não tenha sido utilizado
else {
	
	// Apenas define a url com protocolo normal 
	$urlbase_atual = $urlbase_normal; 
	
}





/* Inclui todos os arquivos PHP e de classes do sistema
--------------------------------------------------------------*/

// Define o caminho do diretório
$camPHP = $localbase . "_scripts/php/";

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


/* Se o site se conecta com um banco de dados 
--------------------------------------------------------------*/
if ( $conectaDB === true ) {
	
	// Instancia o objeto do banco de dados para ser utilizado por todas as páginas
	$dbConn = new mysqlConn();
	
}



?>