
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["idusuario"]);
$ativo=mysqli_real_escape_string($conexao, $_POST["ativo"]);

if($ativo==1){
mysqli_query($conexao, "UPDATE usuario SET ativo=0 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}else{
mysqli_query($conexao, "UPDATE usuario SET ativo=1 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}

?>