
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css"> <!--link o arquivo css-->
  <img class="fundo" src="imagens/fumaca-azul.png" width=100% height="60"> <!-- fundo fumaça-->
  <a href="index.php"><img id="polvo" src="imagens/polvo2.png" width="40%" height="120"></a> <!-- polvo octos mascote-->
  <a href="cad1.php"><img class="submenu2" id="cad" src="imagens/do-utilizador.png" width="80" height="80" style="border:solid black"></a>
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!--adiciona a biblioteca Jquery-->
  <script src="sub1.js"></script>

  <!-- função para alternar o modo do site -->
  <script>
    window.onload = function () {
      var modoEscuro = localStorage.getItem("modoEscuro");
      if (modoEscuro === "true") {
        modoescuro();
      } else {
        modoclaro();
      }
    };
  </script>

 
</head>

<body>
<!-- botao para alterar o modo de exibição do site -->
  <div class="submenu1">
    <div> <button id="modoescuro" onclick="alternarModo()">Modo Escuro</button></div>
    <fieldset id="bemvindo">
      <h1> Bem vindo ao <span id="octos"> OCTOS </span> <br>
        Nossos braços alcançam seus objetivos!</h1>
    </fieldset>
  </div>
<!-- submenu de navegaççao entre as paginas do site -->
  <fieldset class="field2" id="field2">
    <table id="tab">
      <td class="td1" id="td1" onmouseenter="onMouseEnter(\'td1\')" onmouseleave="onMouseLeave(\'td1\')"><a
          href="sub1.html">Calculadora Renda Fixa </a></td>
      <td class="td2" id="td1" onmouseenter="onMouseEnter(\'td2\')" onmouseleave="onMouseLeave(\'td2\')"><a
          href="sub2.html">Parcelar</a></td>
      <td class="td3" id="td1" onmouseenter="onMouseEnter(\'td3\')" onmouseleave="onMouseLeave(\'td3\')"><a
          href="sub3.html">Avista</a></td>
      <td class="td4" id="td1" onmouseenter="onMouseEnter(\'td4\')" onmouseleave="onMouseLeave(\'td4\')"><a
          href="sub4.html">Projeto Tamar </a></td>
      <td class="td5" id="td1" onmouseenter="onMouseEnter(\'td5\')" onmouseleave="onMouseLeave(\'td5\')"><a
          href="sub5.html">Fundos Imobiliarios </a><img class="cadeado" id="cadeado" src="imagens/cadeado.png"></td>
      <td class="td6" id="td1" onmouseenter="onMouseEnter(\'td6\')" onmouseleave="onMouseLeave(\'td6\')"><a
          href="sub6.html">Area exclusiva </a><img class="cadeado" id="cadeado1" src="imagens/cadeado.png"></td>
    </table>
  </fieldset>

