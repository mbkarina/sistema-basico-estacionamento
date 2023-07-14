<!DOCTYPE html> 
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupação</title>
    <link rel="stylesheet" href="../css/t_cadastro.css">
</head>
<body>
    <div class="topo">
        <a href="../acoes/sessaooff.php"> Sair </a> 
    </div>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    ?>
    <div class="container">
        <form action="../acoes/cadastra_veiculo.php" method="post">
            <h1>Cadastro</h1> 
            Placa <input type = "text" name ="placa"  placeholder= "AAA-1234 ou AAA1A23" autocomplete="off" required="required" value="<?=$_SESSION['placa'];?>" readonly><br>
            Fabricante <input type = "text" name = "fabricante" autocomplete="off" required="required"><br>
            Modelo <input type = "text" name = "modelo" autocomplete="off" required="required" ><br>
            Cor <input type = "text" name = "cor" autocomplete="off" required="required"><br>
            <input type = "submit" value = "Cadastrar" > 
        </form> 
        <p> Estacionamento Morango - desenvolvido por Karina e Vithória </p> 
    </div>
</body>

</html>
