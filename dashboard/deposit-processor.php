<?php 
require_once('../con-cot/conn_sqli.php');
require_once('../library.php'); 
require_once('../lib/sqli-functions.php'); 
require_once('../lib/basic-functions.php'); 
require_once('../emails_lib.php'); 
$cal->checkLogedIN('../login');
?>
<?php
$msg = '';
$fname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');
$lname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');
$btc_address = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'wallet_address');
$email = $sqli->getEmail($_SESSION['user_code']);

if(isset($_POST['payments'])){

	$amount = mysqli_real_escape_string($link,htmlentities($_POST['amount']));
	$coin = mysqli_real_escape_string($link,htmlentities($_POST['coin']));
	$amount_to_pay = $amount;

	if(!is_numeric($amount)){
			header("location:deposit?error=Please enter a valid amount!");
		}else{
        if(!empty($amount)&&!empty($coin)){

            $fields = array('id','transaction_id','email','amount','intrest_growth','deposit_status','deposit_category','description','place_order','received_status','payout_consent','day_counter','date_created','total_not_paid','total_paid','btc_address','ethereum_address','plan_type','coin_type','coin_value','expire_time','packagetype','status_url','invest_week_day','transaction_hash','perfectmoney','ltc');

            $tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
            $intrest_growth = 0;
            $deposit_status = 'pending';
            $category = $coin.'-INVEST';
            $category_REF = $coin.'-INVEST-REFERRAL';
            $description = $coin.'-INITIAL-100-DEPOSIT';
            $place_order = 'no';
            $received_status = 'no';
            $payout_consent = 'no';
            $day_counter = 0;
            $total_not_paid = 0;
            $total_paid = 0;
            $btc_address = 'none';
            $ethereum_address = 'none';
            $plan_type = 'Initial Deposit';
            $coin_type = $coin;
            $coin_value = '';
            $expire_time = '';
            $status_url = '';
            $invest_week_day = date('D');
            $transaction_hash = '';
            $perfectmoney = '';
            $ltc = '';
            $usdt = '';
            $package = '';

            $values = array(null,$tID,$sqli->getEmail($_SESSION['user_code']),$amount,$intrest_growth,$deposit_status,$category,$description,$place_order,$received_status,$payout_consent,$day_counter,$bassic->getDate(),$total_not_paid,$total_paid,$btc_address,$ethereum_address,$plan_type,$coin_type,$coin_value,$expire_time,$package,$status_url,$invest_week_day,$transaction_hash,$perfectmoney,$ltc);
            $pasER = $cal->depositBTC($deposit_tb,$fields,$values);

            if($pasER==100){
                //Direct Referral
            $ref = $cal->selectFrmDB($user_tb,'referral_username','email',$sqli->getEmail($_SESSION['user_code']));
                if($ref==""){}else{
                    $referral_cut = $amount*($direct_downline/100);
                    $referral_level = 1;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M = $cal->selectFrmDB($user_tb,'referral_username','email',$sqli->getEmail($_SESSION['user_code']));
                    $ref_emm = $cal->selectFrmDB($user_tb,'email','client_username',$re_M);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M);
                    $email = $ref_emm;
                    $level = 'Direct';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level2 Referral
                print $ref2 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm);
                if($ref2==""){}else{
                    $referral_cut = $amount*($second_downline/100);
                    $referral_level = 2;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M2 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm);
                    $ref_emm2 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M2);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm2,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M2);
                    $email = $ref_emm2;
                    $level = 'Level 2';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level3 Referral
                print $ref3 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm2);
                if($ref3==""){}else{
                    $referral_cut = $amount*($third_downline/100);
                    $referral_level = 3;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M3 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm2);
                    $ref_emm3 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M3);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm3,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M3);
                    $email = $ref_emm3;
                    $level = 'Level 3';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level4 Referral
                print $ref4 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm3);
                if($ref4==""){}else{
                    $referral_cut = $amount*($fourth_downline/100);
                    $referral_level = 4;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M4 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm3);
                    $ref_emm4 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M4);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm4,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M4);
                    $email = $ref_emm4;
                    $level = 'Level 4';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level5 Referral
                print $ref5 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm4);
                if($ref5==""){}else{
                    $referral_cut = $amount*($fifth_downline/100);
                    $referral_level = 5;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M5 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm4);
                    $ref_emm5 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M5);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm5,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));;
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M5);;
                    $email = $ref_emm5;
                    $level = 'Level 5';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level6 Referral
                print $ref6 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm5);
                if($ref6==""){}else{
                    $referral_cut = $amount*($sixth_downline/100);
                    $referral_level = 6;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M6 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm5);
                    $ref_emm6 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M6);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm6,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));;
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M6);;
                    $email = $ref_emm6;
                    $level = 'Level 6';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                //Level7 Referral
                print $ref7 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm6);
                if($ref7==""){}else{
                    $referral_cut = $amount*($seventh_downline/100);
                    $referral_level = 7;
                    $Ref_tID = $bassic->randGenerator().$cal->getLastID($deposit_tb);
                    $re_M7 = $cal->selectFrmDB($user_tb,'referral_username','email',$ref_emm6);
                    $ref_emm7 = $cal->selectFrmDB($user_tb,'email','client_username',$re_M7);
                    $fieldsR = array('id','transaction_id','referral_email','referred_email','amount','balance','deposit_category','status','date_created','plan_type','coin_type','referral_level');
                    $valuesR = array(null,$tID,$ref_emm7,$sqli->getEmail($_SESSION['user_code']),$referral_cut,$referral_cut,$category_REF,'pending',$bassic->getDate(),$plan_type,$coin_type,$referral_level);
                    $cal->insertDataB($referral_tb,$fieldsR,$valuesR);

                    $nameM = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));;
                    $nameR = $cal->selectFrmDB($user_tb,'first_name','client_username',$re_M7);;
                    $email = $ref_emm7;
                    $level = 'Level 7';
                    $email_call->DownlineInvestmentNotice($nameM,$nameR,$email,$referral_cut,$level);
                }

                $email_call->paymentNotification($amount,$plan_type,$coin_type,$tID,$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name'),$sqli->getEmail($_SESSION['user_code']));
                $email_call->adminDepositNoticeNotsuccessf($amount,$plan_type,$coin_type,$tID,$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name'),$sqli->getEmail($_SESSION['user_code']));



    require_once('api/paykassa_sci.class.php'); //the plug-in class to work with SCI, you can download it at the link

    $paykassa_merchant_id = '15802';                 // the ID of the merchant
    $paykassa_merchant_password = 'PRELyuLWSTqXpl7YuVObIWbElEwWHxaa';     // merchant password
    $test = false;                                              // False test mode - off, True - Enabled


    $amount = $amount_to_pay;
    $system = 'tron_trc20';
    $currency = $coin;
    $order_id = $tID;
    $comment = 'Incoming payment from !'.strtoupper($fname).' with email '.$email;


    $paykassa = new PayKassaSCI(
        $paykassa_merchant_id,
        $paykassa_merchant_password,
        $test
    );

    $system_id = [
        "bitcoin" => 11, // supported currencies BTC
        "ethereum" => 12, // supported currencies ETH
        "litecoin" => 14, // supported currencies LTC
        "dogecoin" => 15, // supported currencies DOGE
        "dash" => 16, // supported currencies DASH
        "bitcoincash" => 18, // supported currencies BCH
        "zcash" => 19, // supported currencies ZEC
        "ripple" => 22, // supported currencies XRP
        "tron" => 27, // supported currencies TRX
        "stellar" => 28, // supported currencies XLM
        "binancecoin" => 29, // supported currencies BNB
        "tron_trc20" => 30, // supported currencies USDT
        "binancesmartchain_bep20" => 31, // supported currencies USDT, BUSD, USDC, ADA, EOS, BTC, ETH, DOGE
        "ethereum_erc20" => 32, // supported currencies USDT
    ];

    $res = $paykassa->sci_create_order_get_data(
        $amount,    // required parameter the payment amount example: 1.0433
        $currency,  // mandatory parameter, currency, example: BTC
        $order_id,  // mandatory parameter, the unique numeric identifier of the payment in your system, example: 150800
        $comment,   // mandatory parameter, text commentary of payment example: service Order #150800
        $system_id[$system] // a required parameter, for example: 12 - Ethereum
    );

    if ($res['error']) {        // $res['error'] - true if the error
        echo $res['message'];   // $res['message'] - the text of the error message
        // actions in case of an error
    } else {
        $invoice = $res['data']['invoice'];     // The operation number in the system Paykassa.pro
        $order_id = $res['data']['order_id'];   // The order in the merchant
        $wallet = $res['data']['wallet'];       // Address for payment
        $amount = $res['data']['amount'];       // The amount to be paid may change if the Board is translated into a client
        $system = $res['data']['system'];       // A system in which the billed
        $url = $res['data']['url'];             // The link to proceed for payment
        $tag = $res['data']['tag'];             // Tag to indicate the translation to ripple

        echo 'Send funds to this address '.$wallet . ( !empty($tag) ? ' Tag: ' . $tag : '' ) . ' Balance will be updated automatically.';
        //Send funds to this address 32e6LAW8Nps9GJMSQK4Busm6UUUkUc4tzE. Balance will be updated automatically.
        $_SESSION['url'] = $url;
        $_SESSION['amount'] = $amount;
        $_SESSION['wallet'] = $wallet;
        
    }

                header("location:".$url);
                //header("location:complet-payment");


            }else{
                $msg = $pasER;
            }

        }else{
            header("location:deposit?error=Please enter a valid amount to invest!");
        }
	}///numeric
}
?>