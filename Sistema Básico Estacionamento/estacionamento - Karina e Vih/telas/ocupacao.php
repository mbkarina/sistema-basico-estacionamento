<!DOCTYPE html> 
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupação</title>
    <link rel="stylesheet" href="../css/ocupacao.css">
    
</head>
<body>
    <?php
        require_once '../acoes/sessao.php';
        require_once '../acoes/dindin.php';
        require_once '../dao/veiculosDao.php';
        // verifica_sessao();
    ?> 

    <div class="topo">
        <a href="../acoes/sessaooff.php"> Sair </a> 
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <th>
                    Placa
                </th>
                <th>
                    Modelo
                </th>
                <th>
                    Cor
                </th>
                <th>
                    Entrada
                </th>
                <th>
                    Saída
                </th>
                <th>
                    Valor Final
                </th>
            </thead>
            <tbody>
                <?php 
                    $veiculos = ocupationb(); 
                    // var_dump($veiculos);die();
                    function filtra_a_data($var) {
                        return (explode(" ", $var['hr_entrada'])[0] == date('Y-m-d'));
                    }
                    array_filter($veiculos, 'filtra_a_data');
                    foreach ($veiculos as $value) :
                ?>
            <tr>
                <td>
                    <?= strval($value['placa']); ?>
                </td>
                <td>
                    <?= strval($value['modelo']); ?>
                </td>
                <td>
                    <?= strval($value['cor']); ?>
                </td>
                <td>
                    <?= (new DateTime($value['hr_entrada']))->format("H:i:s"); ?>
                </td>
                <td>
                    <?= (new DateTime($value['hr_entrada']) > new DateTime($value['hr_saida']) || $value['hr_saida'] == NULL)? " - ": (new DateTime($value['hr_saida']))->format("H:i:s"); ?> 
                </td>
                <td>
                    <?= (new DateTime($value['hr_entrada']) > new DateTime($value['hr_saida']) || $value['hr_saida'] == NULL)? " - ":calculo((new DateTime($value['hr_saida']))->diff((new DateTime($value['hr_entrada'])))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
</body>
</html> 

