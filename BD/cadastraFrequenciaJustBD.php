
<?php

session_start();	

include("conecta.php");

$idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);
$idusuario=mysqli_real_escape_string($conexao, $_POST["idusuario"]);
$justificativa=mysqli_real_escape_string($conexao, $_POST["justificativa"]);

mysqli_query($conexao, "INSERT INTO frequencia (id_usuario, id_gira, justificativa) VALUES ('$idusuario', '$idgira', '$justificativa')");
header("location: ../portalCadastraFrequencia.php?idgiraget=".$idgira);

?>