
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$identidade=mysqli_real_escape_string($conexao, $_POST["identidade"]);
$vagas=mysqli_real_escape_string($conexao, $_POST["vagas"]);

mysqli_query($conexao, "UPDATE `entidade` SET `vagas`= $vagas WHERE `id_entidade`=$identidade");

header("location: ../admin/CadEntidade.php");


?>