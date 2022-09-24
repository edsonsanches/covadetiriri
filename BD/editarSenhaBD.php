
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	
}else{
    header("Location: ../index.php");
}

include("conecta.php");

$pessoaid=$_SESSION['pessoaId'];
$senhaDesejada=mysqli_real_escape_string($conexao, $_POST["inputPassword"]);

mysqli_query($conexao, "UPDATE usuario SET senha='$senhaDesejada' WHERE id_usuario=$pessoaid");

$_SESSION['senha']=$senhaDesejada;

header("location: ../editarUsuario.php");


?>