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
  <img class="submenu2" id="cad" src="imagens/do-utilizador.png" width="80" height="80" style="border:solid black">
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
<br><br>

<div class="janela_modal" id="janela_modal">
<div class="modal">
<form action="" method="post">

<!--<label for="nome">Nome Completo:</label><br>
<input type="text" name="nome" id="nome"> <br><br>

<label for="endereco">Endereco</label> <label for="Numero_end"></label><br>
<input type="text" name="endereco" id="endereco"> <br><br>

<label for="email">E-mail</label><br>
<input type="email" name="email" id="email"><br><br>

<label for="login">Login / Usuario</label><br>
<input type="text" name="login" id="login"> <br><br>

<label for="senha">Senha</label><br>
<input type="password" name="senha" id="senha"> <br><br>

<label for="csenha">Confirmação Senha</label><br>
<input type="text" name="csenha" id="csenha"> <br><br>


<input type="submit" value="Enviar" > -->

<fieldset>
  <legend>Formulario de  definição de perfil de risco !</legend>

  <label type="text" name="questao"> variavel pergunta 1 </label> <br>

  <br><br><br>

  <?php
/*
  $questoes = array(
      array(1, "Qual é o seu objetivo principal ao investir?"),
      array(2,"Qual é o prazo estimado para o seu investimento?"),
      array(3,"Qual é a sua tolerância ao risco?"),
      array(4,"Como você reagiria se o valor dos seus investimentos diminuísse consideravelmente em um curto período?"),
      array(5,"Qual é a sua familiaridade com diferentes tipos de investimentos?"),
      array(6,"Quanto do seu patrimônio você está disposto a investir?"),
      array(7,"Qual é a sua situação financeira atual?"),
      array(8,"Você possui alguma experiência prévia em investimentos?"),
      array(9,"Como você se sente em relação a buscar ativamente novas oportunidades de investimento?"),
      array(10,"Em qual destas situações você se encaixa melhor?")
      
  );
  
  $respostas = array(
      array(1, "Preservação de capital.", "Baixo"),
      array(1, "Crescimento moderado.", "Médio"),
      array(1, "Alto Crescimento.", "Alto"),
      //espaçamento para a resposta 2
      array(2, "Curto prazo (até 2 anos).", "Baixo"),
      array(2, "Médio prazo (2-5 anos).", "Medio"),
      array(2, "Longo prazo (mais de 5 anos).", "Alto"),
      //espaçamento para a resposta 3
      array(3, "Baixa.", "Baixo"),
      array(3, "Media.", "Medio"),
      array(3, "Alta.", "Alto"),
      //espaçamento para a resposta 4
      array(4, "Venderia imediatamente.", "Baixo"),
      array(4, "Monitoraria de perto.", "Medio"),
      array(4, "Não me preocuparia.", "Alto"),
      // espaçamento para a resposta 5
      array(5, "Baixa.", "Baixo"),
      array(5, "Media.", "Medio"),
      array(5, "Alta.", "Alto"),
      // espaçamento para a resposta 6
      array(6, "Menos de 25%.", "Baixo"),
      array(6, "Entre 25% e 50%.", "Medio"),
      array(6, "Mais de 50%.", "Alto"),
      //espaçamento para a resposta 7
      array(7, "Estável.", "Baixo"),
      array(7, "Moderada.", "Medio"),
      array(7, "Instável.", "Alto"),
      //espaçamento para a resposta 8
      array(8, "Nenhuma.", "Baixo"),
      array(8, "Alguma.", "Medio"),
      array(8, "Consideravel.", "Alto"),
      //espaçamento para a resposta 9
      array(9, "Não estou interessado.", "Baixo"),
      array(9, "Um pouco interessado.", "Medio"),
      array(9, "Muito interessado.", "Alto"),
      //espaçamento para a resposta 10
      array(10, "Prefiro retornos estáveis.", "Baixo"),
      array(10, "Estou disposto a aceitar flutuações moderadas.", "Medio"),
      array(10, "Estou disposto a lidar com grandes flutuações.", "Alto")
      
  );
  
  function pergunta() {
      global $questoes;
      global $respostas;
      
      // laço de repetição para imprimir as questoes;
      
      for ($i = 0; $i < count($questoes); $i++) {
          echo '<br><label type="text" name="questao.$i.">' . $questoes[$i][1] . '</label> <br>';
     
  
      // laço de repetição para imprimir as respostas 
      
      for ($j = 0; $j < count($respostas); $j++) {
           if ($respostas[$j][0] == $questoes[$i][0]) { // condicional que permite imprimir as respostas com os indices 
           // do vetor comparando a primeira coluna de questao com a primeira coluna de resposta, sendo igual 
           // a pergunta e as respectivas respostas sao impressas;
           
          echo '<br><label for="resposta' . $j . '">' . $respostas[$j][1] . '</label>';
          echo '<input type="radio" name="resposta'.$j.'" value="' . $respostas[$j][2] . '" id="resposta' . $j . '"> <br>';
           }
          
          
      }
  }}
  
  pergunta();// chama a função pergunta, sem ela nada é feito !!!
  */
  ?>

  </fieldset>



</form>



</div>

</div>


<?php
 echo "teste";


?>





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