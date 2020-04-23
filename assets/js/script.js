$(function(){
	/* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           
           $.ajax({
                url : BASE+'ajax/consultar_cep',  
                type : 'POST', 
                data: 'cep=' + $('#cep').val(), 
                dataType: 'json', 
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);
 
                        $('#numero').focus();
                    }
                }
           });   
   return false;    
   })
   
	
});