<?php

include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>

<!-- apresentação da ideia da pagina -->

  <div class="titulo">
    <h4><?php
    session_start();
        echo"Ola ".$_SESSION['email'];
    ?> <br >  Bem Vindo ao Painel do Investidor!</h4>


    <br><br>
    <fieldset class="janela_modal1" id="janela_modal" >
    <span class="modal1">
    <a href="quest.php">* clique aqui para fazer sua analise de risco para investimentos !</a> <br><br>
    <a href="cursos.php">* clique aqui para conhecer os nossos cursos de investimentos !</a> <br><br>
    <a href="rec_inv.php">* clique aqui para ver a recomendacões de investimento para o seu perfil( necessario ter perfil de risco definido!) </a> <br><br>
    </span>
    </fieldset>

  </div>


  <?php

include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?>