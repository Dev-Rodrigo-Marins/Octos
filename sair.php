<?php
session_start();

// Destruir a sessão
session_destroy();

// Redirecionar para a página de cursos
header("location: cursos.php");
exit();
?>