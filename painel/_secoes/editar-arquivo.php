<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";

//Se nenhum arquivo foi definido
if(!isset($_GET["nome"])){

	//Redireciona para a home
	header("Location: ".$GLOBALS["urlbase_atual"].$dirAdmin."/index.php?pag=home");

}

//Recupera o conteúdo do arquivo editável
$arquivo = new arquivos($_GET["nome"]);

//Se foi enviado o formulário
if(count($_POST) > 0){

	//Salva o conteúdo do arquivo
	$arquivo->salvar($_POST);

	//Redireciona para a home
	header("Location: ".$GLOBALS["urlbase_atual"].$dirAdmin."/index.php?pag=home");

}

?>
<div id="website">

	<section id="conteudo" class="editar-arquivo">

		<form action="" method="post" enctype="multipart/form-data">

			<h1>Edição do conteúdo</h1>

			<input type="text" name="titulo" id="cmp_titulo" placeholder="Título" value="<?php echo $arquivo->titulo; ?>">
			<textarea name="conteudo" id="cmp_conteudo" placeholder="Conteúdo"><?php echo $arquivo->conteudo; ?></textarea>

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