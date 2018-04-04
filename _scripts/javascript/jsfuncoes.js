$(document).ready(function(){
	
	//Ativa os placeholder para versões de navegadores antigos  
    $('input, textarea').placeholder();

});

//Busca um endereço à partir do CEP
function buscaCep(cep){
	
	$.post('_scripts/php/ajax.php', {func: 'buscaEndereco', cep: cep}, 
		function (data){ 
			
			//Se foi encontrado um endereço
			if(data.sucesso > 0){

				$('#cmp_endereco').val(data.rua);
                $('#cmp_bairro').val(data.bairro);
                $('#cmp_cidade').val(data.cidade);
                $('#cmp_estado').val(data.estado);

			}

		}, 
	'json');

}

//Verifica se o site está sendo acessado por um dispositivo móvel
function mobile() { 

	if( navigator.userAgent.match(/Android/i)
 	|| navigator.userAgent.match(/webOS/i)
 	|| navigator.userAgent.match(/iPhone/i)
 	|| navigator.userAgent.match(/iPad/i)
 	|| navigator.userAgent.match(/iPod/i)
 	|| navigator.userAgent.match(/BlackBerry/i)
 	|| navigator.userAgent.match(/Windows Phone/i)
 	){
    	return true;
  	}
 	else {
    	return false;
  	}

}