<?php

require_once("./banco.php");
include_once "./inclusoes/cabecalho.php";




// Execute a Consulta 2 para obter a lista de ativos para compra geral e armazene em $ativos (um array)
// Suponha que você já tenha as duas consultas prontas e tenha obtido os resultados.




?>

<div class="titulo">
    <h4>Recomendação de investimentos para <?php echo $_SESSION['nome']; ?></h4>
</div>

<div class='tabela3'>
<form action="processar_compra.php" method="post">
   
    <div class="lista-recomendacoes">
        <h3>Recomendações de Compra:</h3>
        <?php
            // Execute a Consulta 1 para obter as recomendações de compra e armazene em $recomendacoes (um array)
            // Corrija a consulta SQL usando marcadores de posição '?'
            $sql = "SELECT sg_acao, nm_acao,tb_acao.ds_perfil FROM tb_acao, tb_compra WHERE tb_acao.ds_perfil = ? AND tb_compra.id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->bindParam(2, $_SESSION['id_usuario']);
            $stmt->execute();

            $recomendacao =$stmt->fetch(PDO::FETCH_ASSOC);





              while ($recomendacao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<label>
                          <input type="checkbox" name="comprar[]" value="' . $recomendacao['sg_acao'] . '">
                          ' . $recomendacao['sg_acao'] . '
                      </label><br>';
              }
             ?>
    
</div>

    <div class="lista-ativos">
        <h3>Ativos para Compra Geral:</h3>
        <?php
            $sql = "SELECT sg_acao FROM tb_acao where ds_perfil !=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->execute();
            $ativos = $stmt->fetch(PDO::FETCH_ASSOC);

            while ($ativos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<label>
                        <input type="checkbox" name="comprar[]" value="' . $ativos['sg_acao'] . '">
                        ' . $ativos['sg_acao'] . '
                    </label><br>';
            }
        ?>
    </div>
     
    <input type="submit" value="Confirmar Compras">
</form>
</div>
<?php
include_once 'inclusoes/rodape.php';
?>