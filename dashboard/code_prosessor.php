<?php require_once('../con-cot/conn_sqli.php'); ?>
<?php require_once('../library.php'); ?>
<?php require_once('../lib/sqli-functions.php'); ?>
<?php require_once('../lib/basic-functions.php'); ?>
<?php require_once('../emails_lib.php'); 
require('try/coinpayments.inc2.php');?>
<?php 
if(isset($_POST['emailresend'])){
	$emailfgt = $_POST['emailresend'];
	$passresend = $_POST['passresend'];
	if(!empty($emailfgt)&&!empty($passresend)){
		print $email_call->ActivateMail($emailfgt, $passresend);
	}else{print 'Enter a valid email!';}
}
?>
<?php
////Reviews
if(isset($_POST['reviewEmail'])){
	$reviewEmail = mysqli_real_escape_string($link, $_POST['reviewEmail']);
    $reviewMsg = mysqli_real_escape_string($link, $_POST['reviewMsg']);
    $date = $bassic->getDate();
    $status = 0;
    $name = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
    if(!empty($reviewMsg)&&!empty($reviewEmail)){
        $feilds = array('email','message','status','date_added','name');
        $value = array($reviewEmail,$reviewMsg,$status,$date,$name);
        print  $cal->insertData($review,$feilds,$value);
        @$email_call->clientReviews($name,$reviewEmail,$reviewMsg);
	}else{
    	print 'Some fields are empty!';
	}
}



if(isset($_POST['email'])){
//$walletaddress = mysqli_real_escape_string($link, $_POST['walletaddress']);
$sex = mysqli_real_escape_string($link, $_POST['sex']);
//$trader = mysqli_real_escape_string($link, $_POST['trader']);
$country = mysqli_real_escape_string($link, $_POST['country']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$fname = mysqli_real_escape_string($link, ucfirst($_POST['fname']));
$lname = ucfirst(mysqli_real_escape_string($link, $_POST['lname']));
$btc = mysqli_real_escape_string($link,$_POST['btc']);
$eth = mysqli_real_escape_string($link,$_POST['eth']);
$bnb = mysqli_real_escape_string($link,$_POST['bnb']);
$usdt = '';//mysqli_real_escape_string($link,$_POST['usdt']);
$ltc = mysqli_real_escape_string($link,$_POST['ltc']);
$pm = mysqli_real_escape_string($link, $_POST['pm']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
if(!empty($fname)&&!empty($lname)&&!empty($email)){
		$feilds = array('first_name','last_name','phone','wallet_address','perfectmoney','address','country','sex','ethereum_wallet_address','bnb','ltc');
		$value = array($fname,$lname,$phone,$btc,$pm,$address,$country,$sex,$eth,$bnb,$ltc);
		print  $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));	
	}else{
		print "Some fields are empty!";
		}
	}
?>
<?php
if(isset($_POST['pass'])){
$pass = mysqli_real_escape_string($link, $_POST['pass']);
$passh = $bassic->passwordHash($agorithm, $pass);
if(!empty($pass)){
			$feilds = array('password');
			$value = array($passh);
			print $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
	}else{
		print "Please fill all necessary fields!";
		}
	}
?>

<?php
if(isset($_POST['fac'])){
$fac = mysqli_real_escape_string($link, $_POST['fac']);
if(!empty($fac)){
			$feilds = array('two_factor');
			$value = array($fac);
			print $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
	}else{
		print "Please fill all necessary fields!";
		}
	}
?>
<?php
if(isset($_POST['tran_id'])){
$id = mysqli_real_escape_string($link, $_POST['tran_id']);
if(!empty($id)){
		if($del = query_sql("UPDATE $deposit_tb SET `deposit_status`='canceled' WHERE `id`='".$id."'")){
			print 'Transaction was successfully canceled';
		}else{
			print 'Error! Canceletion failed';
		}
	}else{
		print "Error! Not data found";
		}
	}
