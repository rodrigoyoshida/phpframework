<?php

/* ----------------------------------------------------------------
 * Classe com funções para tratamento de strings
 * --------------------------------------------------------------*/


class trataStrings
{
	/* Limpa a string retirando acentos, tags , caracteres inválidos
	 * e espaços, retornando a string mais limpa possível
	--------------------------------------------------------------*/
	static function stringPura($stringsuja)
	{
		// Remove tags html
		$novastring = strip_tags($stringsuja);
	
		// Criando arrays com acentos e sem acentos
		$com_acento = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ');
		$sem_acento = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U','Y');
	
		// Removendo os acentos
		$novastring = str_replace($com_acento, $sem_acento, $novastring);
	
		// Criando array com caracteres inválidos
		$caracinv = array('!','@','#','$','%','^','&','*','(',')','+','=','{','}','[',']',';',':','"',"'",'<','>',',','.','?','˜','`','´','~');
	
		// Removendo os caracteres inválidos
		$novastring = str_replace($caracinv, "", $novastring);
	
		// Trocando os espaços por traços
		$novastring = str_replace(" ", "-", $novastring);
	
		// Trocando barras por traços
		$novastring = str_replace("/", "-", $novastring);
	
		// Trocando barras por traços
		$novastring = str_replace("\\", "-", $novastring);
	
	
		// Retornando a nova string
		return $novastring;
	}
	
	
	
	/* Limpa uma string recebida retirando itens proibidos como
	 * tags html e substituindo caracteres especiais pelos seus
	 * respectivos códigos
	--------------------------------------------------------------*/
	static function trataCampo($campo)
	{
		// Retira tags HTML e converte os caracteres especiais nos códigos html
		$novocmp = htmlspecialchars(strip_tags($campo), ENT_QUOTES);
	
		// Retorna a string tratada
		return $novocmp;
	}
	
	
	
	/* Recupera um campo tratado previamente para evitar ataques
	 * de formulários com aspas ou códigos html
	--------------------------------------------------------------*/
	static function recuperaCampo($campo)
	{
		// Retira tags HTML e converte os caracteres especiais nos códigos html
		$novocmp = html_entity_decode($campo, ENT_QUOTES);
	
		// Retorna a string tratada
		return $novocmp;
	}



	/* Recupera vários campos em array tratados previamente para 
	 * evitar ataques de formulários com aspas ou códigos html
	--------------------------------------------------------------*/
	static function recuperaCampoArray($campos) {
		
		// Se o campo é um array
		if ( is_array($campos) ) {
			
			// Passa por todos os campos encontrados
			foreach ($campos as $key => $value) {
				
				// Retira tags HTML e converte os caracteres especiais nos códigos html
				$novocmp[$key] = html_entity_decode($value, ENT_QUOTES);
				
			}
			
			// Retorna os novos campos
			return $novocmp; 
			
		}
		
		// Caso não seja
		else {
			
			// Apenas retorna falso
			return false; 
			
		}
		
	}




	/* Retorna somente números de uma string
	--------------------------------------------------------------*/
	static function SomenteNumeros($texto)
	{ return preg_replace("/[^0-9]/", "", $texto); }




	/* Retorna a hora de um timestamp
	--------------------------------------------------------------*/
	static function horaTimestamp($timestamp)
	{ return substr($timestamp, 11, 5); }
	

	
	
	/* Retorna a data de um timestamp
	--------------------------------------------------------------*/
	static function dataTimestamp($timestamp)
	{ return self::converteData(substr($timestamp, 0, 10)); }
	
	
	

	/* Converte formatos de datas
	 * 01/01/2001 para 2001-01-01 e vice versa
	--------------------------------------------------------------*/
	static function converteData($data)
	{
		// Caso a data seja no formato brasileiro (com barras) 
		if (strpos($data, "/"))
		{
			// Explode a data separando em arrays, monta e retorna a nova data
			$expdata = explode("/", $data);
			return $expdata[2] . "-" . $expdata[1] . "-" . $expdata[0];
		}
		
		// Caso a data esteja no formado do MySQL (com traços e invertido)
		elseif (strpos($data, "-"))
		{
			// Explode a data separando em arrays, monta e retorna a nova data
			$expdata = explode("-", $data);
			return $expdata[2] . "/" . $expdata[1] . "/" . $expdata[0];
		}
		
		// Caso a string fornecida não seja uma data retorna falso
		else
		{ return false; }
	}




