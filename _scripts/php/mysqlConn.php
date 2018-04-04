<?php

/* ----------------------------------------------------------------
 * Conecta ao banco de dados
 * --------------------------------------------------------------*/

class mysqlConn
{

	private $conn;
	public $mysql_host = 'localhost';
	public $mysql_user = 'root';
	public $mysql_passwd = '';
	public $mysql_dbname = 'framework';

	// Conecta ao banco de dados assim que a classe for instanciada
	function __construct()
	{
		// Declara as variáveis globais necessárias para que a classe funcione
		//global $mysql_host, $mysql_user, $mysql_passwd, $mysql_dbname;

		// Conecta ao banco de dados
		$this->conn = new mysqli($this->mysql_host, $this->mysql_user, $this->mysql_passwd, $this->mysql_dbname);

		// Verifica a conexão
		if($this->conn->connect_error) {
			trigger_error("Erro ao selecionar o banco de dados: " . $conn->connect_error, E_USER_ERROR);
		}

		// Configura o banco de dados para receber dados em utf8
		$this->conn->query("SET NAMES 'utf8'");

	}
	
	
	// Executa uma pesquisa e retorna o resultado em forma de array
	function pesquisaDB($query)
	{
		// Executa a pesquisa enviada
		$queryResult = $this->conn->query($query);
		
		// Caso a query tenha sido executada com sucesso retorna o resultado da query
		if ($queryResult) { return $queryResult; }
		
		// Caso algum problema ocorreu com a query, retorna o erro (falso)
		else { return false; }
	}
	
	
	// Executa uma pesquisa e retorna o primeiro valor do campo pesquisado
	function pesquisaCampoDB($campo, $tabela, $campoCond, $valorCond)
	{
		// Executa a pesquisa requisitada
		$queryResult = $this->conn->query("SELECT $campo FROM $tabela WHERE $campoCond = '$valorCond'");
		
		// Caso algum resultado tenha sido encontrado
		if ($queryResult->num_rows > 0)
		{

			//Recupera a linha com os dados pesquisados
			$resultado = $queryResult->fetch_assoc;

			// Retorna o primeiro valor do campo pesquisado
			return $resultado[$campo];

		}
		
		// Caso algum problema ocorreu com a query, retorna o erro (falso)
		else { return false; }
	}
	
	
	// Retorna o último ID inserido no banco de dados
	function ultimoID() { return $this->conn->insert_id; }
	
	
	// Desconecta do banco se a classe for destruída 
	function __destruct()
	{
		// Desconecta do banco 
		$this->conn->close; 
	}
}


?>