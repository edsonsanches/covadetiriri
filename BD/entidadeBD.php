
<?php

session_start();	

include("conecta.php");

$entidade=mysqli_real_escape_string($conexao, $_POST["entidade"]);


mysqli_query($conexao, "INSERT INTO entidade (entidade) VALUES ('$entidade')");
header("location: ../admin/CadEntidade.php");

?>