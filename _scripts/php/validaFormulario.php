<?php

/* ----------------------------------------------------------------
 * Classe para validação de formulários
 * --------------------------------------------------------------*/


class validaFormulario {


	/* Verifica se o campo não está vazio
	--------------------------------------------------------------*/
	static function preenchido($campo) {

		// Se o campo está vazio 
		if ( $campo == "" ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}

		
	}




	/* Verifica se ao menos um dos campos está preenchido
	--------------------------------------------------------------*/
	static function umpreenchido($campos) {

		// Primeiramente define nenhum campo como preenchido
		$preenchido = 0; 

		// Passa por todos os itens do array
		foreach ($campos as $campo) {
			
			// Se o campo do loop foi preenchido
			if ( $campo != "" ) {

				// Define a variável informando que algo foi preenchido
				$preenchido = 1; 

			}

		}


		// Se nenhum campo foi preenchido
		if ( $preenchido == 0 ) {

			return true; 

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}
		
	}



	/* Verifica se um campo possui uma qtde mínima de caracteres
	--------------------------------------------------------------*/
	static function qtdeminima($campo, $qtde) {

		// Se o campo possui menos caracteres do que o necessário
		if ( strlen($campo) < $qtde ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}
		
	}



	/* Verifica se o campo é um e-mail válido
	--------------------------------------------------------------*/
	static function email($email, $obrigatorio = 1) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($email == "" AND $obrigatorio == 1) $erro = "O e-mail não foi informado"; 

		// Se o campo foi preenchido
		else if ($email != "") { 

			// Se não houver arroba nem ponto
			if (strpos($email, "@") === false OR strpos($email, ".") === false) $erro = "O e-mail informado é inválido"; 

			// Se houver algum espaço
			else if (strpos($email, " ") === true ) $erro = "O e-mail informado é inválido"; 

			// Se houver menos de 6 caracteres
			else if (strlen($email) < 6) $erro = "O e-mail informado é muito curto para ser válido"; 

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}
		
	}



	/* Verifica se uma data em formato brasileiro é válida
	--------------------------------------------------------------*/
	static function data($dat, $obrigatorio = 1) {
		

		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($dat == "" AND $obrigatorio == 1) $erro = "A data não foi informada"; 

		// Se o campo foi preenchido
		else if ($dat != "") { 

			// fatia a string $dat em pedados, usando / como referência
			$data = explode("/","$dat"); 

			//Se a dta contém o dia, mês e ano
		 	if(count($data) == 3){

		 		//Recupera a data em partes
		 		$d = $data[0];
				$m = $data[1];
				$y = $data[2];

				// Se a data não for válida
				if ( !checkdate($m,$d,$y) ) $erro = "A data informada não é válida"; 
				
				// Se o ano for em formato 2 dígitos
				else if ( $y < 1890 ) $erro = "O ano deve ser preenchido em 4 números"; 

			}else{

				$erro = true;

			}

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		} 
		
	}




	/* Verifica se o campo CEP é válido 
	--------------------------------------------------------------*/
	static function cep($cep, $obrigatorio = 1) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($cep == "" AND $obrigatorio == 1) $erro = "O CEP não foi informado"; 

		// Se o campo foi preenchido
		else if ($cep != "") { 

			// Se o CEP não tiver 8 números
			if (strlen(trataStrings::SomenteNumeros($cep)) != 8) $erro = "O CEP informado não possui 8 números"; 

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		} 
		
	}




	/* Verifica se o telefone é válido 
	--------------------------------------------------------------*/
	static function tel($tel, $obrigatorio = 0) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($tel == "" AND $obrigatorio == 1) $erro = true; 

		// Se o campo foi preenchido
		else if ($tel != "") { 

			// Se o CEP não tiver 8 números
			if (strlen(trataStrings::SomenteNumeros($tel)) < 10 OR strlen(trataStrings::SomenteNumeros($tel)) > 11) $erro = true; 

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}
		
	}




	/* Verifica se o campo é apenas numérico
	--------------------------------------------------------------*/
	static function numero($numero, $obrigatorio = 1) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($numero == "" AND $obrigatorio == 1) $erro = true; 

		// Se o campo foi preenchido
		else if ($numero != "") { 

			// Mas não é somente numérico
			if (strlen(trataStrings::SomenteNumeros($numero)) != strlen($numero)) $erro = true; 

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		} 
		
	}




	/* Verifica se o sexo é válido 
	--------------------------------------------------------------*/
	static function sexo($sexo, $obrigatorio = 1) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($sexo == "" AND $obrigatorio == 1) $erro = "O sexo não foi informado"; 

		// Se o campo foi preenchido
		else if ($sexo != "") { 

			// Mas não é válido 
			if ($sexo != "M" OR $sexo != "F") $erro = "O sexo informado é inválido"; 

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( isset($erro) ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}
		
	}




	/* Valida um CPF
	--------------------------------------------------------------*/
	static function cpf($cpf, $obrigatorio = 1) {


		/* Valida o campo
		--------------------------------------------------------------*/

		// Se o campo não foi preenchido e for obrigatório
		if ($cpf == "" AND $obrigatorio == 1) $erro = "O CPF não foi informado"; 

		// Se o campo foi preenchido
		else if ($cpf != "") { 

			//Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cpf em diferentes formatos como "000.000.000-00", "00000000000", "000 000 000 00" etc...
			$j=0;
			for($i=0; $i<(strlen($cpf)); $i++)
				{
					if(is_numeric($cpf[$i]))
						{
							$num[$j]=$cpf[$i];
							$j++;
						}
				}
			//Etapa 2: Conta os dígitos, um cpf válido possui 11 dígitos numéricos.
			if(count($num)!=11)
				{
					$isCpfValid=false;
				}
			//Etapa 3: Combinações como 00000000000 e 22222222222 embora não sejam cpfs reais resultariam em cpfs válidos após o calculo dos dígitos verificares e por isso precisam ser filtradas nesta parte.
			else
				{
					for($i=0; $i<10; $i++)
						{
							if ($num[0]==$i && $num[1]==$i && $num[2]==$i && $num[3]==$i && $num[4]==$i && $num[5]==$i && $num[6]==$i && $num[7]==$i && $num[8]==$i)
								{
									$isCpfValid=false;
									break;
								}
						}
				}
			//Etapa 4: Calcula e compara o primeiro dígito verificador.
			if(!isset($isCpfValid))
				{
					$j=10;
					for($i=0; $i<9; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[9])
						{
							$isCpfValid=false;
						}
				}
			//Etapa 5: Calcula e compara o segundo dígito verificador.
			if(!isset($isCpfValid))
				{
					$j=11;
					for($i=0; $i<10; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$resto = $soma%11;
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[10])
						{
							$isCpfValid=false;
						}
					else
						{
							$isCpfValid=true;
						}
				}
			//Trecho usado para depurar erros.
			/*
			if($isCpfValid==true)
				{
					echo "<font color=\"GREEN\">Cpf é Válido</font>";
				}
			if($isCpfValid==false)
				{
					echo "<font color=\"RED\">Cpf Inválido</font>";
				}
			*/

		}


		/* Retorna o resultado
		--------------------------------------------------------------*/

		// Se houve algum erro 
		if ( !$isCpfValid ) {

			return true;

		}

		// Caso tenha sido validado com sucesso
		else {

			return false;

		}  

	}

}


?>