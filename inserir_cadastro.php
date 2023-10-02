<?php
// Função para inserir dados na tabela de cadastro
function db_insert_cadastro($email, $senha, $endereco,$faixa_salarial) {
    global $conn;  // Acessa a conexão global com o banco de dados

    // Prepara a consulta SQL com placeholders
    $sql = "INSERT INTO tb_usuariocadastro (ds_email, vl_senha, ds_endereco, vl_faixasalarial)
            VALUES (:email, :senha, :endereco,:faixasalarial)";
    
    // Prepara a consulta SQL usando os placeholders
    $stmt = $conn->prepare($sql);

    // Liga os parâmetros (placeholders) aos valores
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':faixasalarial',$faixa_salarial);

    // Executa a consulta SQL
    if ($stmt->execute()) {
        // Após a inserção, redireciona para a página index.php após 3 segundos
        header("refresh:3;url=index.php");
        echo "Dados inseridos com sucesso. Redirecionando para a página inicial em 3 segundos...";
        exit();  // Certifique-se de encerrar o script após o redirecionamento
    } 
    else {
        header("refresh:3;url=index.php");
        echo"Dados nao inseridos...Redirecionando para a página inicial em 3 segundos....";
    }
}

require_once("./banco.php");

// Obtém os dados do formulário , usando o atributo name como referencia... 
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];
$endereco = $_REQUEST['endereco'];
$faixa_salarial = $_REQUEST['faixa_salarial'];

// Chama a função para inserir os dados
db_insert_cadastro($email, $senha, $endereco,$faixa_salarial);
?>

