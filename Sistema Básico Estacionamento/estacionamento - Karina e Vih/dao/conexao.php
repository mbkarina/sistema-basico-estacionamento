<?php
define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "estacionamento");

function cria_conexao()
{
    try {
        return new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWORD);
        print("Conectado");
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}
?>