<?php

require_once('banco.php');

include_once'inclusoes/cabecalho.php';

## apresentação da ideia da pagina 
echo'<div class="titulo">
        <h4>Area de cadastro Octos!
        <br><br> Por gentileza preencha o formulario abaixo para ter acesso a area premium do nosso site!!!
        </h4>
    </div>';
##inicio dos formularios...
echo'<br><br>
    <div class="janela_modal" id="janela_modal">
        <div class="modal">
        <form action="usuarioperfil_update.php" method="post">
        <fieldset>
        <legend>Formulario de Perfil de Risco!</legend>';

# funcoes para selecionar as questoes e respostas no banco
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

 # fim do bloco para selecionar as questoes e respostas no banco

# bloco para imprimir as questoes e respostas para o usuario
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
 # fim do bloco que imprime as questoes e respostas ao usuario

echo "<br> <br>";    
echo'<button onclick="enviarRespostas()">Enviar</button>';

    echo'</fieldset>
        </form>
        </div>
        </div>
    </body>
<br><br>';


include_once 'inclusoes/rodape.php';

?>