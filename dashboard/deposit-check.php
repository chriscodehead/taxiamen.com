<?php
require_once('../library.php');
require_once('../emails_lib.php');
require_once('api/paykassa_sci.class.php');  // the plug-in class to work with SCI, you can download it at the link


    $paykassa_merchant_id = '15802';
    $paykassa_merchant_password = 'PRELyuLWSTqXpl7YuVObIWbElEwWHxaa';
    $test = false;                                              // False test mode - off, True - Enabled

    $paykassa = new PayKassaSCI(
        $paykassa_merchant_id,      // the ID of the merchant
        $paykassa_merchant_password, // merchant password
        $test
    );

    //private_hash We send a request to the POST when sending IPN. Important: For sci_confirm_order and sci_confirm_transaction_notification, different URLs in the Merchant settings.
    $res = $paykassa->sci_confirm_order($_POST["private_hash"]);

    if ($res['error']) {        // $res['error'] - true if the error
        die($res['message']); 	// $res['message'] - the text of the error message
        // actions in case of an error
    } else {
        // actions in case of success        
        $id = $res["data"]["order_id"];             // unique numeric identifier of the payment in your system, example: 150800
        $transaction = $res["data"]["transaction"]; // transaction number in the system paykassa: 96401
        $hash = $res["data"]["hash"];               // hash, example: bde834a2f48143f733fcc9684e4ae0212b370d015cf6d3f769c9bc695ab078d1
        $currency = $res["data"]["currency"];       // the currency of payment, for example: DASH
        $system = $res["data"]["system"];           // system, example: Dash
        $address = $res["data"]["address"];         // a cryptocurrency wallet address, for example: Xybb9RNvdMx8vq7z24srfr1FQCAFbFGWLg
        $tag = $res["data"]["tag"];                 // Tag for Ripple and Stellar
        $partial = $res["data"]["partial"];         // set up underpayments or overpayments 'yes' to accept, 'no' - do not take
        $amount = (float)$res["data"]["amount"];    // invoice amount example: 1.0000000

        if ($partial === 'yes') {
            // the amount of application may differ from the amount received, if the mode of partial payment
            // relevant only for cryptocurrencies, default is 'no'
        }

        // your code...
        $check_trn_id = query_sql("SELECT * FROM $deposit_tb WHERE `transaction_id`='".$id."' ");
        $results = mysqli_fetch_assoc($check_trn_id);
        
        $email_id = $results['email']; 
    	$name_id = $cal->selectFrmDB($user_tb,'first_name','email',$email_id);
    	$coin = $cal->selectFrmDB($deposit_tb,'coin_type','transaction_id',$id);
    	$plan = $cal->selectFrmDB($deposit_tb,'plan_type','transaction_id',$id);
    	$amount = $cal->selectFrmDB($deposit_tb,'amount','transaction_id',$id);
    	
    	$fields = array('deposit_status','received_status','transaction_hash');
    	$values = array('confirmed','Recieved',$hash);
    	$msg1 = $cal->update($deposit_tb,$fields,$values,'transaction_id',$id);
    	
    	//user
        $fields2 = array('payment_activation_status');
        $values2 = array('yes');
        $msg = $cal->update($user_tb,$fields2,$values2,'email',$email_id);
    	
        ///referal
    	$fieldsR = array('status');
    	$valuesR = array('confirmed');
    	$msg = $cal->update($referral_tb,$fieldsR,$valuesR,'transaction_id',$id);
        //$email_call->ConfirmPaymentNotify($amount,$plan,$coin,$id,$name_id,$email_id);
        $email_call->adminDepositNotice($amount,$plan,$coin,$id,$name_id,$email_id);

        echo $id.'|success'; // be sure to confirm the payment has been received
    }
    //$id = 'RPO626d02131677916'; $hash='JFJFJ';
    /*$subjt='Testing the system';
        $message='success trasaction ID:'.$id.' ADDRESS:'.$address;
        $email='webdav75@gmail.com';
        $siteName='infinite refer earning';
        $siteDomain='infinite-refer-earning.com';
        $email_call->generalMessage($subjt,$message,$email,$siteName,$siteDomain);*/
        
?>