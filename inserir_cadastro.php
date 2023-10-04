<?php
// Função para inserir dados na tabela de cadastro
// Função para inserir dados na tabela de cadastro
function db_insert_cadastro($email, $senha, $nome,$faixa_salarial) {
    global $conn;  // Acessa a conexão global com o banco de dados

	// Declara as variáveis
	$email = $_REQUEST['email'];
	$senha = $_REQUEST['senha'];
	$nome = $_REQUEST['nome'];
	$faixa_salarial = $_REQUEST['faixa_salarial'];
	
    // Prepara a consulta SQL com placeholders
    $sql = "INSERT INTO tb_usuariocadastro (ds_email, ds_senha, nm_usuario, id_salario)
            VALUES (:email, :senha, :nome,:faixa_salarial)";
    ;
    // Prepara a consulta SQL usando os placeholders
    $stmt = $conn->prepare($sql);

    // Liga os parâmetros (placeholders) aos valores
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':faixa_salarial', $faixa_salarial);

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

// Chama a função para inserir os dados
db_insert_cadastro($email, $senha, $nome, $faixa_salarial);
?>

