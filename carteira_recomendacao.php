<?php
session_start();
//var_dump($_SESSION);
require_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>
<?php

if($_SESSION['email']){
echo"
  <div class=\"titulo\">
    <h4>";
  
echo 'Ola'.$_SESSION['nome'];
echo"
 <br >  Bem Vindo ao Painel do Investidor!</h4>




    <br><br>
    <fieldset class=\"janela_modal1\" id=\"janela_modal\" >
    <span class=\"modal1\">
    <a href=\"quest.php\">* clique aqui para fazer sua analise de risco para investimentos !</a> <br><br>
    <a href=\"cursos.php\">* clique aqui para conhecer os nossos cursos de investimentos !</a> <br><br>
    <a href=\"ckcompra.php\">* clique aqui para ver a recomendacões de investimento para o seu perfil( necessario ter perfil de risco definido!) </a> <br><br>
    <a href=\"form_end.php\">* clique aqui para preencher o seu endereço completo... nao leva 2 min! </a> <br><br>
    <a href=\"ativos.php\">* clique aqui para ver seus ativos </a> <br><br>
    </span>
    </fieldset>

  </div>";
}
else {
  header("Location: index.php");
}
?>
  <?php
 
include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?>