<?php 
require_once('../../library.php'); 
require_once('../../lib/sqli-functions.php'); 
require_once('../../lib/basic-functions.php'); 
require_once('../../emails_lib.php');
$cal->checkLogedIN('../../login');
$msg = '';
$fname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');
$lname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');
$btc_address = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'wallet_address');
$email = $sqli->getEmail($_SESSION['user_code']);

	print $plan = $_SESSION['plan'];
	print $amount_to_pay = $_SESSION['amt'];
	print $coin = $_SESSION['currency'];
	print $tID = $_SESSION['TIDer'];

/*  */
require_once('../api/paykassa_sci.class.php'); //the plug-in class to work with SCI, you can download it at the link

    $paykassa_merchant_id = '15802';                 // the ID of the merchant
    $paykassa_merchant_password = 'PRELyuLWSTqXpl7YuVObIWbElEwWHxaa';     // merchant password
    $test = false;                                              // False test mode - off, True - Enabled


    $amount = $amount_to_pay;
    $system = 'tron_trc20';
    $currency = $coin;
    $order_id = $tID;
    $comment = 'Incoming payment from !'.strtoupper($fname.' '.$lname).' with email '.$email;


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


$_SESSION['your_txn_id'] = $_SESSION['TIDer'];
$_SESSION['your_confirms_needed'] = 3;
$_SESSION['currency'] = $currency;
$_SESSION['plan'] = $plan;
$_SESSION['your_address'] = $wallet;
$_SESSION['your_timeout'] = 9994949;
$_SESSION['your_qrlcode_url'] = '';
$_SESSION['your_status_url'] = $url;
//header("location:../payment-invoice");
header("location:../check_payment.php");
        
    }
/*  */



header("location:../check_payment.php");
?>