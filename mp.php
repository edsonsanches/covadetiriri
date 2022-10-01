<?php
include("BD/conecta.php");

$idAgendamento=mysqli_real_escape_string($conexao, $_GET["idAgendamento"]);

// SDK do Mercado Pago
require("lib/vendor/autoload.php");

$idmp=$_GET["id"];
if(strlen($idmp)==11){

}else{
    exit;
}

// Adicione as credenciais
MercadoPago\SDK::setAccessToken('APP_USR-4757443602507802-100115-5ce1917ce9c6e885352c7b95b5754f01-6306260');
        
           $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
           // Get the payment and the corresponding merchant_order reported by the IPN.
          
           $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);

$status=$merchant_order->payments[0]->status;

//verificar se ja tem esse id criado para dar update, se não, criar, se sim, verificar se status esta diferente, se sim, dar update 

    mysqli_query($conexao, "UPDATE mp_oraculo SET status='$status', id_mp='$idmp' WHERE id_agendamentooraculo=$idAgendamento");
    $retorno="HTTP STATUS 200 (OK)";
    echo $retorno;

?>