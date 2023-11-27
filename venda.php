<?php
include_once 'banco.php';
if($_SESSION['email']){
if (isset($_GET['id'])) {
    $id_ativo = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($id_ativo === false || $id_ativo === null) {
        echo "ID do ativo inválido.";
    } else {
        // Resto do seu código para vender o ativo...
        try {
            $stmt = $conn->prepare("DELETE FROM tb_historico_compra WHERE nu_contrato = :id_ativo");
            $stmt->bindParam(':id_ativo', $id_ativo, PDO::PARAM_INT);
            $stmt->execute();
            echo "Ativo vendido com sucesso!";
        } catch (Exception $e) {
            echo "Erro ao vender o ativo: " . $e->getMessage();
        }
    }
} else {
    echo "ID do ativo não especificado.";
}
header("refresh:3;url=ativos.php");
}
else{
    header("refresh:1;url=index.php");
}

?>