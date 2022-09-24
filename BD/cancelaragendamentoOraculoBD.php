
<?php

session_start();	

include("conecta.php");

$sigla= "CDT";

    $selecionaEmail=mysqli_query($conexao, "select * from config where id_config=3");
    $campoEmail=mysqli_fetch_assoc($selecionaEmail);
$emailSession= $campoEmail['config'];

$site="https://covadetiriri.com.br";

$idagendamento=mysqli_real_escape_string($conexao, $_POST["idagendamentooraculo"]);



$igual=mysqli_query($conexao, "select id_oraculo, email, nome from agendamentooraculo where id_agendamentooraculo=$idagendamento");
$campoemail=mysqli_fetch_assoc($igual);
$emailbd=$campoemail['id_oraculo'];
$nomeagendado=$campoemail['nome'];
$emailagendado=$campoemail['email'];


$igual2=mysqli_query($conexao, "select dia, mes, ano, hora from oraculo where id_oraculo=$emailbd");
$campoemail2=mysqli_fetch_assoc($igual2);
$dia1=$campoemail2['dia'];
$mes1=$campoemail2['mes'];
$ano1=$campoemail2['ano'];
$hora1=$campoemail2['hora'];

    $logo="logo.png";




	//ENVIO EMAIL
	  //1 – Definimos Para quem vai ser enviado o email
	  $email_remetente=$emailSession;
$para = $emailagendado;
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $nomeagendado;
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto
$assunto = $sigla."-Agendamento Oraculo CANCELADO";
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<center><img src=".$site."/img/".$logo." width=300 height=300><br><br>Olá ".$nome.", sentimos muito que você não irá conseguir participar do oraculo <strong></strong> no dia: <strong>".$dia1."/".$mes1."/".$ano1." às ".$hora1." horas.</strong> <br><br> Este e-mail é para informar uma das seguintes situações: <br><br> - CANCELAMENTO do seu agendamento. <br> - RECUSA do seu agendamento por parte do oraculista. <br> - NÃO CONFIRMAÇÃO do seu pagamento. <br><br> Qualquer duvida, entre em contato pelo e-mail ".$emailSession."</center>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "Return-Path: ".$emailSession."\r\n";
$headers .= "From: ".$emailSession . "\r\n" .
"Reply-To: ".$emailSession . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$mensagem=utf8_decode($mensagem);

mail("$para", "$assunto", "$mensagem", $headers, "-f$email_remetente");  //função que faz o envio do email.
	//FIM ENVIO EMAIL

mysqli_query($conexao, "DELETE FROM agendamentooraculo WHERE id_agendamentooraculo=$idagendamento");

    header("location: ../admin/visualizarAgendamentoOraculo.php?idgira=$emailbd");
exit;



?>