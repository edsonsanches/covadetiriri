<?php

session_start();	

if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}

$sigla= "CDT";
$site="https://covadetiriri.com.br";
    $logo="logo.png";

include("conecta.php");

    $selecionaEmail=mysqli_query($conexao, "select * from config where id_config=3");
    $campoEmail=mysqli_fetch_assoc($selecionaEmail);
    $emailSession=$campoEmail['config'];

$idorcamento=mysqli_real_escape_string($conexao, $_POST["idorcamento"]);

$select=mysqli_query($conexao, "select * from orcamento WHERE id_orcamento=$idorcamento");

$total = mysqli_num_rows($select); 

if($total===0){
$_SESSION['ErroAgendamento']="Orçamento não encontrado, por favor, contatar o dono do site";
	header("location: ../index.php");
	exit;
}else{
    $PerguntaPaga=mysqli_fetch_array($select);

$criado=$PerguntaPaga['criado'];
if($criado==0){
    mysqli_query($conexao, "UPDATE orcamento SET criado=1 WHERE id_orcamento=$idorcamento");
    
    $nomeagendado=$PerguntaPaga['nome'];
    $valorFinal=$PerguntaPaga['valor'];
    $descricao=$PerguntaPaga['descricao'];
    $emailagendado=$PerguntaPaga['email'];
    
// SDK do Mercado Pago
require("../lib/vendor/autoload.php");

// Adicione as credenciais
MercadoPago\SDK::setAccessToken('APP_USR-4757443602507802-100115-5ce1917ce9c6e885352c7b95b5754f01-6306260');

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();
// Cria um item na preferência
$item = new MercadoPago\Item();
$payment = new MercadoPago\Payment();
$item->title = 'Cova de Tiriri - Trabalho - '.$nomeagendado;
$item->quantity = 1;
$item->unit_price = $valorFinal;
$payment->transaction_amount = $valorFinal;
$preference->notification_url = 'https://covadetiriri.com.br/mpTrabalho.php?idOrcamento='.$idorcamento;

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

mysqli_query($conexao, "INSERT INTO mp_trabalho (id_mp, status, id_orcamento, url) VALUES ('ND', 'CREATED', $idorcamento, '$url')");

	//ENVIO EMAIL
	  //1 – Definimos Para quem vai ser enviado o email
	  $email_remetente=$emailSession;
$para = $emailagendado;
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $nomeagendado;
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto


    $assunto = $sigla." - Ordem de pagamento para Trabalho";
 //mensagem que vai ser enviado no e-mail
$mensagem = "<center><img src=".$site."/img/".$logo." width=300 height=300><br><br><strong>".$nome."</strong>, ordem de pagamento para o orçamento realizado criado com sucesso:<br><br>Valor: R$ ".$valorFinal." - ".$descricao."<br><br> Pagamento: ".$url."</strong> <br><br>OBS 1: Caso não seja pago em até 48h apos o recebimento deste e-mail, seu link será automaticamente cancelado perdendo assim seu orçamento<br>OBS 2: Nenhum dos dados inseridos na etapa de pagamento fica em posse do site Cova de Tiriri<br><br> Caso haja desistência avisar respondendo este e-mail, ou envie um e-mail para ".$emailSession." <br><br></center>";



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "Return-Path: ".$emailSession."\r\n";
$headers .= "From: ".$emailSession . "\r\n" .
"Reply-To: ".$emailSession . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$mensagem=utf8_decode($mensagem);

mail("$para", "$assunto", "$mensagem", $headers, "-f$email_remetente");  //função que faz o envio do email.
	//FIM ENVIO EMAIL
 $_SESSION['ErroAgendamento']="Ordem de pagamento criada, verifica seu e-mail para maiores informações (Caixa de SPAM tambem)";
header("location: ../index.php");
}else{
    $_SESSION['ErroAgendamento']="Ordem de pagamento para este orçamento já foi criada, caso tenha perdido a data de pagamento desta ordem, peça um novo orçamento!";
	header("location: ../index.php");
	exit;
}
}
?>