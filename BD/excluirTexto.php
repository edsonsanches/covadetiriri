
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idtexto=mysqli_real_escape_string($conexao, $_POST["idtexto"]);
$tipo=mysqli_real_escape_string($conexao, $_POST["tipo"]);

mysqli_query($conexao, "DELETE FROM texto WHERE id_texto=$idtexto");

if($tipo=='1'){
header("location: ../admin/CadTextoToque.php");
}
if($tipo=='2'){
header("location: ../admin/CadTextoOraculo.php");
}
if($tipo=='3'){
header("location: ../admin/CadTextoTrabalhos.php");
}


?>