?>
<?php
if(isset($_POST['btc_wallet'])){
$btc = mysqli_real_escape_string($link, $_POST['btc_wallet']);
if(!empty($btc)){
			$feilds = array('wallet_address');
			$value = array($btc);
			print $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
	}else{
		print "Please fill all necessary fields!";
		}
	}
?>
<?php
if(isset($_POST['perfectmoney'])){
$perfectmoney = mysqli_real_escape_string($link, $_POST['perfectmoney']);
if(!empty($perfectmoney)){
			$feilds = array('perfectmoney');
			$value = array($perfectmoney);
			print $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
	}else{
		print "Please fill all necessary fields!";
		}
	}
?>
<?php 
if(isset($_FILES['file']['name'])){
 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] ;
    }else {
				 $pic_name  = $_FILES['file']['name'];
				 $pic_tmp = $_FILES['file']['tmp_name'];
				 $pic_size = $_FILES['file']['size'];
				 $passportIn = $cal->selectFrmDB($user_tb,'passport','email',$sqli->getEmail($_SESSION['user_code']));
				if(!empty($pic_name)){
					 $gen_Num = $bassic->randGenerator();
					$extension_Name = $bassic->extentionName($pic_name);
					 $new_name = $gen_Num.uniqid().$extension_Name;
					$path = '../photo/'.$new_name;
					$picvalidation = $bassic->picVlidator($pic_name,$pic_size);
					if(empty($picvalidation)){
						if($passportIn=='avatar.png'){}else{
							$bassic->unlinkFile($passportIn,'../photo/');
						}
						$upl = $bassic->uploadImage($pic_tmp,$path);
							if(empty($upl)){
								 $fieldP = array('passport');
								 $valueP = array($new_name);
								 print $cal->update($user_tb,$fieldP,$valueP,'email',$sqli->getEmail($_SESSION['user_code']));
							}else{print $upl;}
						}else{print $picvalidation;}
					}else{print 'Please browse a file!';}
   }
}


$payment_set = $cal->selectFrmDB($pay_set,'status','id',1);


