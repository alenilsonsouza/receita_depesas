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
        let myInit = { 
                method: 'POST',
                mode: 'cors',
                cache: 'default',
                body: JSON.stringify({
                    month,
                    year,
                })
                
            };

        let moviments = document.querySelector('#moviments');
        await fetch(`${BASE}ajax/listMoviment`, myInit)
            .then((r)=>r.text())
            .then((r)=>{
                moviments.innerHTML = r; 
                let modal = document.querySelectorAll('.bt-edit'), i;
                for(i=0; i < modal.length; i++) {
                    modal[i].addEventListener('click', function(){
                        let id = this.getAttribute('data-id');
                        editMoviment(id);
                    });
                }
                let el = document.querySelectorAll('.bt-consolidar'), n;
                for(n=0;n<el.length;n++) {
                    let id = el[n].getAttribute('data-id');
                    consolidar(id);
                }
                
            })
            .catch(error => {
                moviments.innerHTML = error
            });
    }

    function editMoviment(id) {
        let myInit = { 
            method: 'POST',
            mode: 'cors',
            cache: 'default',
            body: JSON.stringify({
                id,
            })
        };
        fetch(`${BASE}ajax/editMoviment`, myInit)
            .then((r)=>r.text())
            .then((r)=>{
                document.querySelector('.modal-body').innerHTML = r; 
                //Máscara
                mask();
            })
            .catch(error => {   
                document.querySelector('.modal-body').innerHTML = error
            });
       
    }

    function consolidar(id) {
        let myInit = { 
            method: 'POST',
            mode: 'cors',
            cache: 'default',
            body: JSON.stringify({
                id,
            })
        };
        fetch(`${BASE}ajax/consolidar`, myInit)
            .then((r)=>r.text())
            .then((r)=>{
                document.querySelector('.modal-body').innerHTML = r; 
                //Máscara
                let data = document.querySelectorAll('.data'), d;
                for(d=0;d<data.length;d++) {
                    IMask(data[d],{
                        mask: '00/00/0000'
                    });
                }
            })
            .catch(error => {   
                document.querySelector('.modal-body').innerHTML = error
            });
       
    }

    function updateDate(){
        let elMonth = document.querySelector('#month');
        let elYear = document.querySelector('#year');
        let month = elMonth.options[elMonth.selectedIndex].value;
        let year = elYear.options[elYear.selectedIndex].value;
        loadMoviments(month, year);
    }

    //Pega os elementos mes e ano
    let elMonth = document.querySelector('#month');
    let elYear = document.querySelector('#year');

    //Pega o item selecionado mes e ano
    let month = elMonth.options[elMonth.selectedIndex].value;
    let year = elYear.options[elYear.selectedIndex].value;

    //Pega o item selecionado mes e ano
    elMonth.addEventListener('change', function(){updateDate()});
    elYear.addEventListener('change', function(){updateDate()});

    //Executa a função para listar a movimentação 
    loadMoviments(month, year);

    function mask() {
        let valor = document.querySelectorAll('.valor'), v;
        let data = document.querySelectorAll('.data'), d;
        //Opções de formato de valores em reais
        let options = {
            mask:Number,
            scale: 2,  // digits after point, 0 for integers
            signed: false,  // disallow negative
            thousandsSeparator: '',  // any single char
            padFractionalZeros: true,  // if true, then pads zeros at end to the length of scale
            normalizeZeros: true,  // appends or removes zeros at ends
            radix: ',',  // fractional delimiter
            mapToRadix: ['.']  // symbols to process as radix
        }
    
        for(v=0;v<valor.length;v++) {
            IMask(valor[v], options);
        }
    
        for(d=0;d<data.length;d++) {
            IMask(data[d],{
                mask: '00/00/0000'
            });
        }
    }
    mask();
})