
<?php

session_start();	

include("conecta.php");

$descricao=mysqli_real_escape_string($conexao, $_POST["descricao"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
$email=mysqli_real_escape_string($conexao, $_POST["email"]);
$telefone=mysqli_real_escape_string($conexao, $_POST["telefone"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);


mysqli_query($conexao, "INSERT INTO orcamento (descricao, valor, nome, telefone, email) VALUES ('$descricao', '$valor', '$nome', '$telefone','$email')");
header("location: ../admin/CadOrcamento.php");

?>