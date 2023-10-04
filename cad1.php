<!DOCTYPE html>
<html lang="pt-br">

<!--teste de comentari no arquvo git -->


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
  <script src="validacad.js"></script>
  <script src="validaform.js"></script>

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
      <td class="td1" id="td1" onmouseenter="onMouseEnter('td1')" onmouseleave="onMouseLeave('td1')"><a
          href="sub1.html">Calculadora Renda Fixa </a></td>
      <td class="td2" id="td1" onmouseenter="onMouseEnter('td2')" onmouseleave="onMouseLeave('td2')"><a
          href="sub2.html">Parcelar</a></td>
      <td class="td3" id="td1" onmouseenter="onMouseEnter('td3')" onmouseleave="onMouseLeave('td3')"><a
          href="sub3.html">Avista</a></td>
      <td class="td4" id="td1" onmouseenter="onMouseEnter('td4')" onmouseleave="onMouseLeave('td4')"><a
          href="sub4.html">Projeto Tamar </a></td>
      <td class="td5" id="td1" onmouseenter="onMouseEnter('td5')" onmouseleave="onMouseLeave('td5')"><a
          href="sub5.html">Fundos Imobiliarios </a><img class="cadeado" id="cadeado" src="imagens/cadeado.png"></td>
      <td class="td6" id="td1" onmouseenter="onMouseEnter('td6')" onmouseleave="onMouseLeave('td6')"><a
          href="sub6.html">Area exclusiva </a><img class="cadeado" id="cadeado1" src="imagens/cadeado.png"></td>
    </table>
  </fieldset>

<!-- apresentação da ideia da pagina -->

  <div class="titulo">
    <h4>Area de cadastro Octos!
      <br><br> Por gentileza preencha o formulario abaixo para ter acesso a area premium do nosso site!!!
    </h4>
  </div>
 <!--inicio dos formularios... -->

 <script>
  function redirecionarParaLogin() {
    window.location.href = "login.php";
  }
</script>

<form action="inserir_cadastro.php" method="post">


<fieldset class="janela_modal" id="janela_modal" >
  <span class="modal1">

  <button id="login"><a href="login.php">Login / Entrar</a></button>
  
  <br><br>

  <legend>Formulario de cadastro</legend>
  <br><br>
    <label for="email">E-mail / Usuario</label><br>
    <input type="email" name="email" id="email"><br><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha" id="senha"> <br><br>

    <label for="csenha">Confirmação Senha</label><br>
    <input type="password" name="csenha" id="csenha"> <br><br>

    <label for="nome">Nome</label><br>
    <input type="text" name="nome" id="nome"> <br><br>

<?php

require_once("banco.php");
require_once("select.php");

$salario = db_faixa_salarial_select();


?>
<select name="faixa_salarial" id="faixa_salarial">
    <?php foreach ($salario as $row): ?>
        <option value="<?= $row['id_salario'] ?>"><?= $row['fl_faixa_salario'] ?></option>
    <?php endforeach; ?>
</select>
</div>
<br><br>
<input type="submit" value="Enviar">
<br><br>
 
  <br><br>
  </span>
  </fieldset>

</form>


</div>

</div>

</body>

<br><br>

<!-- rodape -->

<footer id="rodape">
  <fieldset id="f1">
    <legend>
      <p id="trodape"> Para uma consultoria mais detalhada, entre em contato por nossos canais digitais.</p>
    </legend>
    <table id="roda">
      <td style="vertical-align: middle; text-align: center;">
        <div class="social-media">
          <div class="smd">
            <a href="https://wa.me/5551986102344?" text="Ola,%20Bem%20Vindo%20a%20Octos!" target="_blank"><img id="sm1"
                src="imagens/whatsapp.png" width="80" height="60"></a>
            <a href="https://t.me/+aIB0CcdetzQyOGVh" target="_blank"><img id="sm2" src="imagens/telegram.png" width="80"
                height="60"></a>
            <a href="https://discord.gg/H8tQSkTc" target="_blank"><img id="sm3" src="imagens/discordia.png" width="80"
                height="60"><br><br></a>
          </div>
          <a href="https://www.youtube.com/@rodrigomarins9970" target="_blank"><img id="btinscrever"
              src="imagens/bt inscrever.png" width="270" height="100"></a>
          <img class="fundo" id="anuncio" src="imagens/anunciof2.png" width="750" height="160">
          <img id="loc" src="imagens/horario2.png" width="220" height="110">
          <a href="https://goo.gl/maps/TK1t8Ne9votr7Vgd6" target="_blank"><img id="loc" src="imagens/localizacao.png" width="80"
              height="80"></a>
        </div>
      </td>

    </table>

    <p id="rod">

      <br>E-mail: <a class="l1" href="mailto:octos@octos.com.br"> octos@octos.com.br </a>
      <br>Rua Comendador Neto 2354
      <br> Anchieta, São Paulo - Brasil.
      <br>Cep 09834-000
    </p>

  </fieldset>
</footer>

</html>