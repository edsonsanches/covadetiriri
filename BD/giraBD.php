
<?php

session_start();	

include("conecta.php");

$parte1=mysqli_real_escape_string($conexao, $_POST["1parte"]);
$parte2=mysqli_real_escape_string($conexao, $_POST["2parte"]);
$responsavel=mysqli_real_escape_string($conexao, $_POST["responsavel"]);
$dia=mysqli_real_escape_string($conexao, $_POST["dia"]);
$mes=mysqli_real_escape_string($conexao, $_POST["mes"]);
$ano=mysqli_real_escape_string($conexao, $_POST["ano"]);
$hora=mysqli_real_escape_string($conexao, $_POST["hora"]);
$vagas=mysqli_real_escape_string($conexao, $_POST["vagas"]);

mysqli_query($conexao, "INSERT INTO gira (dia, mes, ano, hora, responsavel, 1parte, 2parte, vagas) VALUES ($dia, $mes, $ano, '$hora', '$responsavel', '$parte1', '$parte2', $vagas)");
header("location: ../admin/CadToque.php");

?>