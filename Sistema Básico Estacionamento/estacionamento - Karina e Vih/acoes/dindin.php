<?php 
$GLOBALS['preco'] = 5.5;

function calculo($tempo) {
    $min = $tempo->format("%i");
    $hora = $tempo->format("%H") * 60;
    $preco = ($GLOBALS['preco'] * intval($min + $hora)) / 60;
    return $preco; 
}

?>