<?php 
require_once('../../library.php'); 
require_once('../../lib/sqli-functions.php'); 
require_once('../../lib/basic-functions.php'); 
require_once('../../emails_lib.php');
$cal->checkLogedIN('../../accounts/login');
$msg = '';
$fname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');
$lname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');
$btc_address = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'wallet_address');
$email = $sqli->getEmail($_SESSION['user_code']);

$plan = $_SESSION['plan'];
$amount_to_pay = $_SESSION['amt'];
$coin = $_SESSION['currency'];
$tID = $_SESSION['TIDer'];
$comment = 'Incoming payment from !'.strtoupper($fname.' '.$lname).' with email '.$email;

if($usdt_network=="ERC20"){
    $usdt_network = 'usdterc20';
}else{
    $usdt_network = 'usdttrc20';
}

/*  */



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.nowpayments.io/v1/payment',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "price_amount": "'.$amount_to_pay.'",
  "price_currency": "usd",
  "pay_currency": "'.$usdt_network.'",
  "ipn_callback_url": "https://nowpayments.io",
  "order_id": "'.$tID.'",
  "order_description": "'.$comment.'"
}',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: RQNBQVF-M9H4SP8-MCCFF1D-8GFSYVW',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

$pick = json_decode($response, true);

curl_close($curl);
//echo $response;

 
/*  */

$_SESSION['amount'] = $pick['pay_amount'];
$_SESSION['wallet'] = $pick['pay_address'];
$_SESSION['your_txn_id'] = $_SESSION['TIDer'];
$_SESSION['your_confirms_needed'] = 3;
$_SESSION['currency'] = $coin;
$_SESSION['plan'] = $plan;
$_SESSION['your_address'] =  $pick['pay_address'];
$_SESSION['your_timeout'] = 9994949;
$_SESSION['your_qrlcode_url'] = '';

$fields = array('payment_id','usdt');
$values = array($pick['payment_id'],$pick['pay_address']);
$msg1 = $cal->update($deposit_tb,$fields,$values,'transaction_id',$tID);

//header("location:../payment-invoice");
//header("location:../check_payment.php");
        
    
/*  */



header("location:../check_payment.php");
?>