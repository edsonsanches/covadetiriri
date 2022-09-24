
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["idusuario"]);
$isento=mysqli_real_escape_string($conexao, $_POST["isento"]);

echo $id;
echo $isento;

if($isento==1){
mysqli_query($conexao, "UPDATE usuario SET isento=0 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}else{
mysqli_query($conexao, "UPDATE usuario SET isento=1 WHERE id_usuario=$id");

header("location: ../portalEditarAtivosIsentos.php");
}

?>