<?php

/* ----------------------------------------------------------------
 * Classe de arquivos
 * --------------------------------------------------------------*/

class arquivos{

	public $nome;
	public $titulo;
	public $conteudo = "";
	public $erro;
	public $msg;

	function __construct($nome=null){

		//Se foi informado um arquivo
		if($nome != null){

			//Define o nome do arquivo
			$this->nome = $nome;

			//Abre o arquivo para leitura
			$arquivo = fopen("_arquivos/".$nome.".txt", "r") or die("Unable to open file!");

			//Percorre as linhas do arquivos
			while(!feof($arquivo)){

				//Recupera a linha do arquivo
				$linha = fgets($arquivo,4096);

				//Se a linha corresponde ao título
				if(strpos($linha,"<titulo>") !== false) $this->titulo = str_replace("<titulo>","",$linha);

				else $this->conteudo .= $linha;

			}

			//Fecha a leitura do arquivo
			fclose($arquivo);

		}

	}

	//Salva o conteúdo do arquivo
	function salvar($dados){

		//Abre o arquivo para leitura
		$arquivo = fopen("_arquivos/".$this->nome.".txt", "w") or die("Unable to open file!");

		//Se foi digitado um título, indica que a primeira linha é correspondente ao título
		if($dados["titulo"] != "") $dados["titulo"] = "<titulo>".$dados["titulo"]."\n";

		//Define o conteúdo do arquivo
		$conteudo = $dados["titulo"].$dados["conteudo"];

		//Salva o conteúdo no arquivo
		$retorno = fwrite($arquivo,$conteudo);

		//Finaliza a escrita do arquivo
		fclose($arquivo);

		return true;

	}

	//Reverte o conteúdo do arquivo para o estado original
	function reverter($nome){

		//Abre o arquivo de backup para leitura
		$arquivo_bkp = fopen("_arquivos/".$nome."_backup.txt", "r") or die("Unable to open file!");

		//Define a variável de conteúdo
		$conteudo = "";

		//Percorre as linhas do arquivos
		while(!feof($arquivo_bkp)){

			//Recupera a linha do arquivo
			$linha = fgets($arquivo_bkp,4096);

			//Armazena no conteúdo
			$conteudo .= $linha;

		}

		//Fecha a leitura do arquivo
		fclose($arquivo_bkp);


		//Abre o arquivo para leitura
		$arquivo = fopen("_arquivos/".$nome.".txt", "w") or die("Unable to open file!");

		//Salva o conteúdo de backup no arquivo
		$retorno = fwrite($arquivo,$conteudo);

		//Finaliza a escrita do arquivo
		fclose($arquivo);

		return true;

	}

	//Realiza o upload das imagens
	function upload_imagem($imagem,$nome){

		//Extensões válidas
		$allowed = array('png', 'jpg', 'gif','zip');
		
		//Se foi enviado um arquivo
		if(isset($imagem['upl']) && $imagem['upl']['error'] == 0){

			//Recupera a extensão do arquivo
			$extension = pathinfo($imagem['upl']['name'], PATHINFO_EXTENSION);

			//Se a extensão do arquivo é inválida
			if(!in_array(strtolower($extension), $allowed)){
				
				//Define o erro
				$this->erro = "Tipo de arquivo inválido";

			}

			//Se é um arquivo válido
			else{

				//Monta o caminho para upload da imagem
				$caminho = "../_imagens/upload";

				//Faz o upload da imagem
				if(move_uploaded_file($imagem['upl']['tmp_name'], $caminho."/".$nome.".jpg")){
					
					//Define a mensagem de sucesso
					$this->msg = "Imagem salva com sucesso";
					
					return true;

				}

				//Se não foi possível fazer o upload
				else{

					//Define o erro
					$this->erro = "Não foi possível fazer o upload da imagem, tente novamente";
					
					return false;

				}

			}

		}

		//Se nenhuma imagem foi selecionada
		else{

			//Define o erro
			$this->erro = "Nenhuma imagem foi selecionada";

			return false;
		}

	}

}	