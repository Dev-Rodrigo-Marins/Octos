<?php

$bd_host = "200.19.1.18"; // ip de acesso ao banco
$sgbd = "pgsql"; // variavel que nao devemos mudar... escolhe o pdo para a conexão.
$base_de_dados = "rodrigosilva";  // colocar o nome do banco de dados que eu quero acessar
$bd_usuario = "rodrigosilva";
$bd_senha = "123456";

switch ($sgbd) {
    case "mysql":
		try {
			$dsn_mysql = "mysql:host=".$bd_host.";dbname=".$base_de_dados;
			$conn = new PDO($dsn_mysql, $bd_usuario, $bd_senha);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			die('ERROR: ' . $e->getMessage());
		}
        break;
    case "pgsql":
		try {
			$dsn_pgsql = "pgsql:host=$bd_host;port=5432;dbname=$base_de_dados;";
			// make a database connection
			$conn = new PDO(
				$dsn_pgsql,
				$bd_usuario,
				$bd_senha,
				[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
        break;
    case "sqlite":

		$conn = new PDO('sqlite:./sql/catalogo_de_games.sqlite3');
		// Set errormode to exceptions
		$conn->setAttribute(PDO::ATTR_ERRMODE, 
									PDO::ERRMODE_EXCEPTION);
							
        break;
}

?>
