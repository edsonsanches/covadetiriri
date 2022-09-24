
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idservico=mysqli_real_escape_string($conexao, $_POST["id"]);

mysqli_query($conexao, "DELETE FROM servico WHERE id=$idservico");

header("location: ../admin/CadServico.php");


?>