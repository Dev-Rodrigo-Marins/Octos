<?php
include_once 'inclusoes/cabecalho.php'; // inclui o arquivo do cabeçalho padrão
require_once("select.php");
$categoria = categoria();
?>

<!-- apresentação da ideia da página -->

<div class="titulo">
    <h4>Área de cadastro Octos!
        <br><br> Você pode fazer um de nossos cursos para adquirir o conhecimento necessário para a sua independência!!!
    </h4>
</div>
<div>

<form id="meuForm1" action="cursos.php" method="post">
    <select name="categoria" id="categoria" onchange="this.form.submit()">
        
        <?php foreach ($categoria as $row): ?>
            <option value="<?= $row['id_categoria'] ?>"><?= $row['nm_categoria'] ?></option>
        <?php endforeach; ?>
    </select>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoriaId = $_POST['categoria'];
    echo "Categoria Selecionada: " . $categoriaId;

    // Agora que temos a categoria selecionada, vamos buscar os cursos correspondentes
    $cursos = selecao_curso($categoriaId);
}
?>

<br>
<form id="meuForm2" action="cursos.php" method="post">
    <select name="curso" id="curso">
        <option value="0">Selecione um Curso</option>
        <?php if (isset($cursos)) : // Certifique-se de que os cursos existam ?>
            <?php foreach ($cursos as $row): ?>
                <option value="<?= $row['id_curso'] ?>"><?= $row['nm_curso'] ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($cursos)) {
    $cursoSelecionado = $_POST['curso'];
    echo "Curso Selecionado: " . $cursoSelecionado;
}
?>

</div>
</body>
<br><br>
<!-- rodapé -->
<?php

include_once 'inclusoes/rodape.php'; // inclui o arquivo do cabeçalho padrão
?> 