<?php

    require_once 'conexao.php';

    function existe_placa($placa) {
        $conexao = cria_conexao();
        $sql = "SELECT count(*) as registros FROM veiculos WHERE placa = :placa";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':placa', $placa);
        $statement->execute();
        $user_info = $statement->fetch(PDO::FETCH_ASSOC);
        return $user_info['registros'];
    }

    function inserindo_veiculo($placa, $fabricante, $modelo, $cor) {
        $conexao = cria_conexao();
        $sql = "INSERT into veiculos (placa, fabricante, modelo, cor) values (:placa, :fabricante, :modelo, :cor)";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':placa', $placa);
        $statement->bindParam(':fabricante', $fabricante);
        $statement->bindParam(':cor', $cor);
        $statement->bindParam(':modelo', $modelo);
        $statement->execute();
    }

    function placaid($placa) {
        $conexao = cria_conexao();
        $sql = "SELECT id FROM veiculos WHERE placa = :placa";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':placa', $placa);
        $statement->execute();
        $user_info = $statement->fetch(PDO::FETCH_ASSOC);
        return $user_info;
    }

    function existeaplaca($placa) {
        $conexao = cria_conexao();
        $sql = "SELECT * FROM veiculos WHERE placa = :placa";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':placa', $placa);
        $statement->execute();
        $user_info = $statement->fetch(PDO::FETCH_ASSOC);
        try {
            $existe = count($user_info) > 0;
        } catch(TypeError $te) {
            $existe = false;
        }
        return $existe;
    }

    function ocupationb() {
        $conexao = cria_conexao();
        $sql = "SELECT * FROM entrada_saida INNER JOIN 
        veiculos ON veiculos.id = entrada_saida.veiculo AND CAST( now() AS Date ) = CAST(entrada_saida.hr_entrada AS Date) ORDER BY entrada_saida.hr_entrada";
        $statement = $conexao->prepare($sql);
        $statement->execute();
        $user_info = array();
        while ($item = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($user_info, $item);
        }
        return $user_info;
    }
?> 

