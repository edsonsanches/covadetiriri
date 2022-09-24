
<?php

session_start();	

include("conecta.php");

$iddia=mysqli_real_escape_string($conexao, $_POST["iddia"]);
$idusuario=mysqli_real_escape_string($conexao, $_POST["idusuario"]);

mysqli_query($conexao, "INSERT INTO mediumdia (id_dia, id_usuario) VALUES ($iddia, $idusuario)");
header("location: ../portalCadastraAtivoPorGira.php");

?>