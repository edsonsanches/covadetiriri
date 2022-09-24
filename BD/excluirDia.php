
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$iddia=mysqli_real_escape_string($conexao, $_POST["iddia"]);

mysqli_query($conexao, "DELETE FROM dia WHERE id_dia=$iddia");

header("location: ../gira.php");


?>