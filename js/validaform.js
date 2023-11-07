// fazer a valição previa dos formularios de login e senha 
// realiza o redirecionamento para a pagina quest.php

function validaform(){
window.location.href="quest.php";

}

function vl_total(inputField) {
    var vl = inputField.value;  // Obtem o valor da quantidade
    var qt = parseFloat(inputField.value);  // Converte o valor para um número

    // Encontre o campo de total correspondente
    var totalField = inputField.nextElementSibling; // Assumindo que o campo total é o próximo elemento após o campo quantidade

    var tot = vl * qt;

    totalField.value = "R$" + tot.toFixed(2);
}
function rem_recomendacao() {
   var checkboxes = document.querySelectorAll('.comprar-checkbox');

   checkboxes.forEach(function (checkbox) {
       checkbox.checked = false;
   });
}

function add_recomendacao() {
   var checkboxes = document.querySelectorAll('.comprar-checkbox');

   checkboxes.forEach(function (checkbox) {
       checkbox.checked = true;
   });
}