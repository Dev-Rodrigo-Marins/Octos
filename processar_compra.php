<?php
//var_dump($_POST);

// Recupere os dados dos formulários e organize-os em um array associativo
$compras = array();
for ($i = 1; isset($_POST['comprar' . $i]); $i++) {
    $compras[] = array(
        'comprar' => $_POST['comprar' . $i],
        'quantidade' => $_POST['quantidade' . $i],
        'total' => $_POST['total' . $i]
    );
}

// Agora, você pode criar uma tabela para exibir as compras de forma organizada
echo '<table border="1">
        <tr>
            <th>Compra</th>
            <th>Quantidade</th>
            <th>Total</th>
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