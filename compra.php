<?php

require_once("./banco.php");
include_once "./inclusoes/cabecalho.php";

echo '<br><br>';
echo "ELEMENTOS DA SESSAO <br><br> ";


foreach ($_SESSION as $chave => $valor) {
    echo "$chave: $valor<br>";
}

echo
'<div class="titulo">
<h4>Recomendação de investimentos de '.$_SESSION['perfil'].' para
<br> '.$_SESSION['nome'].'
  <br><br> Conforme o seu perfil de risco segue recomendações de ativos ao qual voce deve ter em sua carteira de investimentos
</h4>
</div>

<table class="tabela3">
<tr>
<td colspan="4" style="text-align: center;"><strong>Carteira Recomendada OCTOS '.$_SESSION['perfil'].'<br><br> 

</tr>
<tr>
<td><strong>Posição</strong></td>
<td><strong>Ticker</strong></td>
<td><strong>Ações</strong></td>
<td><strong>Rentabilidade 2022</strong></td>
</tr>

<tr>
<td>1</td>
<td> SG_ACAO </td>
<td> NM_ACAO </td>
<td class="rent">32%</td>
</tr>
'

// espaço reservado para colocar as varivaveis referente aos ativos a serem investidos;

.'
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

</table>';





include_once "inclusoes/rodape.php";

?>