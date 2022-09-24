
<?php

session_start();	

include("conecta.php");

$tipo=mysqli_real_escape_string($conexao, $_POST["tipo"]);
$titulo=mysqli_real_escape_string($conexao, $_POST["titulo"]);
$texto=mysqli_real_escape_string($conexao, $_POST["texto"]);


mysqli_query($conexao, "INSERT INTO texto (titulo, texto, tipo) VALUES ('$titulo', '$texto', '$tipo')");


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