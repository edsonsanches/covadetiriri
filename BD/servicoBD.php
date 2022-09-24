
<?php

session_start();	

include("conecta.php");

$descricao=mysqli_real_escape_string($conexao, $_POST["descricao"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);

mysqli_query($conexao, "INSERT INTO servico (descricao, valor) VALUES ('$descricao', $valor)");
header("location: ../admin/CadServico.php");

?>