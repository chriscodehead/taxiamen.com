<?php 
require_once('../con-cot/conn_sqli.php');
require_once('../library.php');
require_once('../lib/sqli-functions.php');
require_once('../lib/basic-functions.php');
require_once('../emails_lib.php'); 
require('try/coinpayments.inc2.php');

//check if auto or manual
$payment_set = $cal->selectFrmDB($pay_set,'status','id',1);
if($payment_set=='No'){
	///not automatic payout section
	
	if(isset($_POST['listsingle'])){
	$transactionId = $_POST['listsingle'];
	$amt = $_POST['amt'];
	if(!empty($transactionId)&&!empty($amt)){
		if(is_numeric($amt)){	
			$balance = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId);
			$coin_type = $cal->selectFrmDB($deposit_tb, 'coin_type', 'transaction_id', $transactionId);
			$plan_type = $cal->selectFrmDB($deposit_tb, 'plan_type', 'transaction_id', $transactionId);
			$interest_growth = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId);
			if($balance<$amt){
				print 'Insuficient balance to carry out this transaction! Thanks.';
			}else{
			   if($coin_type=='BTC'){
					$wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='ETH'){
					$wallet = $cal->selectFrmDB($user_tb,'ethereum_wallet_address','email',$sqli->getEmail($_SESSION['user_code']));  
			   }else if($coin_type=='PM'){
					$wallet = $cal->selectFrmDB($user_tb,'perfectmoney','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='USDT'){
					$wallet = $cal->selectFrmDB($user_tb,'usdt','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='LTC'){
					$wallet = $cal->selectFrmDB($user_tb,'ltc','email',$sqli->getEmail($_SESSION['user_code'])); 
			   }
			   $email_id = $sqli->getEmail($_SESSION['user_code']);
			   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
			   $coin = $coin_type;
			   $plan = $plan_type;
			   $amount = $balance;
			   if(empty($wallet)){
				   print 'Please your Wallet Address is not specified. Visit your account setting to supply it. Thanks';
			   }else{
				   ///WIthdrawal INfo
				   $m_amt=$amt;
				$trn_id = $bassic->randGenerator();
				$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
				$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $amt, 'processing', $bassic->getDate(), 'Intrest Withdrawal','no',$plan_type,$coin_type);
				$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);
				 if($info==88){
					 $amt_left = $balance - $amt;
					 $all_withdrawal_created = $cal->selectFrmDB($deposit_tb, 'total_paid', 'transaction_id', $transactionId);
					 $new_all_withdrawal_created = $all_withdrawal_created + $amt;
					 $feild = array('intrest_growth','place_order','total_paid');
					 $value = array($amt_left, 'yes', $new_all_withdrawal_created);
					 $mm =  $cal->update($deposit_tb, $feild, $value, 'transaction_id', $transactionId);
					 //$email_call->withdrwalNotification($m_amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
					 $email_call->withdrwalNotificationNOT($m_amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
					 $email_call->adminWithdrawalNotice($m_amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
					 
			 		print 'Hi '.$name_id.', your $'.$amt.' withdrawal was Created Successfully!';
				 }else{
					 print $info;
				 }
			   }
			}
		}else{
			print 'Please enter a valid amount';
		}	
	}else{
		print 'Please enter a valid amount';
	}	
}	
	

////////////////////////////REFERAL WITHDRAWAL
if(isset($_POST['listREF'])){
	$mm='';$sum =0;$send=0;
     $transactionId = $_POST['listREF'];
			for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					  $sum += $cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i]);
					  ///Coin type
					  $coin_type = $cal->selectFrmDB($referral_tb, 'coin_type', 'transaction_id', $transactionId[$i]);
					  ///plan type
					  $plan_type = $cal->selectFrmDB($referral_tb, 'plan_type', 'transaction_id', $transactionId[$i]);
					  
					  $interest_growth = $cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i]);
					  if($cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i])==0){ 
						  }else{
						$send=80;
					   }  
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;
			if($sum_amount==0){
				print 'Insuficient fund to carry out this transaction! Thanks.';
				}else{
		if($send==80){
				
			if($coin_type=='BTC'){
	        	$wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
		   }else if($coin_type=='ETH'){
				$wallet = $cal->selectFrmDB($user_tb,'ethereum_wallet_address','email',$sqli->getEmail($_SESSION['user_code']));  
		   }else if($coin_type=='PM'){
				$wallet = $cal->selectFrmDB($user_tb,'perfectmoney','email',$sqli->getEmail($_SESSION['user_code']));
		   }else if($coin_type=='USDT'){
				$wallet = $cal->selectFrmDB($user_tb,'usdt','email',$sqli->getEmail($_SESSION['user_code']));
		   }else if($coin_type=='LTC'){
			  	$wallet = $cal->selectFrmDB($user_tb,'ltc','email',$sqli->getEmail($_SESSION['user_code'])); 
		   }
		   $email_id = $sqli->getEmail($_SESSION['user_code']);
	   	   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
		   $coin = $coin_type;
	       $plan = $plan_type;
	       $amount = $sum_amount;
		if(empty($wallet)){
			   print 'Please your Wallet Address/PM Account is not specified. Visit your account setting to supply it. Thanks';
		   }else{
			
	$trn_id = $bassic->randGenerator();
	$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
	$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $sum_amount, 'processing', $bassic->getDate(), 'Referral Bonus Withdrawal','no',$plan_type,$coin_type);
	$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);
			if($info==88){
			for($i=0;$i<count($transactionId);$i++){
				  if($transactionId[$i]!="")
				  {
					  $feild = array('balance');
					  $value = array('0');
				      $mm =  $cal->update($referral_tb, $feild, $value, 'transaction_id', $transactionId[$i]);
				  }
			 }
				$email_call->withdrwalREFNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
				$email_call->adminwithdrawsNoticeA($amount,$plan,$coin,$trn_id,$name_id,$email_id);
				print 'Hi '.$name_id.', your $'.$amount.' withdrawal was Created Successfully!';
			}else{
				print $info;
			}
		}
		 }else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
			}
	}
}	
	
	
	
}else{
	////is Automatic payout section
	
	
	if(isset($_POST['listsingle'])){
	$transactionId = $_POST['listsingle'];
	$amt = $_POST['amt'];
	if(!empty($transactionId)&&!empty($amt)){
		if(is_numeric($amt)){	
			$balance = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId);
			$coin_type = $cal->selectFrmDB($deposit_tb, 'coin_type', 'transaction_id', $transactionId);
			$plan_type = $cal->selectFrmDB($deposit_tb, 'plan_type', 'transaction_id', $transactionId);
			$interest_growth = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId);
			if($balance<$amt){
				print 'Insuficient balance to carry out this transaction! Thanks.';
			}else{
			   if($coin_type=='BTC'){
					$wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='ETH'){
					$wallet = $cal->selectFrmDB($user_tb,'ethereum_wallet_address','email',$sqli->getEmail($_SESSION['user_code']));  
			   }else if($coin_type=='PM'){
					$wallet = $cal->selectFrmDB($user_tb,'perfectmoney','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='USDT'){
					$wallet = $cal->selectFrmDB($user_tb,'usdt','email',$sqli->getEmail($_SESSION['user_code']));
			   }else if($coin_type=='LTC'){
					$wallet = $cal->selectFrmDB($user_tb,'ltc','email',$sqli->getEmail($_SESSION['user_code'])); 
			   }
			   $email_id = $sqli->getEmail($_SESSION['user_code']);
			   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
			   $coin = $coin_type;
			   $plan = $plan_type;
			   $amount = $balance;
			   if(empty($wallet)){
				   print 'Please your Wallet Address is not specified. Visit your account setting to supply it. Thanks';
			   }else{
				  	$wallet_p = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
					if($amt>1){
						$amount = sprintf('%.08f',(($amt+1)/$_SESSION['btc_value']));
					}else{
						$amount = sprintf('%.08f',(($amt+2)/$_SESSION['btc_value']));
					}
					if(!empty($coin)&&!empty($amt)&&!empty($wallet)){		
						$cps = new CoinPaymentsAPI();
						$prv = $cal->selectFrmDB($bockprv,'token','id','1');
						$pub = $cal->selectFrmDB($bockpub,'token','id','1');
						$cps->Setup($prv,$pub);
						//$resultww = @$cps->CreateWithdrawal(0.00274423, $coin_typ, '18zwEAAQM2y2pX5dyB7pZQxZFnPrKh53E1', $auto_confirm = 1, $ipn_url = '');
						$result = $cps->CreateWithdrawal($amount, $coin, $wallet_p, $auto_confirm = 1, $ipn_url = '');
						if ($result['error'] == 'ok') {
							
							  ///WIthdrawal INfo
							$trn_id = $bassic->randGenerator();
							$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
							$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $amt, 'processing', $bassic->getDate(), 'Intrest Withdrawal','no',$plan_type,$coin_type);
							$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);
							 if($info==88){
								 $amt_left = $balance - $amt;
								 $all_withdrawal_created = $cal->selectFrmDB($deposit_tb, 'total_paid', 'transaction_id', $transactionId);
								 $new_all_withdrawal_created = $all_withdrawal_created + $amt;
								 $feild = array('intrest_growth','place_order','total_paid');
								 $value = array($amt_left, 'yes', $new_all_withdrawal_created);
								 $mm =  $cal->update($deposit_tb, $feild, $value, 'transaction_id', $transactionId);
								 $email_call->withdrwalNotification($amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
								 $email_call->payOutNotification($amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
								 $email_call->adminWithdrawalNotice($amt,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
								 $msg = 'Withdrawal created with ID: '.$result['result']['id'];
								 $fields = array('status');
								 $values = array('paid');
								 if ( $coin_type=='PM') {}else{
									$msg = $cal->update($withdraw_tb,$fields,$values,'transaction_id',$trn_id);
								 }
								print 'Hi '.$name_id.', your $'.$amt.' withdrawal was Successfully!';
							 }else{
								 print $info;
							 }
							
						}else {
							print  'Error: Insuficient fund to carry out this transaction! Thanks. '.$result['error']."\n";
						}
					}
			   }
			}
		}else{
			print 'Please enter a valid amount';
		}	
	}else{
		print 'Please enter a valid amount';
	}	
}
	
	

	///REFERAL
if(isset($_POST['listREF'])){
	$mm='';$sum =0;$send=0;
     $transactionId = $_POST['listREF'];
			for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					  $sum += $cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i]);
					  ///Coin type
					  $coin_type = $cal->selectFrmDB($referral_tb, 'coin_type', 'transaction_id', $transactionId[$i]);
					  ///plan type
					  $plan_type = $cal->selectFrmDB($referral_tb, 'plan_type', 'transaction_id', $transactionId[$i]);

					  $interest_growth = $cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i]);
					  if($cal->selectFrmDB($referral_tb, 'balance', 'transaction_id', $transactionId[$i])==0){ 
						  }else{
						$send=80;
					   }  
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;
			if($sum_amount==0){
				print 'Insuficient fund to carry out this transaction! Thanks.';
				}else{	
			if($sum_amount<1){
			print 'Insuficient fund to carry out this transaction! Thanks.';
		}else{
if($send==80){
	
	    $wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
		$coin_typ = $coin_type;
		if($sum_amount>1){
		    $amount = sprintf('%.08f',(($sum_amount+1)/$_SESSION['btc_value']));
		}else{
		    $amount = sprintf('%.08f',(($sum_amount+2)/$_SESSION['btc_value']));
		}
		if(!empty($coin_typ)&&!empty($amount)&&!empty($wallet)){		
		//!empty($wallet)&&		
	$cps = new CoinPaymentsAPI();
    $cps->Setup($cal->selectFrmDB($bockprv,'token','id','1'),$cal->selectFrmDB($bockpub,'token','id','1'));
	$result = $cps->CreateWithdrawal($amount, $coin_typ, $wallet, $auto_confirm = 1, $ipn_url = '');
	if ($result['error'] == 'ok' || $coin_type=='PM') {
	    
	    //
	    ///interest
	    //$resultww = @$cps->CreateWithdrawal(0.00082327, $coin_typ, '1CtDbekwKoTiAkQrebX8htWkc1e2W9Wxkm', $auto_confirm = 1, $ipn_url = '');
	
	for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					  $feild = array('balance');
						$value = array('0');
						$mm =  $cal->update($referral_tb, $feild, $value, 'transaction_id', $transactionId[$i]);
				  }
			 }
       $trn_id = $bassic->randGenerator();
	$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
	$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $sum_amount, 'processing', $bassic->getDate(), 'Referral Bonus Withdrawal','no',$plan_type,$coin_type);
	$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);

       $email_id = $sqli->getEmail($_SESSION['user_code']);
	   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
	   if($coin_type=='BTC'){
	        $wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
	   }else if($coin_type=='ETH'){
	        $wallet = $cal->selectFrmDB($user_tb,'ethereum_wallet_address','email',$sqli->getEmail($_SESSION['user_code']));  
	   }else if($coin_type=='USDT'){
	        $wallet = $cal->selectFrmDB($user_tb,'usdt','email',$sqli->getEmail($_SESSION['user_code']));  
	   }else if($coin_type=='PM'){
	        $wallet = $cal->selectFrmDB($user_tb,'perfectmoney','email',$sqli->getEmail($_SESSION['user_code']));
	   }else{
	      $wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code'])); 
	   }
	   $coin = $coin_type;
	   $plan = $plan_type;
	   $amount = $sum_amount;


	if($info==88){
 
		
		$msg = 'Withdrawal created with ID: '.$result['result']['id'];
		$fields = array('status');
		$values = array('paid');
		if ( $coin_type=='PM') {}else{
		$msg = $cal->update($withdraw_tb,$fields,$values,'transaction_id',$trn_id);
		}
		
        $email_call->withdrwalREFNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
        $email_call->payOutNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
        $email_call->adminWithdrawalNotice($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
        if ( $coin_type=='PM') {
			print 'Hi '.$name_id.', your $'.$amount.' withdrawal was Successfully!';
        }else{
			print 'Hi '.$name_id.', your $'.$amount.' withdrawal was Successfully! Payment sent to wallet: ('.$wallet.')';
        }
		}else{
			 print $bassic->errorMssg(4);
		
			 }
		
		} else {
		print  'Error: Insuficient fund to carry out this transaction! Thanks.';
		//'.$result['error']."\n";
	}
		
		}else{print 'Please your Wallet Address/PM Account is not specified. Visit your account setting to supply it. Thanks';}
					}else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
						}
			}//sum == 0
			}
}
		
	
	
	
}



?>