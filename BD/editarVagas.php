
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$vagas=mysqli_real_escape_string($conexao, $_POST["vagas"]);

if(isset($_POST["idgira"])){
    $idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);
    mysqli_query($conexao, "UPDATE `gira` SET `vagas`= $vagas WHERE `id_gira`=$idgira");
    header("location: ../admin/CadToque.php");
}else{
    $idoraculo=mysqli_real_escape_string($conexao, $_POST["idoraculo"]);
    mysqli_query($conexao, "UPDATE `oraculo` SET `vagas`= $vagas WHERE `id_oraculo`=$idoraculo");
    header("location: ../admin/CadOraculo.php");
}




?>