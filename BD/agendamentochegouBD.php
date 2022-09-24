
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

$id=mysqli_real_escape_string($conexao, $_POST["idagendamento"]);
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

$precoRitual=mysqli_query($conexao, "select * from config where id_config=10");
$campoRitual=mysqli_fetch_assoc($precoRitual);
$ritualbd=$campoRitual['config'];

$igual=mysqli_query($conexao, "select * from agendamento where id_agendamento=$id");
$campoemail=mysqli_fetch_assoc($igual);
$emailbd=$campoemail['id_gira'];
$entidadebd=$campoemail['id_entidade'];

if($valorGira=='presenca'){
    $valorFinal=$ritualbd;
    $valorFinalStone=$valorFinal*100;
    $valorGira="Ritual/Presença - SEM direito a CONSULTA";
}else{
    $EntidadeValor=mysqli_query($conexao, "select * from entidade where id_entidade=$entidadebd");
    $campoEntidadeValor=mysqli_fetch_assoc($EntidadeValor);
    $valorFinal=$campoEntidadeValor['valor'];
    $valorFinalStone=$valorFinal*100;
    $valorGira="Consulta - ".$campoEntidadeValor['entidade'];
}

$igual2=mysqli_query($conexao, "select dia, mes, ano, hora from gira where id_gira=$emailbd");
$campoemail2=mysqli_fetch_assoc($igual2);
$dia1=$campoemail2['dia'];
$mes1=$campoemail2['mes'];
$ano1=$campoemail2['ano'];
$hora1=$campoemail2['hora'];

mysqli_query($conexao, "UPDATE agendamento SET confirmou=1 WHERE id_agendamento=$id");

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.pagar.me/core/v5/orders/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"customer\":{\"phones\":{\"home_phone\":{\"country_code\":\"55\",\"area_code\":\"11\",\"number\":\"000000000\"}},\"name\":\"$nomeagendado\",\"email\":\"$emailagendado\",\"type\":\"individual\",\"document\":\"0\"},\"items\":[{\"amount\":$valorFinalStone,\"description\":\"Toque Quimbanda CDT ".$id."\",\"quantity\":1,\"code\":$id}],\"payments\":[{\"checkout\":{\"accepted_payment_methods\":[\"credit_card\"],\"expires_in\":4320,\"default_payment_method\":\"credit_card\",\"customer_editable\":true},\"payment_method\":\"checkout\"}]}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Basic c2tfb3lBUmVYUFRva3NHZVk2Nzo=",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response=json_decode($response, true);

$pagamentoLink=$response["checkouts"]["0"]["payment_url"];
$idpagarme=$response["id"];
//var_dump($response["id"]);
//var_dump($response["checkouts"]["0"]["payment_url"]);
//var_dump($response["checkouts"]["0"]["id"]);
//var_dump($response["checkouts"]["0"]["customer"]["id"]);
//var_dump($response);

mysqli_query($conexao, "INSERT INTO pagarme (id_pagarme, status, id_agendamento, link) VALUES ('$idpagarme', 'CRIADO', '$id', '$pagamentoLink')");

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}

	//ENVIO EMAIL
	  //1 – Definimos Para quem vai ser enviado o email
	  $email_remetente=$emailSession;
$para = $emailagendado;
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $nomeagendado;
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto


    $assunto = $sigla." - Seu agendamento foi aceito";
 //mensagem que vai ser enviado no e-mail
$mensagem = "<center><img src=".$site."/img/".$logo." width=300 height=300><br><br>Você <strong>".$nome."</strong> está prestes a garantir a vaga na gira de quimbanda do Templo de Quimbanda Cova de Tiriri dia: <strong>".$dia1."/".$mes1."/".$ano1." às ".$hora1." horas.<br><br>Faça o pagamento no valor de: R$ ".$valorFinal." (".$valorGira.")"."<br><br> Pagamento: ".$pagamentoLink."</strong> <br>OBS 1: Caso não seja pago em até 48h apos o recebimento deste e-mail, seu link será automaticamente cancelado perdendo assim sua vaga no agendamento<br>OBS 2: Nenhum dos dados inseridos na etapa de pagamento fica em posse do site Cova de Tiriri<br><br><strong>Algumas orientações: </strong> <br> Abrimos os portões com 30 minutos de antecedência. <br><br> - Vá de máscara. <br> - Não vá se estiver com sintomas gripais ou tenha tido contato com alguém nessa condição. <br> - Leve seu comprovante vacinal. <br><br> O endereço é ".$enderecoSession.", próximo ao Parque do Piqueri. <br><br>Caso haja desistência avisar respondendo este e-mail, ou envie um e-mail para ".$emailSession." <br><br>Grupo Whats: ".$whatsbd."</center>";



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "Return-Path: ".$emailSession."\r\n";
$headers .= "From: ".$emailSession . "\r\n" .
"Reply-To: ".$emailSession . "\r\n" .
"X-Mailer: PHP/" . phpversion();

$mensagem=utf8_decode($mensagem);

mail("$para", "$assunto", "$mensagem", $headers, "-f$email_remetente");  //função que faz o envio do email.
	//FIM ENVIO EMAIL


	header("location: ../admin/visualizarAgendamentoToque.php?idgira=".$emailbd);
	exit;


?>