if($payment_set=='No'){ ///Payment Setting Start
	
	
if(isset($_POST['list'])){
	$mm='';$sum =0;$send=0;
     $transactionId = $_POST['list'];
			for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					  $sum += $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i]);
					  ///Coin type
					  $coin_type = $cal->selectFrmDB($deposit_tb, 'coin_type', 'transaction_id', $transactionId[$i]);
					  ///plan type
					  $plan_type = $cal->selectFrmDB($deposit_tb, 'plan_type', 'transaction_id', $transactionId[$i]);
					  
					  $interest_growth = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i]);
					  if($cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i])==0){
						  }else{
					   $all_withdrawal_created = $cal->selectFrmDB($deposit_tb, 'total_paid', 'transaction_id', $transactionId[$i]);
					   $new_all_withdrawal_created = $all_withdrawal_created + $interest_growth;
						$feild = array('intrest_growth','place_order','total_paid');
						$value = array('0', 'yes', $new_all_withdrawal_created);
						$mm =  $cal->update($deposit_tb, $feild, $value, 'transaction_id', $transactionId[$i]);
						$send=80;
					   } 
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;

           


			if($sum_amount==0){
				print '!Oops it seem like you have no intrest to withdraw.';
				}else{	  
if($send==80){
$trn_id = $bassic->randGenerator();
	$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
	$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $sum_amount, 'processing', $bassic->getDate(), 'Intrest Withdrawal','no',$plan_type,$coin_type);
	$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);


       $email_id = $sqli->getEmail($_SESSION['user_code']);
	   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
	   $wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
	   $coin = $coin_type;
	   $plan = $plan_type;
	   $amount = $sum_amount;

	if($info==88){
                 $email_call->withdrwalNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
		print ' Withdrawal was created successfully. Expect payment soon!';
		}else{
			 print $bassic->errorMssg(4);
			 }
					}else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
						}
			}//sum == 0
}


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
						$feild = array('balance');
						$value = array('0');
						$mm =  $cal->update($referral_tb, $feild, $value, 'transaction_id', $transactionId[$i]);
						$send=80;
					   }  
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;
			if($sum_amount==0){
				print '!Oops it seem like you have no intrest to withdraw.';
				}else{	  
if($send==80){
       $trn_id = $bassic->randGenerator();
	$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
	$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $sum_amount, 'processing', $bassic->getDate(), 'Referral Bonus Withdrawal','no',$plan_type,$coin_type);
	$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);

       $email_id = $sqli->getEmail($_SESSION['user_code']);
	   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
	   
	   $coin = $coin_type;
	   $plan = $plan_type;
	   $amount = $sum_amount;


	if($info==88){
            $email_call->withdrwalREFNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
		print ' Referral Bonus Withdrawal was created successfully. Expect payment soon!';
		}else{
			 print $bassic->errorMssg(4);
			 }
					}else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
						}
			}//sum == 0
}


}else{ ////Payment Setting

/*NEW CODE*/
if(isset($_POST['list'])){
	$mm='';$sum =0;$send=0;
     $transactionId = $_POST['list'];
			for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					  $sum += $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i]);
					  ///Coin type
					  $coin_type = $cal->selectFrmDB($deposit_tb, 'coin_type', 'transaction_id', $transactionId[$i]);
					  ///plan type
					  $plan_type = $cal->selectFrmDB($deposit_tb, 'plan_type', 'transaction_id', $transactionId[$i]);
					  
					  $interest_growth = $cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i]);
					  if($cal->selectFrmDB($deposit_tb, 'intrest_growth', 'transaction_id', $transactionId[$i])==0){
						  }else{
					   /*$all_withdrawal_created = $cal->selectFrmDB($deposit_tb, 'total_paid', 'transaction_id', $transactionId[$i]);
					   $new_all_withdrawal_created = $all_withdrawal_created + $interest_growth;
						$feild = array('intrest_growth','place_order','total_paid');
						$value = array('0', 'yes', $new_all_withdrawal_created);
						$mm =  $cal->update($deposit_tb, $feild, $value, 'transaction_id', $transactionId[$i]);*/
						$send=80;
					   } 
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;

           


			if($sum_amount==0){
				print '!Oops it seem like you have no intrest to withdraw.';
				}else{
		if($sum_amount<10){
			print '!Oops our payment gate-way allow for a minimum withdrawal of $10!';
		}else{
if($send==80){
	///
	
		$wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
		$coin_typ = $coin_type;
		$amount = sprintf('%.08f',($sum_amount/$_SESSION['btc_value']));
		if(!empty($wallet)&&!empty($coin_typ)&&!empty($amount)){		
				
	$cps = new CoinPaymentsAPI();
    $cps->Setup($cal->selectFrmDB($bockprv,'token','id','1'),$cal->selectFrmDB($bockpub,'token','id','1'));
	$result = $cps->CreateWithdrawal($amount, $coin_typ, $wallet, $auto_confirm = 1, $ipn_url = '');
	if ($result['error'] == 'ok') {
		
		
		////new
		for($i=0;$i<count($transactionId);$i++)
			 {
				  if($transactionId[$i]!="")
				  {
					 $all_withdrawal_created = $cal->selectFrmDB($deposit_tb, 'total_paid', 'transaction_id', $transactionId[$i]);
					   $new_all_withdrawal_created = $all_withdrawal_created + $interest_growth;
						$feild = array('intrest_growth','place_order','total_paid');
						$value = array('0', 'yes', $new_all_withdrawal_created);
						$mm =  $cal->update($deposit_tb, $feild, $value, 'transaction_id', $transactionId[$i]); 
				  }
			 }
    $trn_id = $bassic->randGenerator();
	$fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
	$valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $sum_amount, 'processing', $bassic->getDate(), 'Intrest Withdrawal','no',$plan_type,$coin_type);
	$info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);


       $email_id = $sqli->getEmail($_SESSION['user_code']);
	   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
	   $coin = $coin_type;
	   $plan = $plan_type;
	   $amount = $sum_amount;

	if($info==88){
		
		$msg = 'Withdrawal created with ID: '.$result['result']['id'];
		$fields = array('status');
		$values = array('paid');
		$msg = $cal->update($withdraw_tb,$fields,$values,'transaction_id',$trn_id);
		
		
        $email_call->withdrwalNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
		print ' Withdrawal was successful '.sprintf('%.08f',($sum_amount/$_SESSION['btc_value'])).' '.$coin_typ.' ($'.$sum_amount.') was sent to your wallet ('.$wallet.'). Note: payment may take some hours to reflect. Thanks axitrex serving you better!';
		}else{
			 print $bassic->errorMssg(4);
			 }
		///new end
		
	} else {
		print  'Error: insuficient fund to make this payment please bear with us as we will soon fund our payment gate-way. Thanks';
		//'.$result['error']."\n";
	}
				
			}else{print 'Please fill all fields';}
	//
	
	/////
					}else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
						}
			}//sum == 0
			}
}


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
						/*$feild = array('balance');
						$value = array('0');
						$mm =  $cal->update($referral_tb, $feild, $value, 'transaction_id', $transactionId[$i]);*/
						$send=80;
					   }  
				  }else{$other = 'Some transaction were not completed!';}
			       }
				   $sum_amount = $sum;
			if($sum_amount==0){
				print '!Oops it seem like you have no intrest to withdraw.';
				}else{	
			if($sum_amount<10){
			print '!Oops our payment gate-way allow for a minimum withdrawal of $10!';
		}else{
if($send==80){
	
	$wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
		$coin_typ = $coin_type;
		$amount = sprintf('%.08f',($sum_amount/$_SESSION['btc_value']));
		if(!empty($wallet)&&!empty($coin_typ)&&!empty($amount)){		
				
	$cps = new CoinPaymentsAPI();
    $cps->Setup($cal->selectFrmDB($bockprv,'token','id','1'),$cal->selectFrmDB($bockpub,'token','id','1'));
	$result = $cps->CreateWithdrawal($amount, $coin_typ, $wallet, $auto_confirm = 1, $ipn_url = '');
	if ($result['error'] == 'ok') {
	
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
	   $wallet = $cal->selectFrmDB($user_tb,'wallet_address','email',$sqli->getEmail($_SESSION['user_code']));
	   $coin = $coin_type;
	   $plan = $plan_type;
	   $amount = $sum_amount;


	if($info==88){
 
		
		$msg = 'Withdrawal created with ID: '.$result['result']['id'];
		$fields = array('status');
		$values = array('paid');
		$msg = $cal->update($withdraw_tb,$fields,$values,'transaction_id',$trn_id);
		
		
        $email_call->withdrwalREFNotification($amount,$plan,$coin,$trn_id,$name_id,$email_id,$wallet);
		print 'Referral Bonus withdrawal was successful '.sprintf('%.08f',($sum_amount/$_SESSION['btc_value'])).' '.$coin_typ.' ($'.$sum_amount.') was sent to your wallet ('.$wallet.'). Note: payment may take some hours to reflect. Thanks axitrex serving you better!';
		
		}else{
			 print $bassic->errorMssg(4);
		
			 }
		
		} else {
		print  'Error: insuficient fund to make this payment please bear with us as we will soon fund our payment gate-way. Thanks';
		//'.$result['error']."\n";
	}
		
		}else{print 'Please fill all fields';}
					}else{
				print 'Internal error. Please try again. If error persist contact support. Thanks';
						}
			}//sum == 0
			}
}
	
	
}//Payout Setting End
 ?>