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

 <!--
 <script>
  function validaform(){
  alert("teste");
  window.location.href = "autenticar_login.php";
  return true;
  }
  document.getElementById("Entrar").addEventListener("click", validaform);
</script> 

 <script>
  function redirecionarParaLogin() {
    window.location.href = "login.php";
  }
</script>
-->


<form action="autenticar_login.php  " method="post" name="meu_form">


<fieldset class="janela_modal1" id="janela_modal" >
  <span class="modal1">

  <button class="login" id="login"><a href="login.php">Login / Entrar</a></button>
  
  <br><br>

  <legend>Area de Acesso!</legend>
  <br><br>
    <label for="email">E-mail / Usuario</label><br>
    <input type="email" name="email" id="email"><br><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha" id="senha"> <br><br>
    <a href="novasenha.php">Esqueceu a senha ? Clique</a>
</select>
</div>
<br><br>

<button class="login" id="enviarlog" name="Entrar" type="submit">Entrar</button>
<br><br>

 
  <br><br>
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