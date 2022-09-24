
<?php

session_start();	

include("conecta.php");

$dia=mysqli_real_escape_string($conexao, $_POST["diadia"]);
$tipo=mysqli_real_escape_string($conexao, $_POST["tipo"]);

mysqli_query($conexao, "INSERT INTO dia (dia, tipo_gira) VALUES ('$dia', '$tipo')");
header("location: ../index.php");

?>