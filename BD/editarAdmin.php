
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["idusuario"]);
$nivel=mysqli_real_escape_string($conexao, $_POST["nivel"]);


if($nivel==1){
mysqli_query($conexao, "UPDATE usuario SET nivel=2 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}else{
mysqli_query($conexao, "UPDATE usuario SET nivel=1 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}

?>