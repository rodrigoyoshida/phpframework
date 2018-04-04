<?php

/*********************************************************************************************

CLASSE AJAX

*********************************************************************************************/

/* EXECUTA UM MÉTODO SE ELE FOI CHAMADO
*********************************************************************************************/
if (isset($_POST["func"]))
{

	// Executa o método solicitado
	$func = $_POST["func"];
	
	$ajax = new Ajax();

	$ajax->$func();

}

class Ajax{

	/* BUSCA O ENDEREÇO A PARTIR DO CEP
	*********************************************************************************************/
	function buscaEndereco(){

		$cep = $_POST['cep'];
	 
		$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
		 
		$dados['sucesso'] = (string) $reg->resultado;
		$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
		$dados['bairro']  = (string) $reg->bairro;
		$dados['cidade']  = (string) $reg->cidade;
		$dados['estado']  = (string) $reg->uf;
		 
		echo json_encode($dados);

	}

}

?>