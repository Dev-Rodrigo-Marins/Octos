<?php

include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>

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
<form action="usuarioperfil.php" method="post">


<fieldset>
  <legend>Formulario de Perfil de Risco!</legend>

  <?php
  
    require_once('banco.php');

  //echo($_SESSION['id_usuario']);
  $sql = 'SELECT SUM(vl_resposta) as total_resposta FROM tb_usuarioperfil WHERE id_usuario = :reserva';
  global $conn; // buscando a variável conn do arquivo banco.php
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':reserva', $_SESSION['id_usuario']);
  $stmt->execute();
  $quest = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if ($quest && $quest['total_resposta'] > 0) {
      echo 'Perfil de Risco já preenchido';

     echo'<br><br><button ><a href="quest_update.php"> Atualizar Perfil.</a></button>'; 

     echo'<br><br><button ><a href="carteira_recomendacao.php"> Acessar Painel. </a></button>';

  } 
  else {
      echo 'Necessário preencher o perfil de risco';
  

  function questoes(){
    global $conn; // busca fora do arquivo a variavel global com a conexao
    $sth=$conn->prepare("select id_questao,ds_questao from tb_questionario");
    $sth->execute();
    return $sth->fetchAll();
  }

  function resposta(){
    global $conn; // busca fora do arquivo a variavel global com a conexao
    $sth=$conn->prepare("select id_questao,ds_resposta,vl_resposta from tb_resposta");
    $sth->execute();
    return $sth->fetchAll();
  }

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
echo'<button onclick="enviarRespostas()">Enviar</button>';

}
?>
  </fieldset>

</form>

</div>

</div>

</body>

<br><br>

<!-- rodape -->
<?php

include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?> 