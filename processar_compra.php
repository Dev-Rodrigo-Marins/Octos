<?php
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
?>