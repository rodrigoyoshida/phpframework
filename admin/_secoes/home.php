<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";

?>
<div id="website">

	<section id="conteudo" class="home">

		<p><a href="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/index.php?pag=home">Página inicial</a></p>
		<p><a href="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/index.php?sair">Sair</a></p>
		
	</div>

</div>

<?php

/* Rodapé do site
--------------------------------------------------------------*/
include "_modulos/rodape.php";

?>