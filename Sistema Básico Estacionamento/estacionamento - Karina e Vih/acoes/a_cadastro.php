<?php
require_once '../dao/usuarioDao.php';

// $usuarios_count = existe_usuario($_POST["login"], $_POST["senha"]);

// ECHO $usuarios_count; DIE();

if ($usuarios_count == 1) {
    header("Location: ../telas/registro.php");
} else {
    header("Location: ../telas/cadastro.php");
}

?>