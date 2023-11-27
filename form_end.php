<?php
include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
//session_start();
?>

<?php
if($_SESSION['email']){
echo"
<fieldset class=\"janela_modal1\" id=\"janela_modal\" >
  <span class=\"modal1\">
<form action=\"inserir_endereco.php\" method=\"POST\">
  <div class=\"form-row\">

  <div class=\"form-group col-md-2\">
      <label for=\"inputCEP\">CEP(somente numeros) :</label><br>
      <input type=\"text\" class=\"form-control\" name=\"cep\" id=\"inputCEP\" ><br><br>
    </div>
  </div>

  <div class=\"form-group col-md-2\">
      <label for=\"inputBairro\">Bairro</label><br>
      <input type=\"text\" class=\"form-control\" name=\"bairro\" id=\"inputBairro\"><br><br>
    </div>
  </div>

  </div>
  <div class=\"form-group\">
    <label for=\"inputAddress\">Endereço</label><br>
    <input type=\"text\" class=\"form-control\" name=\"endereco\" id=\"inputAddress\" placeholder=\"Rua dos Bobos\"><br><br>
  </div>

  <div class=\"form-group\">
    <label for=\"inputNumber\">Numero</label><br>
    <input type=\"text\" class=\"form-control\" name=\"numero\" id=\"inputNumber\" placeholder=\"nº 0\" required><br><br>
  </div>
  
  <div class=\"form-row\">
    <div class=\"form-group col-md-6\">
      <label for=\"inputCity\">Cidade</label><br>
      <input type=\"text\" class=\"form-control\" name=\"cidade\" id=\"inputCity\"readonly=\"readonly\" > <br><br>
    </div>

    <div class=\"form-group col-md-2\">
      <label for=\"inputEstado\">ESTADO</label><br>
      <input type=\"text\" class=\"form-control\" name=\"estado\" id=\"inputEstado\" readonly=\"readonly\"> <br><br>
    </div>
  </div>

  <div class=\"form-group col-md-2\">
      <label for=\"inputTEL\">TELEFONE (apenas numeros)</label><br>
      <input type=\"number\" class=\"form-control\" name=\"telefone\" id=\"inputTEL\" required placeholder=\"(xx)xxxxx-xxxx\" > <br><br>
    </div>
  </div>

  </div>
  </div>
  <button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
</form>

</span>

</fieldset>

<script type=\"text/javascript\" src=\"./js/cep.js\"></script>
";}
?>

<?php
include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?> 