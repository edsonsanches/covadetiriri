
<?php

session_start();	

if(isset($_SESSION['usuario'])){
	
}else{
    header("Location: ../index.php");
}

$sigla= "CDT";
$site="https://covadetiriri.com.br";
    $logo="logo.png";

include("conecta.php");

$id=mysqli_real_escape_string($conexao, $_POST["idagendamentooraculo"]);
$emailagendado=mysqli_real_escape_string($conexao, $_POST["email"]);
$nomeagendado=mysqli_real_escape_string($conexao, $_POST["nome"]);
$valorGira=mysqli_real_escape_string($conexao, $_POST["valor"]);
    
    $selecionaEndereco=mysqli_query($conexao, "select * from config where id_config=2");
    $campoEndereco=mysqli_fetch_assoc($selecionaEndereco);
    $enderecoSession=$campoEndereco['config'];
    
    $selecionaEmail=mysqli_query($conexao, "select * from config where id_config=3");
    $campoEmail=mysqli_fetch_assoc($selecionaEmail);
    $emailSession=$campoEmail['config'];
    
$precoPix=mysqli_query($conexao, "select * from config where id_config=9");
$campoPix=mysqli_fetch_assoc($precoPix);
$pixbd=$campoPix['config'];

$whats=mysqli_query($conexao, "select * from config where id_config=11");
$campowhats=mysqli_fetch_assoc($whats);
$whatsbd=$campowhats['config'];

$precoSem=mysqli_query($conexao, "select * from config where id_config=13");
$campoSem=mysqli_fetch_assoc($precoSem);
$sembd=$campoSem['config'];

$precoCom=mysqli_query($conexao, "select * from config where id_config=12");
$campoCom=mysqli_fetch_assoc($precoCom);
$combd=$campoCom['config'];

$igual=mysqli_query($conexao, "select * from agendamentooraculo where id_agendamentooraculo=$id");
$campoemail=mysqli_fetch_assoc($igual);
$emailbd=$campoemail['id_oraculo'];

if($valorGira=='sem'){
    $valorFinal=$sembd;
    $valorGira="ORACULO - SEM direito a LINHAGEM (perguntas sobre seus Exus)";
}else{
    $valorFinal=$combd;
    $valorGira="ORACULO - COM direito a LINHAGEM (perguntas sobre seus Exus)";
}

$igual2=mysqli_query($conexao, "select dia, mes, ano, hora from oraculo where id_oraculo=$emailbd");
$campoemail2=mysqli_fetch_assoc($igual2);
$dia1=$campoemail2['dia'];
$mes1=$campoemail2['mes'];
$ano1=$campoemail2['ano'];
$hora1=$campoemail2['hora'];

mysqli_query($conexao, "UPDATE agendamentooraculo SET confirmou=1 WHERE id_agendamentooraculo=$id");

// SDK do Mercado Pago
require("../lib/vendor/autoload.php");

// Adicione as credenciais
MercadoPago\SDK::setAccessToken('APP_USR-440037163017176-111322-87eb2db3a07461fc948b9da6da960111-205718711');

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();
// Cria um item na preferência
$item = new MercadoPago\Item();
$payment = new MercadoPago\Payment();
$item->title = 'Cova de Tiriri - Oraculo - '.$nomeagendado;
$item->quantity = 1;
$item->unit_price = $valorFinal;
$payment->transaction_amount = $valorFinal;
$preference->notification_url = 'https://covadetiriri.com.br/mp.php?idAgendamento='.$id;

$preference->payment_methods = array(
  "excluded_payment_methods" => array(
    array("id" => "bolbradesco")
  ),
  "excluded_payment_types" => array(
    array("id" => "ticket")
  )
);

$preference->items = array($item);
$preference->back_urls = array(
    "success" => "https://covadetiriri.com.br",
    "failure" => "https://covadetiriri.com.br",
    "pending" => "https://covadetiriri.com.br"
);
$preference->auto_return = "approved";

    $response = array(
        'status' => $payment->status,
        'status_detail' => $payment->status_detail,
        'id' => $payment->id
    );
    echo json_encode($response);
$preference->save();
$payment->save();
$url = $preference->init_point;


$idMP='ND';

mysqli_query($conexao, "INSERT INTO mp_oraculo (id_mp, status, id_agendamentooraculo, url) VALUES ('ND', 'CREATED', $id, '$url')");

	//ENVIO EMAIL
	  //1 – Definimos Para quem vai ser enviado o email
	  $email_remetente=$emailSession;
$para = $emailagendado;
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $nomeagendado;
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto


    $assunto = $sigla." - Agendamento de ORACULO aceito";
 //mensagem que vai ser enviado no e-mail
$mensagem = "<center><img src=".$site."/img/".$logo." width=300 height=300><br><br>Você <strong>".$nome."</strong> está prestes a garantir a vaga no oraculo (Cabala de Exu) dia: <strong>".$dia1."/".$mes1."/".$ano1." às ".$hora1." horas.<br><br>Faça o pagamento no valor de: R$ ".$valorFinal." - ".$valorGira."<br><br> Pagamento: ".$url."</strong> <br><br>OBS 1: Caso não seja pago em até 48h apos o recebimento deste e-mail, seu link será automaticamente cancelado perdendo assim sua vaga no agendamento<br>OBS 2: Nenhum dos dados inseridos na etapa de pagamento fica em posse do site Cova de Tiriri<br><br> Caso haja desistência avisar respondendo este e-mail, ou envie um e-mail para ".$emailSession." <br><br></center>";



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "Return-Path: ".$emailSession."\r\n";
$headers .= "From: ".$emailSession . "\r\n" .
"Reply-To: ".$emailSession . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$mensagem=utf8_decode($mensagem);

mail("$para", "$assunto", "$mensagem", $headers, "-f$email_remetente");  //função que faz o envio do email.
	//FIM ENVIO EMAIL


	header("location: ../admin/visualizarAgendamentoOraculo.php?idoraculo=".$emailbd);
	exit;


?>