<?php
session_start();
include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>
<?php

if($_SESSION['email']){
  echo"


  <div class=\"titulo\">
    <h4>Area de cadastro Octos!
      <br><br> Por gentileza preencha o formulario abaixo para ter acesso a area premium do nosso site!!!
    </h4>
  </div>
  <br><br>

<div class=\"janela_modal\" id=\"janela_modal\">
<div class=\"modal\">
<form action=\"usuarioperfil.php\" method=\"post\">


<fieldset>
  <legend>Formulario de Perfil de Risco!</legend>";
?>
  <?php
  
    require_once('banco.php');
    require_once('select.php');

  //echo($_SESSION['id_usuario']);
  $sql = 'SELECT SUM(vl_resposta) as total_resposta FROM tb_usuarioperfil WHERE id_usuario = :reserva';
  global $conn; // buscando a variável conn do arquivo banco.php
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':reserva', $_SESSION['id_usuario']);
  $stmt->execute();
  $quest = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if ($quest && $quest['total_resposta'] >= 0) {
      echo 'Perfil de Risco já preenchido';

     echo'<br><br><button ><a href="quest_update.php"> Atualizar Perfil.</a></button>'; 

     echo'<br><br><button ><a href="carteira_recomendacao.php"> Acessar Painel. </a></button>';

  } 
  else {
      echo 'Necessário preencher o perfil de risco';
  
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

 $questoes = questoes(); // Chama a função para obter as questões
 foreach ($questoes as $questao) {
     echo '<br><label type="text" name="' . $questao['id_questao'] . '">' . $questao['ds_questao'] . '</label> <br>';
 
     $respostas = resposta();
     foreach ($respostas as $resposta) {
         if ($resposta['id_questao'] == $questao['id_questao']) {
          echo '<br><label for="resposta">' . $resposta['id_questao'] . '. ' . $resposta['ds_resposta'] . '</label>';

             echo '<input type="radio" name="resposta.' . $resposta['id_questao'] . '" value="' . $resposta['vl_resposta'] . '" id="resposta"> <br>';
         }
     }
 }
 echo "<br> <br>";    
echo'<button onclick="enviarRespostas()">Enviar</button>
</fieldset>

</form>

</div>

</div>

</body>

<br><br>';
  }}
  else{
    header("Location: index.php");
  };
  ?>
<?php
include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?>