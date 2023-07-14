<?php
require_once 'conexao.php';

function existe_usuario($username, $senha_usuario) {
    $conexao = cria_conexao();
    $sql = "SELECT count(*) as registros FROM usuarios WHERE username = :username AND password = :password";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':password', $senha_usuario);
    $statement->bindParam(':username', $username);
    $statement->execute();
    $user_info = $statement->fetch(PDO::FETCH_ASSOC);
    return $user_info['registros'];
}
?>