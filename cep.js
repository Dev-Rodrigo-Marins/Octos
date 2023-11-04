function busca_cep() {
    let cep = document.getElementById('inputCEP').value;

    if( cep !=""){
        let url= "https://brasilapi.com.br/api/cep/v1/" + cep;
        
        let req = new XMLHttpRequest();
        req.open("GET",url);
        req.send();

        req.onload = function(){
            if(req.status === 200){
                let endereco = JSON.parse(req.response);
                document.getElementById("inputAddress").value = endereco.street;
                document.getElementById("inputBairro").value = endereco.neighborhood;
                document.getElementById("inputCity").value = endereco.city;
                document.getElementById("inputEstado").value = endereco.state;
            }
            else if(req.status === 404){
                alert("Cep Informado  inválido!");
            }
            else{
                alert("Erro ao fazer a requisição.")
            }
        }
    }
}   

window.onload = function(){
    let inputCEP = document.getElementById('inputCEP');
    inputCEP.addEventListener('blur',busca_cep);
}