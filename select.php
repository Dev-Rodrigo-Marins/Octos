<?php
function db_faixa_salarial_select(){
	global $conn; // busca fora do arquivo a variavel global com a conexao
	$sth=$conn->prepare("select id_salario,fl_faixa_salario from tb_faixa_salarial");
	$sth->execute();
	return $sth->fetchAll();
}
?>