<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";

//Se foi enviado o formulário
if(count($_POST) > 0){

	//Salva o conteúdo do arquivo
	if($senhas->novasenha($_POST)){

		//Define a mensagem de sucesso
		$msg = "Senha alterada com sucesso";

	}


}

?>
<div id="website">

	<section id="conteudo" class="senhas">

		<form action="" method="post">

			<h1>Senha</h1>

			<?php

			//Se foi retornado alguma mensagem
			if(count($senhas->retorno) > 0){

				?><div class="msgerro_lista">

					<p>Não foi possível salvar os dados, verifique e corrija os erros abaixo: </p> 
					<ul><?php

					//Percorre os dados do retorno
					foreach($senhas->retorno as $retorno){

						//Exibe o retorno
						echo $retorno;

					}
					?></ul>

				</div><?php
			}

			if(isset($msg)){

				?><p class="msgok"><?php echo $msg; ?></p><?php

			}

			?>

			<label for="cmp_senhaatual">Senha atual:</label>
			<input type="password" name="senha" id="cmp_senhaatual" placeholder="Senha atual">
			
			<p>&nbsp;</p>

			<label for="cmp_senhaatual">Nova senha:</label>
			<input type="password" name="novasenha" id="cmp_novasenha" placeholder="Nova senha">
			
			<p>&nbsp;</p>

			<label for="cmp_senhaatual">Repita:</label>
			<input type="password" name="repitasenha" id="cmp_repitasenha" placeholder="Repita senha">
			
			<p>&nbsp;</p>

			<input type="submit" value="salvar">

		</form>

	</div>

</div>

<?php

/* Rodapé do site
--------------------------------------------------------------*/
include "_modulos/rodape.php";

?>