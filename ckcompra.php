<?php

require_once("./banco.php");
include_once "./inclusoes/cabecalho.php";

?>

<script src="./js/validaform.js"></script>

<div class="titulo">
    <h4>Recomendação de investimentos para <?php echo $_SESSION['nome']; ?></h4>
</div>

<div class="container">
<button onclick="add_recomendacao()">Usar Recomendações  </button>
<button onclick="rem_recomendacao()">Remover Recomendações  </button>

</div>

<div class='tabela3'>
<form action="processar_compra.php" method="post">
    <div class="lista-recomendacoes">
        <h3>Recomendações de Compra:</h3>


    <?php
        // inicio do bloco de recomendação dos FII
        $sql = "SELECT sg_fii, nm_fii,vl_fii,tb_fii.ds_perfil FROM tb_fii, tb_recomendacao WHERE tb_fii.ds_perfil = ? AND tb_recomendacao.id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_SESSION['perfil']);
        $stmt->bindParam(2, $_SESSION['id_usuario']);
        $stmt->execute();
     $recomendacao =$stmt->fetchAll(PDO::FETCH_ASSOC);
     $a=25;    
        $b=3;
        $c=1;
     echo '<legend> Recomendação FII '.$_SESSION['perfil'].' <br>';
        foreach ($recomendacao as $item) {
            echo '<label>
                      <input type="checkbox" name="comprar[' . $c . ']" value="' . $item['sg_fii'] . '" checked>
                      ' . $item['sg_fii'] .' R$' . $item['vl_fii'] . '
                  </label>
                  <input type="number" name="quantidade[' . $c . ']" value="'.($a + (3*$b)).'" placeholder="Digite a quantidade" >
                  <input type="number" name="total[' . $c . ']" value="'.($a + (3*$b))*$item['vl_fii'].'">
                  <br>';
            $b--;
            $c++;
        }
        echo "</legend> <br>";
     //fim do bloco que exibe os FII recomendados

     // inicio do bloco de recomendação das acoes
        $sql = "SELECT sg_acao, nm_acao,vl_acao,tb_acao.ds_perfil FROM tb_acao, tb_recomendacao WHERE tb_acao.ds_perfil = ? AND tb_recomendacao.id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_SESSION['perfil']);
        $stmt->bindParam(2, $_SESSION['id_usuario']);
        $stmt->execute();
     $recomendacao =$stmt->fetchAll(PDO::FETCH_ASSOC);
     $a=25;    
        $b=3;
        
     echo '<legend> Recomendação Ações '.$_SESSION['perfil'].' <br>';
        foreach ($recomendacao as $item) {
            echo '<label>
                      <input type="checkbox" name="comprar[' . $c . ']" value="' . $item['sg_acao'] . '" checked>
                      ' . $item['sg_acao'] .' R$' . $item['vl_acao'] . '
                  </label>
                  <input type="number" name="quantidade[' . $c . ']" value="'.($a + (3*$b)).'" placeholder="Digite a quantidade" >
                  <input type="number" name="total[' . $c . ']" value="'.($a + (3*$b))*$item['vl_acao'].'">
                  <br>';
            $b--;
            $c++;
        }
        echo "</legend> <br>";
        // fim do bloco que exibe as ações recomendadas

        // inicio do bloco de recomendação das cripto
        $sql = "SELECT sg_cripto, nm_cripto,vl_cripto,tb_cripto.ds_perfil FROM tb_cripto, tb_recomendacao WHERE tb_cripto.ds_perfil = ? AND tb_recomendacao.id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_SESSION['perfil']);
        $stmt->bindParam(2, $_SESSION['id_usuario']);
        $stmt->execute();
         $recomendacao =$stmt->fetchAll(PDO::FETCH_ASSOC);
         $a=25;    
        $b=3;
        
         echo '<legend> Recomendação Cripto '.$_SESSION['perfil'].' <br>';
        foreach ($recomendacao as $item) {
            echo '<label>
                      <input type="checkbox" name="comprar[' . $c . ']" value="' . $item['sg_cripto'] . '" checked>
                      ' . $item['sg_cripto'] .' R$' . $item['vl_cripto'] . '
                  </label>
                  <input type="number" name="quantidade[' . $c . ']" value="'.($a + (3*$b)).'" placeholder="Digite a quantidade" >
                  <input type="number" name="total[' . $c . ']" value="'.($a + (3*$b))*$item['vl_cripto'].'">
                  <br>';
            $b--;
            $c++;
        }
        echo "</legend> <br>";
        // fim do bloco que exibe as cripto recomendadas
         ?>
    
</div>

    <div class="lista-ativos">
        <h3>Ativos para Compra Geral:</h3>
        <?php
            // inicio do bloco dos FII

            $sql = "SELECT sg_fii,vl_fii FROM tb_fii where ds_perfil !=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->execute();
            $ativos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $a=0;    
            $b=0;
            echo 'Outros FII  <br>';
            foreach ($ativos as $ativo) {
                echo '<label>
                        <input type="checkbox" name="comprar[' . $c . ']" value="' . $ativo['sg_fii'] . '">
                        ' . $ativo['sg_fii'] . ' R$' . $ativo['vl_fii'] . '
                    </label>
                    <input type="number" name="quantidade[' . $c . ']" placeholder="Ativos fora do seu perfil de risco!" >
                    <input type="number" name="total[' . $c . ']" value="" step="0.01">
                    <br>';
                $c++;
            }

            // fim do bloco dos FII

            // inicio do bloco das ações
            $sql = "SELECT sg_acao,vl_acao FROM tb_acao where ds_perfil !=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->execute();
            $ativos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $a=0;    
            $b=0;
            
            echo 'Outras Ações <br>';
            foreach ($ativos as $ativo) {
                echo '<label>
                        <input type="checkbox" name="comprar[' . $c . ']" value="' . $ativo['sg_acao'] . '">
                        ' . $ativo['sg_acao'] . ' R$' . $ativo['vl_acao'] . '
                    </label>
                    <input type="number" name="quantidade[' . $c . ']" placeholder="Ativos fora do seu perfil de risco!" >
                    <input type="number" name="total[' . $c . ']" value="" step="0.01">
                    <br>';
                $c++;
            }
            // fim do bloco das demais ações 

            // inicio do bloco das criptos
            $sql = "SELECT sg_cripto,vl_cripto FROM tb_cripto where ds_perfil !=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['perfil']);
            $stmt->execute();
            $ativos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $a=0;    
            $b=0;
            
            echo 'Outras Criptos <br>';
            foreach ($ativos as $ativo) {
                echo '<label>
                        <input type="checkbox" name="comprar[' . $c . ']" value="' . $ativo['sg_cripto'] . '">
                        ' . $ativo['sg_cripto'] . ' R$' . $ativo['vl_cripto'] . '
                    </label>
                    <input type="number" name="quantidade[' . $c . ']" placeholder="Ativos fora do seu perfil de risco!" >
                    <input type="number" name="total[' . $c . ']" value="" step="0.01">
                    <br>';
                $c++;
            }
            // fim do bloco das demais criptos 
             ?>
    </div>
     <br><br>
    <input style="text-align: center;" type="submit" value="Confirmar Compras">
</form>
</div>
<?php
include_once 'inclusoes/rodape.php';
?>