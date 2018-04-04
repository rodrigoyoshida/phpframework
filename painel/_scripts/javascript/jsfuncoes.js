$(document).ready(function(){
	
	//Ativa o accordion
	$("#accordion").accordion();

	//Ativa o lightbox
	$( '.swipebox' ).swipebox();

});

//Busca um endereço à partir do CEP
function buscaCep(cep){
	
	$.post('../_scripts/php/ajax.php', {func: 'buscaEndereco', cep: cep}, 
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