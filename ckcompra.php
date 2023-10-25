<?php

require_once("./banco.php");
include_once "./inclusoes/cabecalho.php";

?>

<script src="validaform.js"></script>

<div class="titulo">
    <h4>Recomendação de investimentos para <?php echo $_SESSION['nome']; ?></h4>
</div>

<div class="container">
<button onclick="add_recomendacao()">Usar Recomendações  </button>
<button onclick="rem_recomendacao()">Remover Recomendações  </button>

</div>

<div class='tabela3'>
<form action="processar_compra.php" method="get">
    <div class="lista-recomendacoes">
        <h3>Recomendações de Compra:</h3>
        <?php
            // Execute a Consulta 1 para obter as recomendações de compra e armazene em $recomendacoes (um array)
            // Corrija a consulta SQL usando marcadores de posição '?'
            $sql = "SELECT sg_acao, nm_acao,vl_acao,tb_acao.ds_perfil FROM tb_acao, tb_compra WHERE tb_acao.ds_perfil = ? AND tb_compra.id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->bindParam(2, $_SESSION['id_usuario']);
            $stmt->execute();

            $recomendacao =$stmt->fetch(PDO::FETCH_ASSOC);

            $a=25;    
            $b=3;


              while ($recomendacao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<label>
                          <input type="checkbox" name="comprar" id="rec" value="' . $recomendacao['sg_acao'] . '"checked >
                          ' . $recomendacao['sg_acao'] .'R$'.$recomendacao['vl_acao'].'
                      </label>
                      <input type="number" name="quantidade" value="'.($a + (3*$b)).'" placeholder="Digite a quantidade" >
                      <input type="number" name="total" value="'.($a + (3*$b))*$recomendacao['vl_acao'].'">
                      <br>';
                      $b--;
              }
             ?>
    
</div>

    <div class="lista-ativos">
        <h3>Ativos para Compra Geral:</h3>
        <?php
            $sql = "SELECT sg_acao,vl_acao FROM tb_acao where ds_perfil !=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->execute();
            $ativos = $stmt->fetch(PDO::FETCH_ASSOC);

            $a=0;    
            $b=0;

            while ($ativos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<label>
                        <input type="checkbox" name="comprar[]" value="' . $ativos['sg_acao'] . '">
                        ' . $ativos['sg_acao'] .'R$'.$ativos['vl_acao'].'
                    </label>
                    <input type="number" name="quantidade" placeholder="Ativos fora do seu perfil de risco!" >
                    <input type="number" name="total" value="'.($a + (3*$b))*$ativos['vl_acao'].'">
                      <br>';
            }
        ?>
    </div>
     <br><br>
    <input style="text-align: center;" type="submit" value="Confirmar Compras">
</form>
</div>
<?php
include_once 'inclusoes/rodape.php';
?>