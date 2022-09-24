
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$usuario=mysqli_real_escape_string($conexao, $_POST["usuario"]);
$usuario=strtolower($usuario);
$senha=mysqli_real_escape_string($conexao, $_POST["inputPassword"]);
$email=mysqli_real_escape_string($conexao, $_POST["inputEmail"]);

$duplicidade=mysqli_query($conexao, "select usuario from usuario where usuario='$usuario'");
$campousuario=mysqli_fetch_array($duplicidade);

$duplicidade2=mysqli_query($conexao, "select email from usuario where email='$email'");
$campoemail=mysqli_fetch_array($duplicidade2);

if($usuario==$campousuario["usuario"]){
	$_SESSION['usuarioduplicado']="Usuario já esta cadastrado";
	header("location: ../registrar.php");
	exit;
}

if($email==$campoemail["email"]){
	$_SESSION['emailduplicado']="Email já esta cadastrado";
	header("location: ../registrar.php");
	exit;
}

mysqli_query($conexao, "INSERT INTO usuario (usuario, senha, email, nivel, ativo, isento) VALUES ('$usuario', '$senha', '$email', 1, 0, 0)");
$_SESSION['AvisoHome']="Usuario cadastrado com sucesso!";
header("location: ../index.php");

?>