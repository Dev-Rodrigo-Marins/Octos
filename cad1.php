<?php

include_once 'inclusoes/cabecalho.php'; // chama o arquivo do cabeçalho padrao
?>

<!-- apresentação da ideia da pagina -->

  <div class="titulo">
    <h4>Area de cadastro Octos!
      <br><br> Por gentileza preencha o formulario abaixo para ter acesso a area premium do nosso site!!!
    </h4>
  </div>
 <!--inicio dos formularios... -->

 <script>
  function redirecionarParaLogin() {
    window.location.href = "login.php";
  }
</script>

<?php

require_once("banco.php");
require_once("select.php");

$salario = db_faixa_salarial_select();

?>

<form action="inserir_cadastro.php" method="post">


<fieldset class="janela_modal1" id="janela_modal" >
  <span class="modal1">

  <button id="login"><a href="login.php">Login / Entrar</a></button>
  
  <br><br>
 
  <br><br>
    <label for="email">E-mail / Usuario</label><br>
    <input type="email" name="email" id="email"><br><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha" id="senha"> <br><br>

    <label for="csenha">Confirmação Senha</label><br>
    <input type="password" name="csenha" id="csenha"> <br><br>

    <label for="nome">Nome</label><br>
    <input type="text" name="nome" id="nome"> <br><br>

    <select name="faixa_salarial" id="faixa_salarial">
      <?php foreach ($salario as $row): ?>
        <option value="<?= $row['id_salario'] ?>"><?= $row['fl_faixa_salario'] ?></option>
      <?php endforeach; ?>
    </select>
    
    <br><br>
    <button type="submit">Enviar</button>
    </div>
  </span>

</fieldset>
</form>
</div>
</div>

</body>

<br><br>

<!-- rodape -->
<?php

include_once 'inclusoes/rodape.php'; // chama o arquivo do cabeçalho padrao
?> 