<?php
require_once("./banco.php");
include_once "./inclusoes/cabecalho.php";
/*
echo '<br><br>';
echo "ELEMENTOS DA SESSAO <br><br> ";

foreach ($_SESSION as $chave => $valor) {
    echo "$chave: $valor<br>";
}
*/
echo '
<div class="titulo">
<h4>Recomendação de investimentos de ' . $_SESSION['perfil'] . ' para
<br> ' . $_SESSION['nome'] . '
  <br><br> Conforme o seu perfil de risco segue recomendações de ativos ao qual você deve ter em sua carteira de investimentos
</h4>
</div>';

echo'
<table class=\'tabela3\'>
<tr>
<td><strong>Perfil</strong></td>
<td><strong>Ticker</strong></td>
<td><strong>Ações</strong></td>
<td><strong>Rentabilidade 2022</strong></td>
</tr><br>';

// Corrija a consulta SQL usando marcadores de posição '?'
$sql = "SELECT sg_acao, nm_acao,tb_acao.ds_perfil FROM tb_acao, tb_compra WHERE tb_acao.ds_perfil = ? AND tb_compra.id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_SESSION['perfil']);
$stmt->bindParam(2, $_SESSION['id_usuario']);
$stmt->execute();

// Use um loop para iterar pelas linhas do resultado da consulta
while ($acao = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo 
  '<tr>
   <td>'.$perfil['ds_perfil'].'</td>
   <td>'.$acao['sg_acao'] . ' </td>
   <td>'.$acao['nm_acao'] . ' </td>
   <td class="rent">32%</td>
   </tr> <br>';
}

echo '</table>';

$stmt->execute();

echo '<div class =\'tabela3\'>';

while ($acao= $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo '<input type="text" class="form-control" name="' . $acao['sg_acao'] . '" placeholder="' . $acao['sg_acao'] . '">';
  echo '<select class="acao" name="acao" id="acao">';
  echo "<option value='" . $acao['sg_acao'] . "'>" . $acao['sg_acao'] . '"</option>"

  </select>';
 
  echo '<input type="text" class="form-control quantidade" name="quantidade" placeholder="quantidade"> <br> <br>';
}
echo'</div>';

include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?>
