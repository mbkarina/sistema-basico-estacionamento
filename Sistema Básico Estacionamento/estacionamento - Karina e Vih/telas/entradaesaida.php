<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/e&s.css">
</head>
<body>
    <div class="link">
        <a href="ocupacao.php">Ocupação do dia</a>
    </div>
    <div class="link">
        <a href="registro.php">Registrar saída</a>
    </div>
    <div class="topo">
        <a href="../acoes/sessaooff.php"> Sair </a> 
    </div>
    <?php
        require_once '../dao/entradaesaidaDao.php';
        require_once '../dao/veiculosDao.php';
        require_once '../acoes/dindin.php';
        require_once '../acoes/sessao.php'; 
        // require_once '../acoes/sessaooff.php';
        // verifica_sessao(); 

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //var_dump($_SESSION);die(); 
        if ($_SESSION['placa'] != "") {
            $att = $_SESSION['entrando']? "Entrada":"Saída";
            $placa = $_SESSION['placa'];
            
            $veiculo_id = placaid($placa)['id'];
            // print($placa);DIE();
            // print_r(placaid($placa));die();

            $veiculo = buscaidv($veiculo_id);
            // print_r($veiculo); die();
            
            $datando = buscadateid($veiculo['id']);
            // print("datando...");
            // print_r($datando); die();
            $s_entrada = explode(" ", $datando['hr_entrada']); 
            
            // if () {
            //     # code...
            // }
            // $s_saida = explode(" ", $datando['hr_saida']); 
            
            // print_r($s_entrada);
            // die();
            $hora_entrada = $s_entrada[1];
            // $hora_saida = $s_saida[1];
            
            //print($hora_entrada); 
            //print("--");
            // print($hora_saida);
            // die();
            date_default_timezone_set('America/Sao_Paulo');
            $hr_saida = date("Y-m-d H:i:s");
            // print_r($hr_saida); die();
            $s_saida = explode(" ", $hr_saida); 
            
            // print($s_saida); die();

            $hora_saida = $_SESSION['entrando']?"-":$s_saida[1];
           
            $t_decorrido = (new DateTime($datando['hr_saida']))->diff((new DateTime($datando['hr_entrada'])));
            $preco = $_SESSION['entrando']? "-":"R$ ".calculo($t_decorrido);
        } else {
            echo "Error"; 
        }
    ?>

    <div class="conteudo">
        <legend>
            <div class="item">Placa do veículo:<span><?=$placa;?></span>
            <div class="item">Hora da Entrada:<span><?=$hora_entrada;?></span>
            <div class="item">Hora da Saída:<span><?=$hora_saida;?></span>
            <div class="item">Preço do estacionamento:<span><?=$preco;?></span>
        </legend>
</body>