// efeito de mostrar e esconder a imagem de fundo a fumação que fica atras da lula.
$(document).ready(function () {
  function animacaofumaca() {
    $(".fundo").fadeOut(1500);
    $(".fundo").fadeIn(3500);
  }

  setInterval(animacaofumaca, 10000);
  animacaofumaca(); // inicia a função

  // realiza o calculo aproximado dos rendimentos no selic dias.

  function selic() {
    var selicElement = document.getElementById("selic");
    var selicValue = parseFloat(selicElement.value);
    var num = selicValue;
    if (num < 0.1 || num > 100.00) {
      alert("Erro a taxa selic deve estar entre 0.1% a 100.00% !");
      return false;
    }

    var selicValue = parseFloat(selicElement.value) - 3.07125;

    // alert("O valor da Selic é: " + selicValue.toFixed(2));

    selicValue = selicValue / 365;
    // alert("O valor da Selic é: " + selicValue.toFixed(2));

    var valor = document.getElementById("valorinv");
    var valorInv = parseFloat(valor.value);
    //  alert("O valor do Investimento é: " + valorInv.toFixed(2));

    var diast = document.getElementById("dias");
    var dias = parseInt(diast.value);
    // alert("O Total de dias investidos é: " + dias);

    var resultado = ((selicValue * valorInv) * dias) / 100 + valorInv;

    var num = valorInv;
    if (num < 0.1 || num > 1000000.00) {
      alert("Desculpe só calculamos o rendimento entre 0.1 até 1 Bilhão!");
      return false;
    }

    var num = dias;
    if (num < 1 || num > 720) {
      alert("Desculpe só calculamos entre 01 até 720 dias!");
      return false;
    }




    alert("O retorno desse investimento é: " + resultado.toFixed(2));
  }


  // mostrar o valor de rendimento da aplicação mensal para o usuario quando selecionado mostrar tabela.
  function tabela() {
    var selicElement = document.getElementById("selic");
    var selicValue = parseFloat(selicElement.value);

    var num = selicValue;
    if (num < 0.1 || num > 100.00) {
      alert("Erro a taxa selic deve estar entre 0.1% a 100.00% !");
      return false;
    }
    var selicValue = parseFloat(selicElement.value) - 3.07125;
    selicValue = selicValue / 365;


    var valor = document.getElementById("valorinv");
    var valorInv = parseFloat(valor.value);

    var num = valorInv;
    if (num < 0.1 || num > 1000000.00) {
      alert("Desculpe só calculamos o rendimento entre 0.1 até 1 Bilhão!");
      return false;
    }


    var jan = valorInv + ((valorInv * selicValue) * 30) / 100;
    document.getElementById("jan").innerHTML = "R$ " + jan.toFixed(2);

    var fev = valorInv + ((valorInv * selicValue) * 60) / 100;
    document.getElementById("fev").innerHTML = "R$ " + fev.toFixed(2);

    var mar = valorInv + ((valorInv * selicValue) * 90) / 100;
    document.getElementById("mar").innerHTML = "R$ " + mar.toFixed(2);

    var abr = valorInv + ((valorInv * selicValue) * 120) / 100;
    document.getElementById("abr").innerHTML = "R$ " + abr.toFixed(2);

    var mai = valorInv + ((valorInv * selicValue) * 150) / 100;
    document.getElementById("mai").innerHTML = "R$ " + mai.toFixed(2);

    var jun = valorInv + ((valorInv * selicValue) * 180) / 100;
    document.getElementById("jun").innerHTML = "R$ " + jun.toFixed(2);

    var jul = valorInv + ((valorInv * selicValue) * 210) / 100;
    document.getElementById("jul").innerHTML = "R$ " + jul.toFixed(2);

    var ago = valorInv + ((valorInv * selicValue) * 240) / 100;
    document.getElementById("ago").innerHTML = "R$ " + ago.toFixed(2);

    var set = valorInv + ((valorInv * selicValue) * 270) / 100;
    document.getElementById("set").innerHTML = "R$ " + set.toFixed(2);

    var out = valorInv + ((valorInv * selicValue) * 300) / 100;
    document.getElementById("out").innerHTML = "R$ " + out.toFixed(2);

    var nov = valorInv + ((valorInv * selicValue) * 330) / 100;
    document.getElementById("nov").innerHTML = "R$ " + nov.toFixed(2);

    var dez = valorInv + ((valorInv * selicValue) * 360) / 100;
    document.getElementById("dez").innerHTML = "R$ " + dez.toFixed(2);

  }

  // botao de calcular o rendimento mensal.
  $("#calcular").click(function () {
    selic();
  });

  // botao de mostrar a tabela.
  $("#tabela").click(function () {
    tabela();
  });
});

