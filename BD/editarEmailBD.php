
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	
}else{
    header("Location: ../index.php");
}

include("conecta.php");

$pessoaid=$_SESSION['pessoaId'];
$emailDesejado=mysqli_real_escape_string($conexao, $_POST["inputEmail"]);

mysqli_query($conexao, "UPDATE usuario SET email='$emailDesejado' WHERE id_usuario=$pessoaid");

$_SESSION['usuarioEmail']=$emailDesejado;

header("location: ../editarUsuario.php");


?>