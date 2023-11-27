<?php
include_once './inclusoes/cabecalho.php';
require_once 'banco.php';
if($_SESSION['email']){
function ativo_usuario(){
    global $conn; // busca fora do arquivo a variavel global com a conexao
    $sth = $conn->prepare("SELECT * FROM tb_historico_compra WHERE id_usuario = :id_usuario");
    $sth->bindParam(':id_usuario', $_SESSION['id_usuario'], PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll();
}

$resultado = ativo_usuario();

// Exibir os resultados em uma tabela HTML
echo '<table class=\'tabela3\' border="1">
<tr>
    <th>id_usuario</th>
    <th>Sigla do Ativo</th>
    <th>Valor Total</th>
    <th>Data do ativo</th>
    <th>Quantidade</th>
    <th>Numero Contrato</th>
    <th>Status</th>
</tr>';foreach ($resultado as $linha) {
    echo '<tr>
            <td>' . $linha['id_usuario'] . '</td>
            <td>' . $linha['sg_ativo'] . '</td>
            <td>' . $linha['nu_valortotal'] . '</td>
            <td>' . $linha['dt_compra'] . '</td>
            <td>' . $linha['nu_quantidade'] . '</td>
            <td>' . $linha['nu_contrato'] . '</td>
            <td>';

    // Verificar se 'id_ativo' está definido antes de usá-lo
    if (isset($linha['nu_contrato'])) {
        echo '<a href="venda.php?id=' . $linha['nu_contrato'] . '">Vender</a>';
    } else {
        echo ''; // ou qualquer outro valor padrão
    }

    echo '</td></tr>';
}
echo '</table>';
include_once './inclusoes/rodape.php';
}
else{
    header("refresh:1;url=index.php");
}
?>