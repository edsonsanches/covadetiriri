<?php
include("BD/conecta.php");

$idorcamento=mysqli_real_escape_string($conexao, $_GET["idOrcamento"]);

// SDK do Mercado Pago
require("lib/vendor/autoload.php");

$idmp=$_GET["id"];
if(strlen($idmp)==11){

}else{
    exit;
}

// Adicione as credenciais
MercadoPago\SDK::setAccessToken('APP_USR-440037163017176-111322-87eb2db3a07461fc948b9da6da960111-205718711');
        
           $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
           // Get the payment and the corresponding merchant_order reported by the IPN.
          
           $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);

$status=$merchant_order->payments[0]->status;

//verificar se ja tem esse id criado para dar update, se não, criar, se sim, verificar se status esta diferente, se sim, dar update 

    mysqli_query($conexao, "UPDATE mp_trabalho SET status='$status', id_mp='$idmp' WHERE id_orcamento=$idorcamento");
    $retorno="HTTP STATUS 200 (OK)";
    echo $retorno;

?>