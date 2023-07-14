<?php

require_once 'conexao.php';

    function entradaV ($idveiculo) {
        date_default_timezone_set("America/Sao_Paulo");
        $data = date("Y-m-d H:i:s");
        $conexao = cria_conexao();
        $sql = "INSERT into entrada_saida (veiculo, hr_entrada) values (:idveiculo, :entrada)";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':idveiculo', $idveiculo);
        $statement->bindParam(':entrada', $data);
        $statement->execute();
    }

    function buscaidv ($idveiculo) {
        // print($idveiculo);
        $conexao = cria_conexao();
        // print("Aqui"); die();
        $sql = "SELECT id FROM entrada_saida WHERE veiculo = :idveiculo";
        
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':idveiculo', $idveiculo);
        $statement->execute();
        $id = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($id); die();
        return $id; 
    }

    function eeporidv ($id) {
        $conexao = cria_conexao();
        $sql = "SELECT * FROM entrada_saida WHERE veiculo = :idveiculo";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':idveiculo', $id);
        $statement->execute();
        $infodouser = $statement->fetch(PDO::FETCH_ASSOC);
        try {
            $e = count($infodouser) > 0;
        } catch(TypeError $te) {
            $e = false;
        }
        return $e; 
    }
   
    function attentrada($id) {
        date_default_timezone_set("America/Sao_Paulo");
        $conexao = cria_conexao(); 
        $data = date("Y-m-d H:i:s");
        $sql = "UPDATE entrada_saida SET hr_entrada = :hr_entrada WHERE id = :id";
        $statement= $conexao->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':hr_entrada', $data);
        $statement->execute();
    }

    function attsaida($id) {
        date_default_timezone_set("America/Sao_Paulo");
        $conexao = cria_conexao(); 
        $data = date("Y-m-d H:i:s");
        $conexao = cria_conexao();
        $sql = "UPDATE entrada_saida SET hr_saida = :hr_saida WHERE id = :id";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':hr_saida', $data); 
        $statement->execute();
    }

    function buscadateid($id) {
        // print_r($id); die();
        $conexao = cria_conexao(); 
        $sql = "SELECT * FROM entrada_saida WHERE id = :id";
        $statement = $conexao->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute(); 
        $infodouser = $statement->fetch(PDO::FETCH_ASSOC); 
        // var_dump($infodouser);die(); 
        // print_r($infodouser); die();
        return $infodouser;
        
    }
?>