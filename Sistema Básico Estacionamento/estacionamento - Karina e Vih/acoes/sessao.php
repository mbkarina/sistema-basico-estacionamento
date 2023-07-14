<?php

function verifica_sessao() {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION['conectado'] !== true) {
        Header("Location: ../telas/entradaesaida.php");
    }
}

function sessao_off() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['conectado'] = false;
    session_destroy();
    header("Location: ../telas/main.php");
}

?>