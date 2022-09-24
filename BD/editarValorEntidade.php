
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$identidade=mysqli_real_escape_string($conexao, $_POST["identidade"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);

mysqli_query($conexao, "UPDATE `entidade` SET `valor`= $valor WHERE `id_entidade`=$identidade");

header("location: ../admin/CadEntidade.php");


?>