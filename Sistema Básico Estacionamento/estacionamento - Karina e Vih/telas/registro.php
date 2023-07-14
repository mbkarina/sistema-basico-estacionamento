<!DOCTYPE html> 
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupação</title>
    <link rel="stylesheet" href="../css/t_registro.css">
</head>
<body>
    <div class="topo">
        <a href="../acoes/sessaooff.php"> Sair </a> 
    </div>
    <div class="container"> 
    <form action= "../acoes/ha_cadastro.php" method= "POST"> 
        <br>
        <h1>Registre a placa</h1> 
        <input type="text" name="placa" id="placa" pattern="[a-zA-z]{3}-[0-9]{4}|[a-zA-z]{3}[0-9]{1}[a-zA-z]{1}[0-9]{2}" required="required" placeholder= "AAA-1234 ou AAA1A23">
        <br>
        <input type = "submit" value = "Registrar"> 
    </form> 
    <p> Estacionamento Morango - desenvolvido por Karina e Vithória </p> 
</div>
</body> 
</html> 