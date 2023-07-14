<?php
    require_once '../dao/veiculosDao.php';
    require_once '../dao/entradaesaidaDao.php'; 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $placa = strtoupper($_POST['placa']); 
    $e = existe_placa($placa);
    $entrando = false; 
    if ($e) {
        $idveiculo = placaid($placa)['id'];
        if(eeporidv($idveiculo)) {
            $id = buscaidv($idveiculo)['id']; 
            $entrada_e_saida = buscadateid($id);
            print_r($entrada_e_saida);
            if($entrada_e_saida['hr_saida'] == NULL || (new DateTime($entrada_e_saida['hr_saida'])) < (new DateTime($entrada_e_saida['hr_entrada']))) {
                attsaida($id);
                $entrando = false;
            } else if((new DateTime($entrada_e_saida['hr_saida'])) > (new DateTime($entrada_e_saida['hr_entrada']))) {
                attentrada($id);
                $entrando = true;
            }
            $entrada_e_saida = buscadateid($id);
        } else {
            entradaV($idveiculo);
            $entrando = true; 
        }
        $_SESSION['entrando'] = $entrando; 
        $_SESSION['placa'] = $placa; 
        Header("Location: ../telas/entradaesaida.php");
    } else {
        $_SESSION['placa'] = $placa;
        header("Location: ../telas/cadastro.php");
    }
?>