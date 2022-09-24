
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$identidade=mysqli_real_escape_string($conexao, $_POST["identidade"]);

mysqli_query($conexao, "DELETE FROM entidade WHERE id_entidade=$identidade");

header("location: ../admin/CadEntidade.php");


?>