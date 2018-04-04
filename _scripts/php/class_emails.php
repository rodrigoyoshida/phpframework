<?php


class emails {
	
	
	/* Envia uma determinada mensagem
	--------------------------------------------------------------*/
	static function enviarMensagem($destinatario, $replyto, $assunto, $mensagem) {
		
		// Monta o headers da mensagem
		$headers = "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=utf-8\n";
		$headers .= "From: " . $GLOBALS["nome_padrao"] . " <" . $GLOBALS["email_padrao"] . ">\n"; // remetente
		$headers .= "Reply-To: " . $replyto . "\n";
		
		// Decodifica o assunto e mensagem para caracteres normais "não html"
		$assunto = trataStrings::recuperaCampo($assunto); 
		$mensagem = trataStrings::recuperaCampo($mensagem); 
		
		//Ajusta a codificação do assunto para UTF-8
		$assunto = '=?UTF-8?B?'.base64_encode($assunto).'?=';
		
		// Envia o e-mail definido 
		mail($destinatario, $assunto, nl2br($mensagem), $headers);
		
	}
	
	
	
	/* Mensagem de contato
	--------------------------------------------------------------*/
	static function mensagemContato($mensagem) {
		
		
		/* Inicia a validação
		--------------------------------------------------------------*/
		
		// Se o nome estiver vazio
		if ( $mensagem["nome"] == "" ) $retorno["erros"] .= "<li>O campo nome deve ser informado</li>"; 
		
		// Se o e-mail estiver vazio
		if ( $mensagem["email"] == "" ) $retorno["erros"] .= "<li>O campo e-mail deve ser informado</li>"; 
		
		// Se o e-mail foi enviado
		if ( $mensagem["email"] != "" ) {
			
			// Retira o espaço do início e do fim para evitar erros
			$mensagem["email"] = trim($mensagem["email"]);
			
			// Mas é um endereço inválido
			if (strpos($mensagem["email"], "@") === false OR strpos($mensagem["email"], ".") === false OR strpos($mensagem["email"], " ") !== false) {
				$retorno["erros"] .= "<li>O e-mail informado é inválido</li>"; 
			}
			
		}
		
		// Se a mensagem estiver vazia
		if ( $mensagem["mensagem"] == "" ) $retorno["erros"] .= "<li>O campo mensagem não pode estar vazio</li>"; 
		
		
		
		/* Envia a mensagem ou retorna o erro
		--------------------------------------------------------------*/
		
		// Se nenhum erro ocorreu na validação 
		if ( !isset($retorno["erros"]) ) {
			
			// Monta a mensagem a ser enviada
			$msgMontada = "Formulário de contato \n\n";
			$msgMontada .= "Nome: " . $mensagem["nome"] . " \n";
			$msgMontada .= "E-Mail: " . $mensagem["email"] . " \n";
			$msgMontada .= "Mensagem: " . $mensagem["mensagem"] . " \n";
			
			// Envia a mensagem montada
			self::enviarMensagem($GLOBALS["email_padrao"], $mensagem["email"], "Contato pelo site", $msgMontada); 
			
			
			// Finaliza a montagem do array de retorno
			$retorno["resultado"] = true;
			
			// Retorna o array de retorno
			return $retorno; 
			
		}
		
		// Caso algum erro na validação tenha ocorrido
		else {
			
			// Finaliza a montagem do array de retorno
			$retorno["resultado"] = false;
			
			// Retorna o array de retorno
			return $retorno; 
			
		}
		
	}
	
}



?>