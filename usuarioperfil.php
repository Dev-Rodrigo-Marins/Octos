<?php
require_once("./banco.php");
session_start();

global $conn;  // Acessa a conexão global com o banco de dados


// Verificar se o e-mail está presente na sessão
if (isset($_SESSION['email'])) {
 $email = $_SESSION['email'];

// Preparar a consulta SQL
$query = "SELECT id_usuario FROM tb_login WHERE ds_email = :email";

// Preparar a declaração SQL
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();

// Obter o ID do usuário
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$idUsuario = $row['id_usuario'];
}

// Preparar a query para inserção de dados no Banco
$queryInsercao = "
 INSERT INTO tb_usuarioperfil (id_usuario, id_questao, vl_resposta)
  VALUES 
        (:id_usuario, :id_questao, :vl_resposta)";

// Exemplo de valores para inserção
$valoresInsercao = array(
    array('id_questao' => 1, 'vl_resposta' => $_POST['resposta_1']),
    array('id_questao' => 2, 'vl_resposta' => $_POST['resposta_2']),
    array('id_questao' => 3, 'vl_resposta' => $_POST['resposta_3']),
    array('id_questao' => 4, 'vl_resposta' => $_POST['resposta_4']),
    array('id_questao' => 5, 'vl_resposta' => $_POST['resposta_5']),
    array('id_questao' => 6, 'vl_resposta' => $_POST['resposta_6']),
    array('id_questao' => 7, 'vl_resposta' => $_POST['resposta_7']),
    array('id_questao' => 8, 'vl_resposta' => $_POST['resposta_8']),
    array('id_questao' => 9, 'vl_resposta' => $_POST['resposta_9']),
    array('id_questao' => 10, 'vl_resposta' => $_POST['resposta_10']),
    );

// Preparar e executar as inserções
$stmtInsercao = $conn->prepare($queryInsercao);
        
foreach ($valoresInsercao as $valor) {
    $stmtInsercao->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
    $stmtInsercao->bindParam(':id_questao', $valor['id_questao'], PDO::PARAM_INT);
    $stmtInsercao->bindParam(':vl_resposta', $valor['vl_resposta'],PDO::PARAM_INT);
    $stmtInsercao->execute();
}


$sql = "UPDATE tb_login
SET ds_perfil = 
  CASE
    WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 10 THEN 'Baixo Risco'
    WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 20 AND (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) > 10 THEN 'Medio Risco'
    WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 30 AND (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) > 20 THEN 'Alto Risco'
    ELSE 'Perfil Não Definido!'
  END WHERE id_usuario = :id_usuario";

$stmt =$conn->prepare($sql);
$stmt ->bindParam(':id_usuario',$idUsuario);
$stmt ->execute();

$sql2 = "insert into tb_recomendacao (id_usuario,ds_perfil) values (:id_usuario,'nao calculado')";
$stmt = $conn->prepare($sql2);
$stmt->bindParam(':id_usuario', $idUsuario);
$stmt->execute();

$sql3 = "UPDATE tb_recomendacao AS c
         SET ds_perfil = (SELECT ds_perfil FROM tb_login WHERE id_usuario = :id_usuario)
         WHERE c.id_usuario = :id_usuario";

$stmt = $conn -> prepare($sql3);
$stmt ->bindParam(':id_usuario',$idUsuario);
$stmt ->execute();

header("Location: carteira_recomendacao.php");
?>

