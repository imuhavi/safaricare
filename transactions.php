<?php
$amount =  $_POST['amount']; //Amount to transact 
$phonenuber = $_POST['phonenumber']; // Phone number paying
$Account_no = 'UMESKIA SOFTWARES'; // Enter account number optional
$url = 'https://tinypesa.com/express/ianmuhavi';
$data = array(
    'amount' => $amount,
    'msisdn' => $phonenuber,
    'account_no'=>$Account_no
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: Z8F76AvDhkQ' // Replace with your api key
 );
$info = http_build_query($data);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
$msg_resp = json_decode($resp);

if($msg_resp ->success == 'true'){
    echo "WAIT FOR SAFARICARE STK POP UP";
}

?>



