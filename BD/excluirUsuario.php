
      <?php

session_start();	



include("conecta.php");

$idusuario=mysqli_real_escape_string($conexao, $_POST["idusuario"]);

mysqli_query($conexao, "DELETE FROM usuario WHERE id_usuario=$idusuario");

header("location: ../portalEditarAtivosIsentos.php");


?>