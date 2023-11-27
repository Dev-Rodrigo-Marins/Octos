<?php
session_start();
require_once 'banco.php';
// Recupere os dados dos formulários e organize-os em um array associativo
$compras = array();
foreach ($_POST['comprar'] as $key => $comprar) {
    $compras[] = array(
        'comprar' => $comprar,
        'quantidade' => $_POST['quantidade'][$key],
        'total' => $_POST['total'][$key]
    );
}

// Agora, você pode criar uma tabela para exibir as compras de forma organizada
echo '<table border="1">
        <tr>
            <th>sg_ativo</th>
            <th>quantidade</th>
            <th>valor total</th>
        </tr>';

foreach ($compras as $compra) {
    echo '<tr>
            <td>' . $compra['comprar'] . '</td>
            <td>' . $compra['quantidade'] . '</td>
            <td>' . $compra['total'] . '</td>
        </tr>';
}

echo '</table>';

$id_usuario = $_SESSION['id_usuario'];
$hoje = date('d/m/Y');

// Defina a variável $sql_inserir ou apenas use $sql diretamente, dependendo da sua implementação
$sql_inserir = "INSERT INTO tb_historico_compra VALUES (:id_usuario, :sg_ativo, :valor_total, :date,:nu_quantidade)";

foreach ($compras as $compra) {
    $stmtInsercao = $conn->prepare($sql_inserir);

    if ($stmtInsercao === false) {
        // Trate o erro de preparação
        die('Erro na preparação da consulta.');
    }

    $stmtInsercao->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmtInsercao->bindParam(':sg_ativo', $compra['comprar'], PDO::PARAM_INT);
    $stmtInsercao->bindParam(':valor_total', $compra['total'], PDO::PARAM_INT);
    $stmtInsercao->bindParam(':date', $hoje);
    $stmtInsercao->bindParam(':nu_quantidade', $compra['quantidade'], PDO::PARAM_INT);
    $stmtInsercao->execute();
    
}
header("refresh:3;url=carteira_recomendacao.php");
?>