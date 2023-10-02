<?php
require_once('../library.php');
require_once('../emails_lib.php');
require_once('api/paykassa_sci.class.php'); // the plug-in class to work with SCI, you can download it at the link


    $paykassa_merchant_id = '15802';
    $paykassa_merchant_password = 'PRELyuLWSTqXpl7YuVObIWbElEwWHxaa';
    $test = false;                                              // False test mode - off, True - Enabled

    $paykassa = new PayKassaSCI(
        $paykassa_merchant_id,      // the ID of the merchant
        $paykassa_merchant_password, // merchant password
        $test
    );

    //private_hash We send a request to the POST when sending IPN. Important: For sci_confirm_order and sci_confirm_transaction_notification, different URLs in the Merchant settings.
    $res = $paykassa->sci_confirm_transaction_notification($_POST["private_hash"]);

    if ($res['error']) {        // $res['error'] - true if the error
        die($res['message']); 	// $res['message'] - the text of the error message
        // actions in case of an error
    } else {
        // actions in case of success
        $transaction = $res["data"]["transaction"];         // transaction number in the system paykassa: 2431548
        $txid = $res["data"]["txid"];                       // A transaction in a cryptocurrency network, an example: 0xb97189db3555015c46f2805a43ed3d700a706b42fb9b00506fbe6d086416b602
        $shop_id = $res["data"]["shop_id"];                 // Your merchant's number, example: 138
        $id = $res["data"]["order_id"];                     // unique numeric identifier of the payment in your system, example: 150800
        $amount = (float)$res["data"]["amount"];            // received amount, example: 1.0000000
        $fee = (float)$res["data"]["fee"];                  // payment processing fee: 0.0000000
        $currency = $res["data"]["currency"];               // the currency of payment, for example: DASH
        $system = $res["data"]["system"];                   // system, example: Dash
        $address_from = $res["data"]["address_from"];       // address of the payer's cryptocurrency wallet, example: 0x5d9fe07813a260857cf60639dac710ebb9531a20
        $address = $res["data"]["address"];                 // a cryptocurrency wallet address, for example: Xybb9RNvdMx8vq7z24srfr1FQCAFbFGWLg
        $tag = $res["data"]["tag"];                         // Tag for Ripple and Stellar is an integer
        $confirmations = $res["data"]["confirmations"];     // Current number of network confirmations
        $required_confirmations = 
        $res["data"]["required_confirmations"];         // Required number of network confirmations for crediting
        $status = $res["data"]["status"];                   // yes - if the payment is credited
        $static = $res["data"]["static"];                   // Always yes
        $date_update = $res["data"]["date_update"];         // last updated information, example: "2018-07-23 16:03:08"
        
        $explorer_address_link = 
            $res["data"]["explorer_address_link"];          // A link to view information about the address
        $explorer_transaction_link = 
            $res["data"]["explorer_transaction_link"];      // Link to view transaction information


        if ($status !== 'yes') {
            //the payment has not been credited yet
            // your code...
            $check_trn_id = query_sql("SELECT * FROM $deposit_tb WHERE `transaction_id`='".$id."' ");
            $results = mysqli_fetch_assoc($check_trn_id);
            
            $subjt='Failed Transaction | Infinite Refer Earning';
            $message='Your deposit trasaction was not successful. Try again later. <br> ID:'.$id.' <br> ADDRESS:'.$address.' AMOUNT: '.$amount;
            $email= $results['email'];
            $siteName='Infinite Refer Earning';
            $siteDomain='infinite-refer-earning.com';
            $email_call->generalMessage($subjt,$message,$email,$siteName,$siteDomain);

            echo $id.'|success'; // confirm receipt of the request
        } else {
            //the payment is credited        
            // your code...
            $check_trn_id = query_sql("SELECT * FROM $deposit_tb WHERE `transaction_id`='".$id."' ");
            $results = mysqli_fetch_assoc($check_trn_id);
            
            $email_id = $results['email']; 
        	$name_id = $cal->selectFrmDB($user_tb,'first_name','email',$email_id);
        	$coin = $cal->selectFrmDB($deposit_tb,'coin_type','transaction_id',$id);
        	$plan = $cal->selectFrmDB($deposit_tb,'plan_type','transaction_id',$id);
        	$amount = $cal->selectFrmDB($deposit_tb,'amount','transaction_id',$id);
        	
        	$fields = array('deposit_status','received_status','transaction_hash');
        	$values = array('confirmed','Recieved',$txid);
        	$msg1 = $cal->update($deposit_tb,$fields,$values,'transaction_id',$id);
        	
        	//user
            $fields2 = array('payment_activation_status');
            $values2 = array('yes');
            $msg = $cal->update($user_tb,$fields2,$values2,'email',$email_id);
        	
            ///referal
        	$fieldsR = array('status');
        	$valuesR = array('confirmed');
        	$msg = $cal->update($referral_tb,$fieldsR,$valuesR,'transaction_id',$id);
            $email_call->ConfirmPaymentNotify($amount,$plan,$coin,$id,$name_id,$email_id);
            @$email_call->adminDepositNotice($amount,$plan,$coin,$id,$name_id,$email_id);

            echo $id.'|success'; // be sure to confirm the payment has been received
            
    
        }
        
    }



?>