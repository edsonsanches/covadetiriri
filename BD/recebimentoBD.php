
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

include("conecta.php");

$dia=mysqli_real_escape_string($conexao, $_POST["dia"]);
$mes=mysqli_real_escape_string($conexao, $_POST["mes"]);
$ano=mysqli_real_escape_string($conexao, $_POST["ano"]);
$usuarioCadastrar=$_SESSION['pessoaId'];
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
$descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
$mensalidade = mysqli_real_escape_string($conexao, $_POST["mensalidade"]);

echo $descricao;

mysqli_query($conexao, "INSERT INTO recebimento (id_usuario, dia, mes, ano, valor, descricao, mensalidade) VALUES ($usuarioCadastrar, $dia, $mes, $ano, $valor, '$descricao', $mensalidade)");

header("location: ../portalCadastroRecebimento.php");

?>