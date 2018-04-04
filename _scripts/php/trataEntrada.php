<?php

/* ----------------------------------------------------------------
** Trata todas as entradas de dados 
** --------------------------------------------------------------*/



// Se alguma informação via POST foi postada 
if ( count($_POST) > 0 ) {
	
	// Passa por todos os campos enviados 
	foreach ( $_POST as $chave => $valor ) {
		
		// Se o valor recebido é um array 
		if ( is_array($valor) ) {
			
			// Passa por todos os campos enviados 
			foreach ( $valor as $chave2 => $valor2 ) {
				
				// Trata o array original e cria dois novos arrays, um com o campo tratado
				// permitindo HTML e outro com o campo puro enviado caso seja necessário
				$_POST[$chave][$chave2] = htmlspecialchars(strip_tags($valor2), ENT_QUOTES);
				$_POST_HTML[$chave][$chave2] = htmlspecialchars($valor2, ENT_QUOTES);
				$_POST_PURO[$chave][$chave2] = $valor2;
				
			}
			
		}
		
		// Se o valor recebido não é um array
		else {
			
			// Trata o array original e cria dois novos arrays, um com o campo tratado
			// permitindo HTML e outro com o campo puro enviado caso seja necessário
			$_POST[$chave] = htmlspecialchars(strip_tags($valor), ENT_QUOTES);
			$_POST_HTML[$chave] = htmlspecialchars($valor, ENT_QUOTES);
			$_POST_PURO[$chave] = $valor;
			
		}
		
		
	}
	
}


// Se alguma informação via GET foi postada 
if ( count($_GET) > 0 ) {
	
	// Passa por todos os campos enviados 
	foreach ( $_GET as $chave => $valor ) {
		
		// Trata o array original e cria dois novos arrays, um com o campo tratado
		// permitindo HTML e outro com o campo puro enviado caso seja necessário
		$_GET[$chave] = htmlspecialchars(strip_tags($valor), ENT_QUOTES);
		$_GET_HTML[$chave] = htmlspecialchars($valor, ENT_QUOTES);
		$_GET_PURO[$chave] = $valor;
		
	}
	
}



?>