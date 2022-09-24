
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
$descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
$nome = mysqli_real_escape_string($conexao, $_POST["nome"]);

mysqli_query($conexao, "INSERT INTO produtos (nome, descricao, preco, destaque, categoria, ativo) VALUES ('$nome', '$descricao', '$valor', 1, 1, 1)");

header("location: ../portalCadastroProduto.php");

?>