
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);
$idusuario=mysqli_real_escape_string($conexao, $_POST["idusuario"]);

mysqli_query($conexao, "DELETE FROM frequencia WHERE id_gira=$idgira and id_usuario=$idusuario");

header("location: ../portalCadastraFrequencia.php?idgiraget=".$idgira);


?>