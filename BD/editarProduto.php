
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["id"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);
$descricao=mysqli_real_escape_string($conexao, $_POST["descricao"]);
$valor=mysqli_real_escape_string($conexao, $_POST["preco"]);
$estoque=mysqli_real_escape_string($conexao, $_POST["estoque"]);



mysqli_query($conexao, "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$valor', estoque=$estoque WHERE id=$id");

header("location: ../portalCadastroProduto.php");


?>