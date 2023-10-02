<?php require_once('../library.php');
require_once('../emails_lib.php');
$blockchain_root = "https://blockchain.info/";
$root_url = 'https://api.blockchain.info/v2/receive';
$secret = '??ZzsMLGKCJe??162CfA5Ec??G6j&*cnjhj';
$my_xpub = 'xpub6CSqNUBt26k4Rz386atyoVoHk2YoMyQe8VWGyPAaxLVVSWRydCCfx3MwkchD3RxRufVecq8YVoxx2ECf6t1vZPcEub6UvKnqUhuehfVYEwB';
$my_api_key = '0b9da7ee-b055-42fc-ac3f-1872f7641577';

$secret = $_GET['sefillcool'];
$trn_id = $_GET['tranID'];
$transaction_hash = $_GET['transaction_hash'];
$value_in_satoshi = $_GET['value'];
$value_in_btc = $value_in_satoshi / 100000000;

$check_trn_id = query_sql("SELECT * FROM $deposit_tb WHERE `transaction_id`='".$trn_id."' ");
$results = mysqli_fetch_assoc($check_trn_id);

if ($_GET['address'] != $results['btc_address']) {
    echo 'Incorrect Receiving Address';
  return;
}

if ($_GET['secret'] != $secret) {
  echo 'Invalid Secret';
  return;
}


if ($_GET['confirmations'] >= 3) {
	
	$email_id = $results['email']; 
		//$cal->selectFrmDB($deposit_tb,'email','transaction_id',$trn_id);
	$name_id = $cal->selectFrmDB($user_tb,'first_name','email',$email_id);
	$coin = $cal->selectFrmDB($deposit_tb,'coin_type','transaction_id',$trn_id);
	$plan = $cal->selectFrmDB($deposit_tb,'plan_type','transaction_id',$trn_id);
	$amount = $cal->selectFrmDB($deposit_tb,'amount','transaction_id',$trn_id);
	
	$fields = array('deposit_status','received_status','transaction_hash');
	$values = array('confirmed','Recieved',$transaction_hash);
	$msg1 = $cal->update($deposit_tb,$fields,$values,'transaction_id',$trn_id);
///referal
	$fieldsR = array('status');
	$valuesR = array('confirmed');
	$msg = $cal->update($referral_tb,$fieldsR,$valuesR,'transaction_id',$trn_id);
    $email_call->ConfirmPaymentNotify($amount,$plan,$coin,$trn_id,$name_id,$email_id);
    @$email_call->adminDepositNotice($amount,$plan,$coin,$trn_id,$name_id,$email_id);
  if($msg1=="Update was successful") {
	   echo "*ok*";
  }
} else {
  //Waiting for confirmations
  //create a pending payment entry
   echo "Waiting for confirmations";
}
?>