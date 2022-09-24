
<?php

session_start();	

include("conecta.php");

$dia=mysqli_real_escape_string($conexao, $_POST["dia"]);
$mes=mysqli_real_escape_string($conexao, $_POST["mes"]);
$ano=mysqli_real_escape_string($conexao, $_POST["ano"]);
$hora=mysqli_real_escape_string($conexao, $_POST["hora"]);
$vagas=mysqli_real_escape_string($conexao, $_POST["vagas"]);

mysqli_query($conexao, "INSERT INTO oraculo (dia, mes, ano, hora, vagas) VALUES ($dia, $mes, $ano, '$hora', $vagas)");
header("location: ../admin/CadOraculo.php");

?>