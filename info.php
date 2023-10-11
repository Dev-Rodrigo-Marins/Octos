<?php
include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>

<fieldset class="janela_modal1" id="janela_modal" >
  <span class="modal1">
<form>
  <div class="form-row">

  <div class="form-group col-md-2">
      <label for="inputCEP">CEP :</label><br>
      <input type="text" class="form-control" id="inputCEP"><br><br>
    </div>
  </div>

  </div>
  <div class="form-group">
    <label for="inputAddress">Endereço</label><br>
    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0"><br><br>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label><br>
      <input type="text" class="form-control" id="inputCity"> <br><br>
    </div>

    <div class="form-group col-md-2">
      <label for="inputEstado">CEP</label><br>
      <input type="text" class="form-control" id="inputEstado"> <br><br>
    </div>
  </div>

  </div>
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>

</span>

</fieldset>


























<?php
include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?>