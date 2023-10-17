<?php

// criar a função para inserir dados na tabela tb_pessoa
session_start();
require_once('banco.php');
//function inserir_endereco($cep, $bairro,$endereco,$numero,$cidade,$estado,$telefone){
    global $conn; //Variavel de conexão com o banco de dados

    // Declarar as variaveis
    $cep= $_REQUEST['cep'];
    $bairro= $_REQUEST['bairro'];
    $endereco= $_REQUEST['endereco'];
    $numero= $_REQUEST['numero'];
    $telefone= $_REQUEST['telefone'];
    $cidade= $_REQUEST['cidade']; // variavel para busca do id na tb_cidade;
    $estado= $_REQUEST['estado']; // varivel para busca do id na tb_estado;

    // variaveis da sessao
    $id_usuario = $_SESSION['id_usuario'];


/* bloco de comandos utilizados para ver o que esta sendo enviado
print_r($_SESSION);
echo('<br><br>');
foreach ($_REQUEST as $valor) {
    
    echo $valor . '<br>';
}
*/

// preparando a consulta por id para a insercao nos campos id_cidade, id_estado

$sql = 'select id_cidade from tb_cidade where nm_cidade = :cidade ';
$sql1 = 'select id_estado from tb_estado where sg_estado =:estado';

$stmt=$conn->prepare($sql);
$stmt->bindParam(':cidade',$cidade);
$stmt->execute();

$id_cidade_result=$stmt->fetch(PDO::FETCH_ASSOC);
$id_cidade=$id_cidade_result['id_cidade'];


$sql1 = 'select id_estado from tb_estado where sg_estado =:estado';

$stmt=$conn->prepare($sql1);
$stmt->bindParam(':estado',$estado);
$stmt->execute();

$id_estado_resultado= $stmt->fetch(PDO::FETCH_ASSOC);
$id_estado = $id_estado_resultado['id_estado'];

/* bloco utilizado para verificar os id de estado e cidade
echo $id_cidade;
echo '<br>';
echo $id_estado;
*/

// preparando as consulta de insercao direta no sql

$sql='insert into tb_pessoa (id_usuario,ds_endereco,nu_telefone,ds_bairro,id_cidade,nu_cep,id_estado
values(:id_usuario,:ds_endereco,:nu_telefone,:ds_bairro,:id_cidade,:nu_cep,:id_esado)';






// fazer a validação do id_usuario se ja tiver ele na tabela tb_pessoa... o comando 
// sql a ser realizado deve ser um update, com isso permitindo que um usuario tenha
// apenas um endereco

//}



//inserir_endereco($cep, $bairro,$endereco,$numero,$cidade,$estado,$telefone);





?>
