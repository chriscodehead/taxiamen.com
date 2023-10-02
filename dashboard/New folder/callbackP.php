<?php 
require_once('../library.php');
require_once('../emails_lib.php');

if(isset($_POST['PAYEE_ACCOUNT'])){
	$ORDER_NUM = $_POST['ORDER_NUM'];
	$CUST_NUM = $_POST['CUST_NUM'];
	if (!empty($ORDER_NUM)&&!empty($CUST_NUM)) {

		$email_id = $sqli->getEmail($CUST_NUM); 
			//$cal->selectFrmDB($deposit_tb,'email','transaction_id',$ORDER_NUM);
		$name_id = $cal->selectFrmDB($user_tb,'first_name','email',$email_id);
		$coin = $cal->selectFrmDB($deposit_tb,'coin_type','transaction_id',$ORDER_NUM);
		$plan = $cal->selectFrmDB($deposit_tb,'plan_type','transaction_id',$ORDER_NUM);
		$amount = $cal->selectFrmDB($deposit_tb,'amount','transaction_id',$ORDER_NUM);

		$fields = array('deposit_status','received_status');
		$values = array('confirmed','Recieved');
		$msg1 = $cal->update($deposit_tb,$fields,$values,'transaction_id',$ORDER_NUM);
	///referal
		$fieldsR = array('status');
		$valuesR = array('confirmed');
		$msg = $cal->update($referral_tb,$fieldsR,$valuesR,'transaction_id',$ORDER_NUM);
	    $email_call->ConfirmPaymentNotify($amount,$plan,$coin,$ORDER_NUM,$name_id,$email_id);


	}
}
?>