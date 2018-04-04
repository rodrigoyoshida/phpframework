<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";

?>
<div id="website">

	<section id="conteudo" class="estilos">

		<!-- Título da página -->
		<h1>Título da página</h1>

		<!-- Botões de opções -->
		<a href="#" class="botao">opção</a>
		<a href="#" class="botao">opção</a>
		<a href="#" class="botao">opção</a>
		
		<!-- Box de opção -->
		<div class="box opcao">
			
			<form action="" method="post">

				<h2>Box de opção</h2>
				<p class="descricao">Texto descritivo do box de opção</p>

				<label for="campo1">Nome do campo:</label>
				<input type="text" name="campo_opcao1" id="campo_opcao1" class="curto" placeholder="Placeholder">

				<label for="campo2">Nome do campo:</label>
				<input type="text" name="campo_opcao2" id="campo_opcao2" class="curto" placeholder="Placeholder">

				<input type="submit" name="btn_opcao" id="btn_opcao" value="Buscar">

			</form>

		</div>

		<!-- Barra de busca -->
		<div class="box busca">

			<form action="" method="post">

				<h2>Barra de busca</h2>

				<input type="text" name="campo_busca1" id="campo_busca1" class="curto" placeholder="Placeholder">
				<input type="text" name="campo_busca2" id="campo_busca2" class="longo" placeholder="Placeholder">

				<input type="submit" name="btn_buscar" id="btn_buscar" value="Buscar">

			</form>

		</div>

		<!-- Box de informação -->
		<div class="box informacao">

			<h2>Box de informação</h2>
			<p class="descricao">Texto descritivo do box de informação</p>

			<p>Item: Valor do item</p>
			<p>Item: Valor do item</p>
			<p>Item: Valor do item</p>
			<p>Item: Valor do item</p>

		</div>

		<!-- Box de formulário -->
		<table class="linhas">

			<thead>
				<tr>
					<th colspan="2">Título do formulário</th>
				</tr>
			</thead>

			<tbody>
				<tr><th colspan="2">&nbsp;</th></tr>
				<tr>
					<th><label for="form_campo1">Nome do campo:</label></th>
					<td><input type="text" name="form_campo1" id="form_campo1" placeholder="Placeholder" class="curto"></td>
				</tr>
				<tr>
					<th><label for="form_campo2">Nome do campo:</label></th>
					<td><input type="text" name="form_campo2" id="form_campo2" placeholder="Placeholder" class="curto"></td>
				</tr>
				<tr>
					<th><label for="form_campo3">Nome do campo:</label></th>
					<td><input type="text" name="form_campo3" id="form_campo3" placeholder="Placeholder" class="longo"></td>
				</tr>
				<tr><th colspan="2">&nbsp;</th></tr>
			</tbody>

		</table>

		<!-- Tabela em colunas -->
		<table class="colunas">

			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>Cabeçalho</th>
					<th>Cabeçalho</th>
					<th>Cabeçalho</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="opcoes">
						<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir.jpg" alt="Excluir"></a>
					</td>
					<td style="width: 100px;"><a href="#">Conteúdo</a></td>
					<td style="width: 460px;">Conteúdo</td>
					<td>Conteúdo</td>
				</tr>
			</tbody>

		</table>

		<!-- Paginação -->
		<ul class="paginacao">

			<li><a href="#">1</a></li>
			<li class="atual">2</li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>

		</ul>

		<!-- Hack para neutralizar o efeito float do elemento anterior sobre os elementos seguintes -->
		<div style="clear: both;"></div>

		<dl>
			<dt>Título lista</dt>
		  	<dd>
		  		<ul class="padrao">
		  			<li>
		  				<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir_lista.jpg" alt="Excluir"></a>
		  				Item lista
		  			</li>
		  			<li>
		  				<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir_lista.jpg" alt="Excluir"></a>
		  				Item lista
		  			</li>
		  			<li>
		  				<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir_lista.jpg" alt="Excluir"></a>
		  				Item lista
		  			</li>
		  			<li>
		  				<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir_lista.jpg" alt="Excluir"></a>
		  				Item lista
		  			</li>
		  			<li>
		  				<a href="#"><img src="<?php echo $GLOBALS["urlbase_atual"]; ?>admin/_imagens/botoes/excluir_lista.jpg" alt="Excluir"></a>
		  				Item lista
		  			</li>
		  		</ul>
		  	</dd>
		</dl>

		<dl>
			<dt>Título lista</dt>
		  	<dd>
		  		<ul class="marcador">
		  			<li>Item lista</li>
		  			<li>Item lista</li>
		  			<li>Item lista</li>
		  			<li><a href="#">Item lista</a></li>
		  			<li><a href="#">Item lista</a></li>
		  		</ul>
		  	</dd>
		</dl>

	</section>

</div>

<?php

/* Rodapé do site
--------------------------------------------------------------*/
include "_modulos/rodape.php";

?>