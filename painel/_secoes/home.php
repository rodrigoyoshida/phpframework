<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";


//Se foi solicitada a reversão de algum arquivo
if(count($_POST) > 0){

	//Instancia a classe de arquivos
	$arquivo = new arquivos();

	//Reverte o conteúdo do arquivo selecionado
	if($arquivo->reverter($_POST["arquivo"])){

		//Define a mensagem de sucesso
		$msg = "Conteúdo revertido com sucesso";

	}

}

//Recupera o conteúdo do arquivo editável
$arquivo = new arquivos("exemplo");

?>
<div id="website">

	<section id="conteudo" class="home">

		<h1>Conteúdo do site</h1>

		<?php

		//Se existir uma mensagem definida
		if(isset($msg)){

			?><p class="msgok"><?php echo $msg; ?></p><?php

		}
		?>

		<table class="colunas">
			<thead>
				<tr>
					<th>Nome</th>
					<th class="reverter">&nbsp;</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><a href="<?php echo $GLOBALS['urlbase_atual'].$dirAdmin; ?>/index.php?pag=editar-arquivo&nome=exemplo"><?php echo $arquivo->titulo; ?></a></td>
					<td>
						<form action="" method="post" onsubmit="if(confirm('Tem certeza que deseja reverter este conteúdo?') == false) return false;">
							<input type="hidden" name="arquivo" value="exemplo">
							<input type="submit" value="reverter">
						</form>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>

</div>

<?php

/* Rodapé do site
--------------------------------------------------------------*/
include "_modulos/rodape.php";

?>