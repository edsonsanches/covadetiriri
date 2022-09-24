
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");
if(isset($_POST["idgira"])){
    $idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);

mysqli_query($conexao, "DELETE FROM gira WHERE id_gira=$idgira");

header("location: ../admin/CadToque.php");
}if(isset($_POST["idoraculo"])){
    $idoraculo=mysqli_real_escape_string($conexao, $_POST["idoraculo"]);

mysqli_query($conexao, "DELETE FROM oraculo WHERE id_oraculo=$idoraculo");

header("location: ../admin/CadOraculo.php");
}if(isset($_POST["idorcamento"])){
    $idorcamento=mysqli_real_escape_string($conexao, $_POST["idorcamento"]);

mysqli_query($conexao, "DELETE FROM orcamento WHERE id_orcamento=$idorcamento");

header("location: ../admin/CadOrcamento.php");
}




?>