// altera a cor quando o mouse entra no espaço do elemento
function onMouseEnter(className) {
  var elements = document.getElementsByClassName(className);
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.backgroundColor = "rgba(238,130,238)";
  }
}

// altera a cor quando o mouse sai do espaço do elemento nesse caso retornar a cor para o padrao.
function onMouseLeave(className) {
  var elements = document.getElementsByClassName(className);
  for (var i = 0; i < elements.length; i++) {
    if (i === 5) {
      elements[i].style.backgroundColor = "rgba(16, 78, 247)";
    } else {
      elements[i].style.backgroundColor = "rgba(137, 49, 196, 0.719)";
    }
  }
}

// função utilizada para alternar entre os modos claro e escuro, alternando tambem a descrição do botao, para opção contraria a selecionada.

function alternarModo() {
  var elemento = document.getElementsByTagName("body")[0];
  var btnModoEscuro = document.getElementById("btnModoEscuro");
  var modoEscuro = localStorage.getItem("modoEscuro");

  if (modoEscuro === "true") {
    modoclaro();
    btnModoEscuro.innerHTML = "Modo Escuro";
  } else {
    modoescuro();
    btnModoEscuro.innerHTML = "Modo Claro";
  }
}

// função do modo escuro

function modoescuro() {
  var elemento = document.getElementsByTagName("body")[0];
  elemento.style.backgroundColor = "rgba(17, 17, 17)";
  elemento.style.color = "#ffffff";

  var elementoRodape = document.getElementById("rodape");
  elementoRodape.style.color = "#ffffff";

  var elementoRod = document.getElementById("rod");
  elementoRod.style.color = "#ffffff";

  var elementoRod = document.getElementById("cad");
  elementoRod.style.color = "#ffffff";

  var elemento = document.getElementById("sm1");
  elemento.src = "whatsapp2.png";

  var elemento = document.getElementById("sm2");
  elemento.src = "telegram2.png";

  var elemento = document.getElementById("sm3");
  elemento.src = "discordia2.png";

  var elemento = document.getElementById("cadeado");
  elemento.src = "cadeado2.png";

  var elemento = document.getElementById("cadeado1");
  elemento.src = "cadeado2.png";

  var elemento = document.getElementById("modoescuro");
  elemento.innerHTML = "Modo Claro";


  // Armazena a preferência do usuário no localStorage, para evitar ter que alterar a cada troca de sub-pagina.
  localStorage.setItem("modoEscuro", "true");

  // Chama a função alternarModo()
  alternarModo();

}

// função do modo claro

function modoclaro() {
  var elemento = document.getElementsByTagName("body")[0];
  elemento.style.backgroundColor = "";
  elemento.style.color = "";

  var elementoRodape = document.getElementById("rodape");
  elementoRodape.style.color = "";

  var elementoRod = document.getElementById("rod");
  elementoRod.style.color = "";

  var elemento = document.getElementById("sm1");
  elemento.src = "whatsapp.png";

  var elemento = document.getElementById("sm2");
  elemento.src = "telegram.png";

  var elemento = document.getElementById("sm3");
  elemento.src = "discordia.png";

  var elemento = document.getElementById("cadeado");
  elemento.src = "cadeado.png";

  var elemento = document.getElementById("cadeado1");
  elemento.src = "cadeado.png";

  var elemento = document.getElementById("modoescuro");
  elemento.innerHTML = "Modo Escuro";

  // Remove a preferência do usuário do localStorage, para evitar alternar a cada troca de sub-pagina.
  localStorage.removeItem("modoEscuro");

  // Chama a função alternarModo()
  alternarModo();

}
