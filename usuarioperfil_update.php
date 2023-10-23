<?php
require_once("./banco.php");
session_start();

global $conn;  // Acessa a conexão global com o banco de dados

// Verificar se o e-mail está presente na sessão
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Preparar a consulta SQL
    $sql = "SELECT id_usuario FROM tb_usuariocadastro WHERE ds_email = :email";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Obter o ID do usuário
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUsuario = $row['id_usuario'];
}

// Exemplo de valores para inserção
$valores_insercao = array(
    array('id_questao' => 1, 'resposta' => $_POST['resposta_1']),
    array('id_questao' => 2, 'resposta' => $_POST['resposta_2']),
    array('id_questao' => 3, 'resposta' => $_POST['resposta_3']),
    array('id_questao' => 4, 'resposta' => $_POST['resposta_4']),
    array('id_questao' => 5, 'resposta' => $_POST['resposta_5']),
    array('id_questao' => 6, 'resposta' => $_POST['resposta_6']),
    array('id_questao' => 7, 'resposta' => $_POST['resposta_7']),
    array('id_questao' => 8, 'resposta' => $_POST['resposta_8']),
    array('id_questao' => 9, 'resposta' => $_POST['resposta_9']),
    array('id_questao' => 10, 'resposta' => $_POST['resposta_10']),
);

// Preparar e executar as atualizações
foreach ($valores_insercao as $valor) {
    $sql_inserir = "UPDATE tb_usuarioperfil SET vl_resposta = :resposta WHERE id_usuario = :id_usuario AND id_questao = :id_questao";

    $stmtInsercao = $conn->prepare($sql_inserir);
    $stmtInsercao->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
    $stmtInsercao->bindParam(':id_questao', $valor['id_questao'], PDO::PARAM_INT);
    $stmtInsercao->bindParam(':resposta', $valor['resposta'], PDO::PARAM_INT);
    $stmtInsercao->execute();
}

// Atualizar o perfil do usuário
$sql_atualizar_perfil = "UPDATE tb_usuariocadastro
    SET ds_perfil = 
    CASE
        WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 10 THEN 'Baixo Risco'
        WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 20 AND (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) > 10 THEN 'Medio Risco'
        WHEN (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) <= 30 AND (SELECT SUM(vl_resposta) FROM tb_usuarioperfil WHERE id_usuario = :id_usuario) > 20 THEN 'Alto Risco'
        ELSE 'Perfil Não Definido!'
    END WHERE id_usuario = :id_usuario";

$stmt_atualizar_perfil = $conn->prepare($sql_atualizar_perfil);
$stmt_atualizar_perfil->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
$stmt_atualizar_perfil->execute();

// Atualizar a tabela tb_compra
$sql_atualizar_compra = "UPDATE tb_compra SET ds_perfil = (SELECT ds_perfil FROM tb_usuariocadastro WHERE tb_usuariocadastro.id_usuario = tb_compra.id_usuario) WHERE tb_compra.id_usuario = :id_usuario";

$stmt_atualizar_compra = $conn->prepare($sql_atualizar_compra);
$stmt_atualizar_compra->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
$stmt_atualizar_compra->execute();

header("Location: carteira_recomendacao.php");
//echo "ID do Usuário: " . $idUsuario;
?>

