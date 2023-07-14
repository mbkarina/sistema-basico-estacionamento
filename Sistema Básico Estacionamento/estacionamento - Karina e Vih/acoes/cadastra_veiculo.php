<?php
    require_once '../dao/veiculosDao.php';
    require_once '../dao/entradaesaidaDao.php';
    require_once '../acoes/sessao.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // var_dump($_POST);die();

    $placa = $_POST['placa'];
    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo']; 
    $cor = $_POST['cor'];

    inserindo_veiculo($placa, $fabricante, $modelo, $cor);
    $id = placaid($placa)["id"]; 
    entradaV($id); 
    $_SESSION['entrando']= true; 

    Header("Location: ../telas/entradaesaida.php");
     
?>