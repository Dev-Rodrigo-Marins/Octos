<?php

session_start();// inicia a sessao, como se inicia-se a memoria do computador

require_once "banco.php";

if($_SERVER["REQUEST_METHOD"]=='POST'){ // se o metodo de envio for post... as variaveis recebem os valores enviados!
$usuario = $_POST["email"];
$senha = $_POST["senha"];

// iniciar a preparação do sql para conectar ao banco

$query = 'SELECT * FROM tb_login where ds_email = :usuario';
$stmt = $conn->prepare($query);
$stmt->bindParam(':usuario',$usuario);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    if (md5($senha) === $row['ds_senha']) {
        $_SESSION['email'] = $row['ds_email'];
        header("Location: carteira_recomendacao.php");
        exit();
    } else {
        echo "Senha ou usuario invalidos. <a href='login.php'>Tente novamente</a>";
    }
} else {
    echo "Usuário ou senha invalidos. <a href='login.php'>Tente novamente</a>";
}

}


?>