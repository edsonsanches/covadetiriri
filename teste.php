<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.pagar.me/core/v5/orders/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"customer\":{\"phones\":{\"home_phone\":{\"country_code\":\"55\",\"area_code\":\"11\",\"number\":\"000000000\"}},\"name\":\"Edson Sanches\",\"email\":\"dinhosanches_si@hotmail.com\",\"type\":\"individual\",\"document\":\"0\"},\"items\":[{\"amount\":100,\"description\":\"Chaveiro do Tesseract\",\"quantity\":1,\"code\":123}],\"payments\":[{\"checkout\":{\"accepted_payment_methods\":[\"credit_card\"],\"expires_in\":60,\"default_payment_method\":\"credit_card\",\"customer_editable\":true},\"payment_method\":\"checkout\"}]}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Basic c2tfb3lBUmVYUFRva3NHZVk2Nzo=",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}