<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css"> <!--link o arquivo css-->
  <img class="fundo" src="imagens/fumaca-azul.png" width=100% height="60"> <!-- fundo fumaça-->
  <a href="index.php"><img id="polvo" src="imagens/polvo2.png" width="40%" height="120"></a> <!-- polvo octos mascote-->
 
  <div class="submenu2" id="cad" style="border:solid black; width: 100px; height: 100px;">
  <a href="../cad1.php" style="display: block; width: 100%; height: 100%;">
    <img src="imagens/do-utilizador.png" width="80" height="50">
    <span>Entrar</span>
  </a>
</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!--adiciona a biblioteca Jquery-->
  <script src="../js/sub1.js"></script>

  <!-- função para alternar o modo do site -->
  <script>
    window.onload = function () {
      var modoEscuro = localStorage.getItem("modoEscuro");
      if (modoEscuro === "true") {
        modoescuro();
      } else {
        modoclaro();
      }
    };
  </script>

 
</head>

<body>
<!-- botao para alterar o modo de exibição do site -->
  <div class="submenu1">
    <div> <button id="modoescuro" onclick="alternarModo()">Modo Escuro</button></div>
    <fieldset id="bemvindo">
      <h1> Bem vindo ao <span id="octos"> OCTOS </span> <br>
        Nossos braços alcançam seus objetivos!</h1>
    </fieldset>
  </div>
<!-- submenu de navegaççao entre as paginas do site -->
  <fieldset class="field2" id="field2">
    <table id="tab">
      <td class="td1" id="td1" onmouseenter="onMouseEnter('td1')" onmouseleave="onMouseLeave('td1')"><a
          href="../html/sub1.html">Calculadora Renda Fixa </a></td>
      <td class="td2" id="td1" onmouseenter="onMouseEnter('td2')" onmouseleave="onMouseLeave('td2')"><a
          href="../html/sub2.html">Parcelar</a></td>
      <td class="td3" id="td1" onmouseenter="onMouseEnter('td3')" onmouseleave="onMouseLeave('td3')"><a
          href="../html/sub3.html">Avista</a></td>
      <td class="td4" id="td1" onmouseenter="onMouseEnter('td4')" onmouseleave="onMouseLeave('td4')"><a
          href="../html/sub4.html">Projeto Tamar </a></td>
      <td class="td5" id="td1" onmouseenter="onMouseEnter('td5')" onmouseleave="onMouseLeave('td5')"><a
          href="../html/sub5.html">Fundos Imobiliarios </a><img class="cadeado" id="cadeado" src="imagens/cadeado.png"></td>
      <td class="td6" id="td1" onmouseenter="onMouseEnter('td6')" onmouseleave="onMouseLeave('td6')"><a
          href="../html/sub6.html">Area exclusiva </a><img class="cadeado" id="cadeado1" src="imagens/cadeado.png"></td>
    </table>
  </fieldset>



  <?php
    session_start();
    require_once "banco.php";
// bloco de codigo para pegar o nome do usuario
$email = $_SESSION['email'];

$sql = 'SELECT nm_usuario FROM tb_login WHERE ds_email = :reserva';

// Preparar a declaração usando um prepared statement
$stmt = $conn->prepare($sql);

// Vincular o valor da variável $email ao marcador de posição :reserva
$stmt->bindParam(':reserva', $email, PDO::PARAM_STR);

// Executar a consulta
$stmt->execute();

// Obter o resultado como uma array associativa
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['nome'] = '';
if ($result) {
  $_SESSION['nome'] = $result['nm_usuario'];
  echo "Olá " . $_SESSION['nome'] . '<a href="Sair.php" id="SAIR"> SAIR </a>

  <fieldset class="field2" id="field2">
    <table id="tab">
      <td class="td7" id="td1" onmouseenter="onMouseEnter(\'td7\')" onmouseleave="onMouseLeave(\'td7\')"><a
          href="../quest.php">Analise de Risco </a></td>
      <td class="td8" id="td1" onmouseenter="onMouseEnter(\'td8\')" onmouseleave="onMouseLeave(\'td8\')"><a
          href="../cursos.php">Cursos</a></td>
      <td class="td9" id="td1" onmouseenter="onMouseEnter(\'td9\')" onmouseleave="onMouseLeave(\'td9\')"><a
          href="../ckcompra.php">Recomendacao</a></td>
      <td class="td10" id="td1" onmouseenter="onMouseEnter(\'td10\')" onmouseleave="onMouseLeave(\'td10\')"><a
          href="../form_end.php">Perfil Completo </a></td>
    </table>
  </fieldset>';

} else {
echo ' <br>Por gentileza faça o login! <br>
<a href="login.php" id="SAIR"> Login </a>';
}
    
//bloco de codigo para descobrir o id_usuario;

$nome = $_SESSION['nome'];

$sql ='SELECT id_usuario from tb_login where nm_usuario =:reserva';
$stmt = $conn ->prepare($sql);
$stmt ->bindParam(':reserva',$nome,PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result){
    $_SESSION['id_usuario'] = $result['id_usuario'];
}
else{
    echo " ou<a href=\"cad1.php\" id=\"SAIR\"> Cadastre-se!</a>";
}
// fim do bloco;

//bloco de codigo para descobrir o ds_perfil do usuario;



$sql = 'SELECT ds_perfil FROM tb_recomendacao WHERE id_usuario = :id_usuario';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_usuario', $_SESSION['id_usuario']);
$stmt->execute();
$perfil = $stmt->fetch(PDO::FETCH_ASSOC);

if ($perfil) {
  $_SESSION['perfil'] = $perfil['ds_perfil']; // Corrigir 'perfil' para 'ds_perfil'
}

?>