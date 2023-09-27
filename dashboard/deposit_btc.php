<?php require_once('../con-cot/conn_sqli.php'); ?>
<?php require_once('../library.php'); ?>
<?php require_once('../lib/sqli-functions.php'); ?>
<?php require_once('../lib/basic-functions.php'); ?>
<?php require_once('../emails_lib.php');
$cal->checkLogedIN('../login'); ?>
<?php
$msg = '';
$fname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'first_name');
$lname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'last_name');
$sex = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'sex');
$phone = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'phone');
$country = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'country');
$address = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'address');
$btc_address = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'wallet_address');

if (isset($_POST['amount'])) {
	//if(!empty($fname)&&!empty($btc_address)){
	$amount = mysqli_real_escape_string($link, htmlentities($_POST['amount']));
	$plan = mysqli_real_escape_string($link, htmlentities($_POST['plan']));
	$coin = mysqli_real_escape_string($link, htmlentities($_POST['coin']));
	$inv_type = mysqli_real_escape_string($link, htmlentities($_POST['inv_type']));
	$amount_to_pay = $amount;
	//die();
	if (!is_numeric($amount)) {
		header("location:deposit?error=Please enter a valid amount!");
	} else {
		if (!empty($amount) && !empty($plan) && !empty($coin)) {
			if ($amount < $siteMinA) {
				header("location:deposit?error=Please we allow for minimum investment of $" . $siteMinA . "!");
			} else {

				if ($plan == 'LEVEL1' && $amount < $siteMinA) {
					header("location:deposit?error=Error! `" . $planA . " Plan` is within $" . $siteMinA . " -> $" . $siteMaxA . "");
				} else {

					if ($plan == 'LEVEL1' && $amount > $siteMaxA) {
						header("location:deposit?error=Error! `" . $planA . " Plan` is within $" . $siteMinA . " -> $" . $siteMaxA . "");
					} else {

						if ($plan == 'LEVEL2' && $amount < $siteMinB) {
							header("location:deposit?error=Error! `" . $planB . " Plan` is within $" . $siteMinB . " -> $" . $siteMaxB . "");
						} else {

							if ($plan == 'LEVEL2' && $amount > $siteMaxB) {
								header("location:deposit?error=Error! `" . $planB . " Plan` is within $" . $siteMinB . " -> $" . $siteMaxB . "");
							} else {

								if ($plan == 'LEVEL3' && $amount < $siteMinC) {
									header("location:deposit?error=Error! `" . $planC . " Plan` is within $" . $siteMinC . " -> $" . $siteMaxC . "!");
								} else {

									if ($plan == 'LEVEL3' && $amount > $siteMaxC) {
										header("location:deposit?error=Error! `" . $planC . " Plan` is within $" . $siteMinC . " -> $" . $siteMaxC . "!");
									} else {

										if ($plan == 'LEVEL4' && $amount < $siteMinD) {
											header("location:deposit?error=Error! `" . $planD . " Plan` is within $" . $siteMinD . " -> $" . $siteMaxD . "!");
										} else {

											if ($plan == 'LEVEL4' && $amount > $siteMaxD) {
												header("location:deposit?error=Error! `" . $planD . " Plan` is within $" . $siteMinD . " -> $" . $siteMaxD . "!");
											} else {

												if ($plan == 'LEVEL5' && $amount < $siteMinE) {
													header("location:deposit?error=Error! `" . $planE . " Plan` is within $" . $siteMinE . " -> $" . $siteMaxE . "!");
												} else {

													$fields = array('id', 'transaction_id', 'email', 'amount', 'intrest_growth', 'deposit_status', 'deposit_category', 'description', 'place_order', 'received_status', 'payout_consent', 'day_counter', 'date_created', 'total_not_paid', 'total_paid', 'btc_address', 'ethereum_address', 'plan_type', 'coin_type', 'coin_value', 'expire_time', 'packagetype', 'status_url', 'invest_week_day', 'transaction_hash', 'perfectmoney', 'ltc', 'duration');

													$tID = $bassic->randGenerator() . $cal->getLastID($deposit_tb);
													$intrest_growth = 0;
													$deposit_status = 'pending';
													$category = $coin . '-INVEST';
													$category_REF = $coin . '-INVEST-REFERRAL';
													$description = $coin . '-INC';
													$place_order = 'no';
													$received_status = 'no';
													$payout_consent = 'no';
													$day_counter = 0;
													$total_not_paid = 0;
													$total_paid = 0;
													$btc_address = 'none';
													$ethereum_address = 'none';
													$plan_type = $plan;
													$coin_type = $coin;
													$coin_value = '';
													$expire_time = '';
													$status_url = '';
													$invest_week_day = date('D');
													$transaction_hash = '';
													$perfectmoney = '';
													$ltc = '';
													$package = $inv_type;
													$bonus_level = 1;
													$coin_type_ref = 'USDT';
													if ($plan == 'LEVEL1') {
														$duration = '7';
													}
													if ($plan == 'LEVEL2') {
														$duration = '10';
													}
													if ($plan == 'LEVEL3') {
														$duration = '14';
													}
													if ($plan == 'LEVEL4') {
														$duration = '30';
													}
													if ($plan == 'LEVEL5') {
														$duration = '7';
													}

													$values = array(null, $tID, $sqli->getEmail($_SESSION['user_code']), $amount, $intrest_growth, $deposit_status, $category, $description, $place_order, $received_status, $payout_consent, $day_counter, $bassic->getDate(), $total_not_paid, $total_paid, $btc_address, $ethereum_address, $plan_type, $coin_type, $coin_value, $expire_time, $package, $status_url, $invest_week_day, $transaction_hash, $perfectmoney, $ltc, $duration);


													$pasER = $cal->depositBTC($deposit_tb, $fields, $values);

													if ($pasER == 100) {
														///referral
														$ref = $cal->selectFrmDB($user_tb, 'referral_username', 'email', $sqli->getEmail($_SESSION['user_code']));
														if ($ref == "") {
														} else {
															if ($package == 'LEVEL4') {
																$referral_cut = $amount * ($siteRefD / 100);
															} else if ($package == 'LEVEL3') {
																$referral_cut = $amount * ($siteRefC / 100);
															} else if ($package == 'LEVEL2') {
																$referral_cut = $amount * ($siteRefB / 100);
															} else if ($package == 'LEVEL1') {
																$referral_cut = $amount * ($siteRefA / 100);
															} else {
																$referral_cut = $amount * ($siteRefA / 100);
															}
															$Ref_tID = $bassic->randGenerator() . $cal->getLastID($deposit_tb);
															$re_M = $cal->selectFrmDB($user_tb, 'referral_username', 'email', $sqli->getEmail($_SESSION['user_code']));
															$ref_emm = $cal->selectFrmDB($user_tb, 'email', 'client_username', $re_M);

															/* $sql = "SELECT * FROM $life_one_bonus WHERE `boss_email`='".$ref_emm."' and `ref_email`='".$sqli->getEmail($_SESSION['user_code'])."' ";
						$result = query_sql($sql);
						if(mysqli_num_rows($result)>0){
							
						}else{} */

															$fieldsR = array('id', 'transaction_id', 'referral_email', 'referred_email', 'amount', 'balance', 'deposit_category', 'status', 'date_created', 'plan_type', 'coin_type', 'referral_level');

															$valuesR = array(null, $tID, $ref_emm, $sqli->getEmail($_SESSION['user_code']), $referral_cut, $referral_cut, $category_REF, 'pending', $bassic->getDate(), $plan_type, $coin_type_ref, $bonus_level);

															$cal->insertDataB($referral_tb, $fieldsR, $valuesR);

															/* 	$feildY = array('boss_email','ref_email');
							$valueY = array($ref_emm,$sqli->getEmail($_SESSION['user_code']));
							$cal->insertDataB($life_one_bonus, $feildY, $valueY); */
														}
														////send to API for payment
														$payername = $cal->selectFrmDB($user_tb, 'first_name', 'email', $sqli->getEmail($_SESSION['user_code']));
														$payerLname = $cal->selectFrmDB($user_tb, 'last_name', 'email', $sqli->getEmail($_SESSION['user_code']));
														$payerusername = $cal->selectFrmDB($user_tb, 'client_username', 'email', $sqli->getEmail($_SESSION['user_code']));

														$_SESSION['plan'] = $plan;
														$_SESSION['amt'] = $amount;
														$_SESSION['currency'] = $coin;
														$_SESSION['TID'] = 'Transaction ID= ' . $tID . ' --//-- Customer Email= ' . $sqli->getEmail($_SESSION['user_code']) . ' --//-- Deposit Category= ' . $category . ' --//-- Customer Name= ' . $payername . ' ' . $payerLname . ' --//-- Customer Username= ' . $payerusername;
														$_SESSION['TIDer'] = $tID;
														$_SESSION['user_email'] = $sqli->getEmail($_SESSION['user_code']);
														$_SESSION['user_name'] = $payername . ' ' . $payerLname;

														$email_call->paymentNotification($amount, $plan_type, $coin_type, $tID, $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'first_name'), $sqli->getEmail($_SESSION['user_code']));
														$email_call->adminDepositNoticeNotsuccessf($amount, $plan_type, $coin_type, $tID, $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'first_name'), $sqli->getEmail($_SESSION['user_code']));

														//header("location:https://gocps.net/9l0ssi5miy315n3jw5h6pecpc/");
														if ($coin == "PM") {
															header("location:payment-invoice");
															//header("location:deposit-pm");
														} else {
															header("location:try/try.php");
														}
													} else {
														$msg = $pasER;
														header("location:deposit?error=" . $pasER);
													}
												}
											}
										}
									} //end PREMIUM
								} //end BASIC
							} //end BASIC
						} //limit
					}
				}
			}
		} else {
			header("location:deposit?error=Please enter a valid amount to invest!");
		}
	} ///numeric
	/*}else{
	header("location:deposit?error=Please you have to update your <a href='my-account'>profile</a> before you can continue some informations are missing! Thanks");
}*/
}
?>