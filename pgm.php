<?php

('Content-Type: application/json; charset=utf-8');  

$json = file_get_contents('php://input');
$obj = json_decode($json);

$idpagarme=$obj->data->id;
$status=$obj->type;

include("BD/conecta.php");

mysqli_query($conexao, "UPDATE pagarme SET status='$status' WHERE id_pagarme='$idpagarme'");
    

?>