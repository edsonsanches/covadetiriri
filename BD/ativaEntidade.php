
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$identidade=mysqli_real_escape_string($conexao, $_POST["identidade"]);
$ativo=mysqli_real_escape_string($conexao, $_POST["ativo"]);

if($ativo==1){
mysqli_query($conexao, "UPDATE entidade SET ativo=0 WHERE id_entidade=$identidade");

header("location: ../admin/CadEntidade.php");
}else{
mysqli_query($conexao, "UPDATE entidade SET ativo=1 WHERE id_entidade=$identidade");

header("location: ../admin/CadEntidade.php");
}

?>