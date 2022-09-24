
      <?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$idconfig=mysqli_real_escape_string($conexao, $_POST["idconfig"]);
$config=mysqli_real_escape_string($conexao, $_POST["config"]);

mysqli_query($conexao, "UPDATE `config` SET `config`= '$config' WHERE `id_config`=$idconfig");

header("location: ../admin/editConfig.php");


?>