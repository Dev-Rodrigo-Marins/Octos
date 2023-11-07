<?php
function db_faixa_salarial_select(){
	global $conn; // busca fora do arquivo a variavel global com a conexao
	$sth=$conn->prepare("select id_salario,fl_faixa_salario from tb_faixa_salarial");
	$sth->execute();
	return $sth->fetchAll();
}

function selecao_curso($categoriaId) {
    global $conn;
    $sth = $conn->prepare("SELECT nm_curso, id_curso FROM tb_curso WHERE id_categoria = :categoria");
    $sth->bindParam(':categoria', $categoriaId, PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function categoria(){
	global $conn;
	$sth=$conn->prepare("select nm_categoria,id_categoria from tb_cursocategoria");
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}



?> 