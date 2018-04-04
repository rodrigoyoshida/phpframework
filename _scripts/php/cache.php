<?php

/*********************************************************************************************

CLASSE DE CACHE

*********************************************************************************************/
class Cache{
	
	private $ativo = false;	
	private $tipo = 2;
	private $nome;
	private $dir;

	function __construct($config){

		//Define se o cache está ativo ou não
		$this->ativo 	= $config["ativo"];

		//Define o tipo de cache
		$this->tipo 	= $config["tipo"];

		//Define o diretório de cache
		$this->dir 		= $GLOBALS["localbase"] . "_cache/";

	}

	//Verifica se existe um bloco de código em cache e carrega o mesmo, caso contrário inicia a captura do conteúdo
	function cacheInicio($nome){

		//Define o nome do cache atual
		$this->nome = $nome;

		//Se o cache fixo estiver ativo
		if($this->ativo == true and $this->tipo == 2){

			//Monta o caminho do arquivo de cache
			$arq_cache =  $this->dir . $this->nome . ".php";

			//Se existir o cache
			if (file_exists($arq_cache)) {

				//Inclui o mesmo
				include $arq_cache;

				//Retorna false indicando que o conteúdo seguinte será carregado em cache
				return false;

			}else{

				//Inicia a captura do conteúdo
				ob_start();

				//Retorna true indicando que o conteúdo seguinte pode ser carregado pois não há cache do mesmo
				return true;

			}

		}else{
			
			//Retorna true indicando que o conteúdo seguinte pode ser carregado e o cache está desabilitado
			return true;

		}

	}

	//Finaliza a captura do conteúdo e o salva em cache
	function cacheFim(){

		//Define o caminho do arquivo de cache
		$cachefile = $this->dir . $this->nome .".php";

		//Se o cache fixo estiver ativo
		if($this->ativo == true and $this->tipo == 2 and !file_exists($cachefile)){

			//Cria o arquivo de cache
			$fp = fopen($cachefile, 'w'); 

			//Inclui o conteúdo a ser salvo
			fwrite($fp, ob_get_contents()); 

			//Salva o arquivo de cache
			fclose($fp); 

			//Finaliza a captura do conteúdo
			ob_end_flush(); 

		}

	}

	//Lista os caches ativos
	function listaCache(){

		// Se houverem arquivos de cache
		if ($listaCache = opendir($this->dir)) {

			//Define a variável para armazenar os caches ativos
			$caches_ativos = array();

		    // Passa por todos os arquivos encontrados 
		    while (false !== ($arq = readdir($listaCache))) {
		        	
	        	// Recupera os 4 últimos caracteres do nome do arquivo
		        $ultCar = substr($arq, -4); 
		        
		        // Se o arquivo a ser incluído for do tipo PHP
		        if ( $ultCar == ".php" ) {

		        	//Define os dados de retorno
		        	$retorno["nome"] = $arq;

		        	//Armazena os dados de retorno
		        	array_push($caches_ativos,$retorno);
	     		
	     		}

		    }
		    
		    // Fecha a listagem do diretório 
		    closedir($listaCache);

		    return $caches_ativos;
		
		}else{

			return false;

		}

	}

	//Deleta um arquivo de cache
	function excluirCache($arq){

		$caminho = $this->dir.$arq;

		//Verifica se o arquivo existe
		if(file_exists($caminho)){
			
			//Deleta o arquivo
			if(unlink($caminho)){

				return true;

			}else{

				return false;

			}
		}

		//Se o arquivo não existe
		else{

			return false;

		}

	}

	//Limpa todo cache ativo
	function limparCache(){

		// Se houverem arquivos de cache
		if ($listaCache = opendir($this->dir)) {

			//Define a variável de erro
			$erro = false;

		    // Passa por todos os arquivos encontrados 
		    while (false !== ($arq = readdir($listaCache))) {
		        	
	        	// Recupera os 4 últimos caracteres do nome do arquivo
		        $ultCar = substr($arq, -4); 
		        
		        // Se o arquivo a ser deletado for do tipo PHP
		        if ( $ultCar == ".php" ) {

		        	//Deleta o arquivo
		        	if(!unlink($this->dir.$arq)){

		        		//Caso ocorra um erro, define o mesmo
		        		$erro = true;

		        	}

		        }

		    }

		    //Caso tenha ocorrido um erro
		    if($erro) return false;

		    //Se não ocorreu nenhum erro
		    else return true;

		}

	}

}

?>