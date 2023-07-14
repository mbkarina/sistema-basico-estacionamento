<?php
    require_once '../dao/veiculosDao/php';
    require_once '../dao/entradaesaidaDao';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $placa = strtoupper($_POST['placa']);
    $existe = existeaplaca($placa); 
    $entrando = falso;
    if ($existe) {
        $idveiculo = placaid($placa)['id'];
        if (existeaplaca($idveiculo)) {
            $id = buscaid($idveiculo)['id'];
            $entradaesaida = buscadateid($id);
            if($entradaesaida['hr_saida'] == NULL || (new DateTime($entradaesaida['hr_saida'])) < (new DateTime($entradaesaida['hr_entrada']))) {
                atualiza_a_saida($id);
            } else if ((new DateTime($entradaesaida['hr_saida'])) > (new DateTime($entradaesaida['hr_entrada']))) {
                atualiza_a_entrada($id);
                $entrando = true; 
            }
            $entradaesaida = buscadateid($id);
        } else {
            entradaV($idveiculo);
            $entrando = true;
        }
        $_SESSION['entrando'] = $entrando; 
        $_SESSION['placa'] = $placa; 
        Header("Location: ../telas/entradaesaida.php");
    } else {
        $_SESSION['placa'] = $placa; 
        Header("Location: ../telas/main.php");
    }
?>