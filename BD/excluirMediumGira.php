
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idmediumdia=mysqli_real_escape_string($conexao, $_POST["idmediumdia"]);
$iddia=mysqli_real_escape_string($conexao, $_POST["iddia"]);

mysqli_query($conexao, "DELETE FROM mediumdia WHERE id_mediumdia=$idmediumdia");

header("location: ../portalCadastraAtivoPorGira.php?iddiaget=".$iddia);


?>