
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$desejada=mysqli_real_escape_string($conexao, $_POST["inputPassword"]);
$codigo=mysqli_real_escape_string($conexao, $_POST["codigo"]);

$igual=mysqli_query($conexao, "select codigo, id_usuario from codigo where codigo=$codigo and ativo=1");
if($igual!=null){
$campocodigo=mysqli_fetch_assoc($igual);
$idusuario=$campocodigo["id_usuario"];

if($campocodigo["codigo"]==$codigo){
mysqli_query($conexao, "UPDATE usuario SET senha='$desejada' WHERE id_usuario=$idusuario");
$_SESSION['AvisoLogin']="Senha alterada com sucesso!";

mysqli_query($conexao, "UPDATE codigo SET ativo=0 WHERE id_usuario=$idusuario");
header("location: ../login.php");
}}else{
$_SESSION['codigoErro'] = "Codigo antigo ou incorreto";
header("location: ../redefinirsenha.php");
}

?>