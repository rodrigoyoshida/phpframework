<?php

/* Cabeçalho do site
--------------------------------------------------------------*/
include "_modulos/cabecalho.php";

// Instancia o objeto de senhas
$senhas = new admin_senhas(); 

//Define o diretório de cache
$caminho = $GLOBALS['urlbase_atual']."_cache";

//Instancia o objeto de cache
$cache = new Cache($cacheConfig);

/* Se algum formulário foi enviado
--------------------------------------------------------------*/
if ( count($_POST) > 0 ) {

	//Se a exclusão de um cache foi solicitado
	if($_POST["acao"] == "excluir"){

		//Deleta o cache informado
		if(!$cache->excluirCache($_POST["cmp_nome"])){

			//Caso ocorra um erro, define o mesmo
			$erro = "Não foi possível deletar este cache";

		}else{

			$msg = "Cache deletado com sucesso";

		}

	}

	//Se a limpeza de cache foi solicitada
	elseif($_POST["acao"] == "limpar"){

		//Limpa todo o cache ativo
		if(!$cache->limparCache()){

			//Caso ocorra um erro define o mesmo
			$erro = "Ocorreu um erro durante a limpeza do cache";

		}else{

			$msg = "Os arquivos de cache foram excluídos com sucesso";

		}

	}

	//Se a tentativa de login foi solicitada
	else{

		// Recupera os valores enviados jogando para a variável correta
		$login = $_POST;

		// Efetua uma tentativa de login do painel de configurações
		$ttlogin = $senhas->loginConfig($login["cmp_senha"]); 

		//Se não foi possivel efetuar o login
		if(!$ttlogin){

			//Define o erro
			$erro = "Senha inválida";

		}

	}

}

?>
<div id="website">

	<section id="conteudo" class="config">

		<?php

		//Se o erro estiver setado
		if(isset($erro)){

			//Exibe o erro
			?><p class="msgerro"><?php echo $erro; ?></p><?php

		}

		//Se uma mensagem estiver setada
		if(isset($msg)){

			//Exibe o erro
			?><p class="msgok"><?php echo $msg; ?></p><?php

		}

		if(!$ttlogin and !$senhas->selogado_mestre()){

			?><!-- Box de login para acesso as configurações -->
			<div class="box">
				
				<form action="" method="post">

					<h2>Painel de configurações</h2>
					<p>Acesso às configurações do site</p>

					<label for="campo2">Senha:</label>
					<input type="password" name="cmp_senha" id="cmp_senha" class="curto" placeholder="Placeholder">

					<input type="submit" name="btn_entrar" id="btn_entrar" value="Buscar">

				</form>

			</div><?php

		}else{

			?><dl>
				<dt>Caches ativos</dt>
			  	<dd>
			  		<ul class="padrao">

			  			<?php

			  			//Recupera os arquivos de cache
			  			$caches_ativos = $cache->listaCache();

			  			if($caches_ativos){

				  			//Percorre todos os arquivos de cache encontrados
							foreach($caches_ativos as $dadosCache){

				  			?><li>
				  				
				  				<form action="" method="post" class="frmexcluir" onsubmit="return confirm('Tem certeza que deseja excluir este cache?');">
									<input type="hidden" name="acao" value="excluir">
									<input type="hidden" name="cmp_nome" value="<?php echo $dadosCache['nome']; ?>">
									<input type="image" src="<?php echo $GLOBALS['urlbase_atual']; ?>admin/_imagens/botoes/excluir_lista.jpg">

									<?php echo $dadosCache["nome"]; ?>

								</form>
				  				
				  			</li><?php

				  			}

				  		}else{

				  			?><li>Não há arquivos de cache ativo</li><?php

				  		}
			  			?>
			  			
			  		</ul>
			  	</dd>

			  	<p>&nbsp;</p>
			  	<p>&nbsp;</p>

			  	<form action="" method="post" class="frmexcluir" onsubmit="return confirm('Tem certeza que deseja limpar o cache?');">

					<input type="hidden" name="acao" value="limpar">
					<input type="submit" name="btnlimpar" id="limpar" value="Limpar cache">

				</form>

			</dl><?php

		}
		?>

	</section>

</div>

<?php

/* Rodapé do site
--------------------------------------------------------------*/
include "_modulos/rodape.php";

?>