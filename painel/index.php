<?php


/* Arquivos de inicialização
--------------------------------------------------------------*/

// Inclui o arquivo de inicialização de todo site
include "../iniciar.php";

// Inclui o arquivo de inicialização do admin 
include "iniciar.php";



/* Verificação de acesso
--------------------------------------------------------------*/

// Instancia o objeto das senhas
$senhas = new admin_senhas(); 

// Se há um inscrito logado 
if ( $senhas->selogado() ) {

	// Se um pedido de logoff foi feito 
	if ( isset($_GET["sair"]) ) {
		
		// Faz logoff no sistema 
		$senhas->logoff(); 
		
		// Redireciona o usuário para a página inicial
		header("Location: " . $GLOBALS["urlbase_atual"] . $dirAdmin); 
		
	}
	
	// Se alguma página foi definida para exibição 
	if ( $_GET["pag"] != "" ) {
		
		// Monta o caminho da página 
		$camPagina = $localbase . $dirAdmin . "/_secoes/" . $_GET["pag"] . ".php"; 
		
		// Se a página chamada realmente existe
		if ( file_exists($camPagina) ) {
			
			// Inclui a seção chamada
			include $camPagina;
			
		}
		
		// Caso a página não exista
		else {
			
			// Redireciona o usuário para a página inicial 
			header("Location: " . $GLOBALS["urlbase_atual"] . $dirAdmin); 
			
		}
		
	}
	
	// Caso nenhuma página tenha sido chamada
	else {
		
		// Chama a página inicial
		include $localbase . $dirAdmin . "/_secoes/home.php";
		
	}
	
}

// Se nenhum usuário está logado 
else {
	
	// Se alguma página foi definida para exibição 
	if ( $_GET["pag"] != "" ) {

		// Redireciona o usuário para a página inicial 
		header("Location: " . $GLOBALS["urlbase_atual"] . $dirAdmin); 

	}

	// Caso nenhuma página tenha sido indicada
	else {

		// Chama a página de login
		include $localbase . $dirAdmin . "/_secoes/login.php";

	}
	
}



?>