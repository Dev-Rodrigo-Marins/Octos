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

// fazer a validação do id_usuario se ja tiver ele na tabela tb_pessoa... o comando 

$sql2 = 'select id_usuario from tb_pessoa where id_usuario = ?';
$stmt2 = $conn -> prepare($sql2);
$stmt2-> bindValue(1, $id_usuario);
$stmt -> execute();
$usuario_end= $stmt->fetch(PDO::FETCH_ASSOC);



if ($usuario_end >0 || $usuario_end ='') {

$sql = 'UPDATE tb_pessoa set id_usuario = :id_usuario, ds_endereco = :ds_endereco, nu_telefone = :nu_telefone, ds_bairro = :ds_bairro,
 id_cidade = :id_cidade, nu_cep = :nu_cep, id_estado =:id_estado where id_usuario = :id_usuario';

}

else{

$sql = 'INSERT INTO tb_pessoa (id_usuario, ds_endereco, nu_telefone, ds_bairro, id_cidade, nu_cep, id_estado)
 VALUES (:id_usuario, :ds_endereco, :nu_telefone, :ds_bairro, :id_cidade, :nu_cep, :id_estado)';
}

$stmt=$conn->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':ds_endereco', $endereco);
$stmt->bindParam(':ds_bairro', $bairro);
$stmt->bindParam(':nu_cep', $cep);
$stmt->bindParam(':id_cidade', $id_cidade);
$stmt->bindParam(':nu_telefone', $telefone);
$stmt->bindParam(':id_estado', $id_estado);
$stmt->execute();






// sql a ser realizado deve ser um update, com isso permitindo que um usuario tenha
// apenas um endereco

//}



//inserir_endereco($cep, $bairro,$endereco,$numero,$cidade,$estado,$telefone);


header("location: carteira_recomendacao.php");


?>
