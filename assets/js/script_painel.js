$(document).ready(function(){	/* Executa a requisição quando o campo CEP perder o foco */
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
    });
    
    async function loadMoviments(month, year) {
        let myHeaders = new Headers();
        let myInit = { 
                method: 'POST',
                //headers: myHeaders,
                mode: 'cors',
                cache: 'default',
                body: JSON.stringify({
                    month,
                    year,
                })
                
            };

        moviments = document.querySelector('#moviments');
        await fetch(`${BASE}ajax/listMoviment`, myInit)
            .then((r)=>r.text())
            .then((r)=>{
                moviments.innerHTML = r; 
            })
            .catch(error => {
                moviments.innerHTML = error
            });
    }

    
    let elMonth = document.querySelector('#month');
    let elYear = document.querySelector('#year');

    let month = elMonth.options[elMonth.selectedIndex].value;
    let year = elYear.options[elYear.selectedIndex].value;

    elMonth.addEventListener('change', function(){
        let month = elMonth.options[elMonth.selectedIndex].value;
        let year = elYear.options[elYear.selectedIndex].value;
        console.log(`${month} - ${year}`);
        loadMoviments(month, year);
    });

    elYear.addEventListener('change', function(){
        let month = elMonth.options[elMonth.selectedIndex].value;
        let year = elYear.options[elYear.selectedIndex].value;
        console.log(`${month} - ${year}`);
        loadMoviments(month, year);
    });
    loadMoviments(month, year);

    


    
})