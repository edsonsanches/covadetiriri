
<?php
session_start();

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

$sigla= "CDJ";
$emailSession= "contato@chaodejorge.com.br";


include_once("conecta.php");

$email = mysqli_real_escape_string($conexao, $_POST['inputEmail']);

$duplicidade2=mysqli_query($conexao, "select id_usuario, email, usuario from usuario where email='$email'");
$campoemail=mysqli_fetch_array($duplicidade2);
$idusuario=$campoemail["id_usuario"];
$usuario=$campoemail["usuario"];

if($email==$campoemail["email"]){
	
	$codigoAtivo=mysqli_query($conexao, "select ativo from codigo where id_usuario=$idusuario and ativo=1");
	$campoativo=mysqli_fetch_array($codigoAtivo);

	if($campoativo["ativo"]==1){
		mysqli_query($conexao, "UPDATE codigo SET ativo=0 WHERE id_usuario=$idusuario");
	}
	$numerorand = rand(100001, 999999);
	mysqli_query($conexao, "INSERT INTO codigo (id_usuario, codigo, ativo) VALUES ($idusuario, $numerorand, 1)");
	
	//ENVIO EMAIL
	  //1 – Definimos Para quem vai ser enviado o email
	  $email_remetente=$emailSession;
$para = $email;
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $usuario;
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto
$assunto = $sigla." - Redefinir senha";
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<strong>Usuario:  </strong>".$nome;
$mensagem .= "<br>  <strong>Codigo: </strong>"
.$numerorand;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "Return-Path: ".$emailSession."\r\n";
$headers .= "From: ".$emailSession . "\r\n" .
"Reply-To: ".$emailSession . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$mensagem=utf8_decode($mensagem);

mail("$para", "$assunto", "$mensagem", $headers, "-f$email_remetente");  //função que faz o envio do email.
	//FIM ENVIO EMAIL
	
	header("location: ../redefinirsenha.php");
	exit;
}else{
	$_SESSION['emailnaoexiste']="Email não está cadastrado";
	header("location: ../esquecisenha.php");
	exit;
}
?>