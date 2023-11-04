<?php

include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
session_start();
?>

<!-- apresentação da ideia da pagina -->

  <div class="titulo">
    <h4>Recomendação de investimentos!
      <br><br> Conforme o seu perfil de risco segue recomendações de ativos ao qual voce deve ter em sua carteira de investimentos
    </h4>
  </div>

  <table class="tabela3">
  <tr>
    <td colspan="4" style="text-align: center;"><strong>Carteira Recomendada OCTOS 
      <?php 
    echo $_SESSION['email'];

      ?></strong></td>
  </tr>
  <tr>
    <td><strong>Posição</strong></td>
    <td><strong>Ticker</strong></td>
    <td><strong>Fundo Imobiliário</strong></td>
    <td><strong>Rentabilidade 2022</strong></td>
  </tr>
  <tr>
    <td>1</td>
    <td>HGBS11</td>
    <td>CSHG Brasil Shopping</td>
    <td class="rent">32%</td>
  </tr>
  <tr>
    <td>2</td>
    <td>HGRE11</td>
    <td>CSHG Real Estate</td>
    <td class="rent">30%</td>
  </tr>
  <tr>
    <td>3</td>
    <td>HFOF11</td>
    <td>Hedge Brasil Shopping</td>
    <td class="rent">28%</td>
  </tr>
  <tr>
    <td>4</td>
    <td>KNRI11</td>
    <td>Kinea Renda Imobiliária</td>
    <td class="rent">26%</td>
  </tr>
  <tr>
    <td>5</td>
    <td>MXRF11</td>
    <td>Maxi Renda</td>
    <td class="rent">24%</td>
  </tr>
  <tr>
    <td>6</td>
    <td>RNGO11</td>
    <td>Rio Negro</td>
    <td class="rent">22%</td>
  </tr>
  <tr>
    <td>7</td>
    <td>VRTA11</td>
    <td>Vinci Renda</td>
    <td class="rent">20%</td>
  </tr>
  <tr>
    <td>8</td>
    <td>RBRF11</td>
    <td>RBR Alpha Multiestratégia Real</td>
    <td class="rent">18%</td>
  </tr>
  <tr>
    <td>9</td>
    <td>KNIP11</td>
    <td>Kinea Índice de Preços</td>
    <td class="rent">16%</td>
  </tr>
  <tr>
    <td>10</td>
    <td>HCTR11</td>
    <td>Hospital da Criança</td>
    <td class="rent">14%</td>
  </tr>
</table>








 

<!-- rodape -->
<?php

include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?> 