	/* Formata números de telefone, ex: 12 39332323 PARA (12) 3933-2323
	--------------------------------------------------------------*/
	function formataTelefone($telefone) {

		// Se o telefone informado for válido
		if (strlen($telefone) > 9 AND strlen($telefone) < 12)
		{
			// Separa o DDD
			$ddd = substr($telefone, 0, 2);
			

			// Se o número tem 10 dígitos
			if ( strlen($telefone) == 10 ) {

				// Separa a parte 1 do tel
				$parte1 =  substr($telefone, 2, 4);
				
				// Separa a parte 2 do tel
				$parte2 =  substr($telefone, 6, 4);

			}

			// Se o número tem 11 dígitos
			else if ( strlen($telefone) == 11 ) {

				// Separa a parte 1 do tel
				$parte1 =  substr($telefone, 2, 5);
				
				// Separa a parte 2 do tel
				$parte2 =  substr($telefone, 7, 4);

			}
				
			
			// Retorna o telefone formatado
			return "($ddd) " . $parte1 . "-" . $parte2;
		}
		
		// Se o telefone informado for inválido retorna nulo
		else { return null; }

	}
	
	
	
	/* Converte números para formato postal
	 * 1234567 para 123-4567
	--------------------------------------------------------------*/
	static function formataCep($cep)
	{
		// Verifica se algum código postal válido foi informado
		if (strlen($cep) == 7)
		{
			// Pega a segunda parte do cep (após o traço)
			$parte2 = substr($cep, -4, 4);
			
			// Pega a primeira parte do cep (antes do traço)
			$parte1 = substr($cep, 0, strlen($cep) - 4);
			
			// Retorna o CEP formatado
			return $parte1 . "-" . $parte2;
		}
		
		// Se nenhum CEP válido foi informado retorna nulo
		else { return null; }
	}



	/* Recupera o primeiro nome de um nome completo
	--------------------------------------------------------------*/
	static function primeiroNome($nome) {
		
		// Se há espaço no nome
		if ( strpos($nome, " ") == true ) {
			
			// Explode o nome completo em arrays com cada nome e sobrenome separados
			$nomeSeparado = explode(' ', $nome);
			
			// Retorna apenas o primeiro nome
			return $nomeSeparado[0];
			
		}
		
		// Se não há espaço no nome
		else {
			
			// Apenas retorna o nome enviado 
			return $nome; 
			
		}
		
	}




	/* Inclui a máscara de CPF em um número puro 
	--------------------------------------------------------------*/
	static function formataCpf($cpf) {

		// Verifica se o cpf informado tem realmente 11 dígitos numéricos
		if (strlen($cpf) == 11 AND is_numeric($cpf))
		{
			// Monta o CPF
			$cpf = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, 9, 2);
			
			// Retorna o CPF montado
			return $cpf;
		}
		
		// Caso não seja um número válido retorna falso
		else { return false; }

	}
	

	

	/* Converte decimais para monetários (ex 1990 para 19,90)
	--------------------------------------------------------------*/
	static function ConverteDinheiro($var) {
		
		$real =substr($var,0,-2);
		$real.='.';
		$real.=substr($var,-2);
		
		return number_format($real,2,',','.');
		
	}



	/* Converte decimais para monetário float (ex 1990 para 19.90)
	--------------------------------------------------------------*/
	static function ConverteDinheiroFloat($var) {

		$real =substr($var,0,-2);
		$real.='.';
		$real.=substr($var,-2);
		
		return $real;

	}



	/* Converte monetário float para inteiro (EX 19.9 PARA 1990)
	--------------------------------------------------------------*/
	static function ConverteDinheiroInt($var) {

		// Explore o valor float em uma array dupla
		$valSeparado = explode('.', $var);
		
		// Se o valor de centavos do array não tiver nada acrescenta 2 zeros
		if (strlen($valSeparado[1]) == 0)
		{ $valSeparado[1] .= '00'; }
		
		// Se o valor de centavos do array tiver apenas um número acrescenta um zero
		elseif (strlen($valSeparado[1]) == 1)
		{ $valSeparado[1] .= '0'; }
		
		
		// Retorna o novo valor como inteiro
		return $valSeparado[0] . $valSeparado[1];

	}

}


?>