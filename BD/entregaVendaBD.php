
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["idmp"]);


mysqli_query($conexao, "UPDATE mp SET entregue=1 WHERE id_mp='$id'");

header("location: ../portalEditarVenda.php");



?>