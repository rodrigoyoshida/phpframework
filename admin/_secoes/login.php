<?php
/* ----------------------------------------------------------------
** Página de contato
** --------------------------------------------------------------*/




/* Se algum formulário foi enviado
--------------------------------------------------------------*/
if ( count($_POST) > 0 ) {

	// Recupera os valores enviados jogando para a variável correta
	$login = $_POST;

	// Instancia o objeto de senhas
	$senhas = new admin_senhas(); 

	// Efetua uma tentativa de login
	$ttlogin = $senhas->login($login["senha"], $login["captcha"]); 

	// Se tudo ocorreu perfeitamente 
	if ( $ttlogin ) {

		// Redireciona o usuário novamente para a página inicial
		header("Location: " . $GLOBALS["urlbase_atual"] . "admin"); 

	}

}



?>
<!DOCTYPE html>
<html> 
<head>
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<!-- Estilos CSS -->
	<style type="text/css">
	
	/* v1.0 | 20080212 */

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, font, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
		font-size: 100%;
		vertical-align: baseline;
		background: transparent;
		font-weight: normal;
	}
	input, select {
		margin: 0px;
	}
	body {
		line-height: 1;
	}
	ol, ul {
		list-style: none;
	}
	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}

	/* remember to define focus styles! */
	:focus {
		outline: 0;
	}

	/* remember to highlight inserts somehow! */
	ins {
		text-decoration: none;
	}
	del {
		text-decoration: line-through;
	}

	/* tables still need 'cellspacing="0"' in the markup */
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	
	body 
	{
		font-family: Lucida Sans MS, Lucida Sans, Lucida Sans Unicode, Arial, Verdana;
		font-size: 12px;
		margin: 0px;
		padding: 0px;
		
		background: url(_imagens/layout/login_background.jpg) no-repeat top center fixed; 
		
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	
	div.boxbg
	{
		width: 280px;
		height: 390px; 
		background-color: #000;
		color: #478b9e;
		opacity: 0.7;
    	filter: alpha(opacity=70);
	}
	
	div.box, 
	div.boxbg
	{
		position: absolute;
		margin: 90px 85% 0px 15%; 
	}
	
	div.box h1
	{
		font-size: 18px;
		color: #a5a5a5;
		text-align: center;
		background-color: #2f2f2f; 
		width: 220px;
		padding: 30px; 
		margin-bottom: 35px; 
	}
	
	div.box p
	{ 
		margin-bottom: 10px; 
		text-align: center; 
	}
	
	div.box p.campo input
	{ 
		width: 148px; 
		font-size: 14px; 
		padding: 10px 5px; 
		text-align: center;
		border: 1px solid #5c5c5c;
		background: none; 
		color: #a5a5a5;
	}
	
	div.box p.botao 
	{ 
		text-align: center; 
		margin-bottom: 0px; 
	}
	
	div.box p.botao input[type="submit"]
	{ 
		width: 160px;
		height: 40px;
		font-size: 13px; 
		font-weight: bold; 
		text-transform: uppercase; 
		border: 1px solid #5c5c5c;
		background-color: #2f2f2f; 
		color: #a5a5a5;
	}
	
	</style>
</head>


<body>

<?php 

// Instancia a classe do captcha na sessão
$_SESSION[$dirAdmin . '_captcha'] = simple_php_captcha();

?>

<div class="boxbg"></div>
<div class="box">
	<form method="post">
		<h1>painel administrativo</h1>
		
		<p class="campo"><input type="password"	name="senha" 	id="senha" 		placeholder="Senha"></p>
		<p class="campo"><input type="text" 	name="captcha" 	id="captcha"	placeholder="Verificação"></p>
		
		<p class="campo"><img src="<?php echo $_SESSION[$dirAdmin . '_captcha']['image_src']; ?>" alt="Captcha"></p>
		
		<p class="botao"><input type="submit" 	value="Entrar"></p>
	</form>
</div>

</body>
</html>