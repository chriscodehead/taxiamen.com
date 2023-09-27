<?php
require_once('include.php');
require_once('check-verification.php');
$msg = '';
if(isset($_POST['sub'])){
    $payment_wallet = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt');
    $available_balance = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'main_account_balance');
    $amount_to_withdraw = $_POST['amount'];
    $pin = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'pin');
    $security_pin = $_POST['pin'];
    $plan_type = 'REFERRAL';
    $coin_type = $_POST['bs-method'];
    $name = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');

    if($available_balance>$minimum_withdrawal) {
        if ($payment_wallet == "") {
            $msg = 'Please supply your payment wallet address. <a href="add-wallet">Click here to!</a>';
        } else {
            if ($pin == "") {
                $msg = 'Please create a security PIN to continue. <a href="profile-security">Click here to!</a>';
            } else {
                if (!empty($amount_to_withdraw) && !empty($security_pin)) {
                    if ($pin == $security_pin) {
                        if($amount_to_withdraw>=$minimum_withdrawal){
                            if($available_balance>$amount_to_withdraw){
                                $new_account_balance = $available_balance - $amount_to_withdraw;
                                $fields = array('main_account_balance');
                                $values = array($new_account_balance);
                                if($msg = $cal->update($user_tb,$fields,$values,'email',$sqli->getEmail($_SESSION['user_code']))){
                                
                                    $amount_to_withdraw = $amount_to_withdraw - $withdrawal_charge;
                                    $trn_id = $bassic->randGenerator();
                                    $fieldsW = array('id', 'transaction_id', 'email', 'amount', 'status', 'date_time', 'type', 'remove','plan_type','coin_type');
                                    $valuesW = array(null, $trn_id, $sqli->getEmail($_SESSION['user_code']), $amount_to_withdraw, 'processing', $bassic->getDate(), 'Referral Withdrawal','no',$plan_type,$coin_type);
                                    $info = $cal->CreatWithdrawBTC($withdraw_tb, $fieldsW, $valuesW);
                                    $email_call->withdrwalNotification($amount_to_withdraw,$plan_type,'USDT',$trn_id,$name,$sqli->getEmail($_SESSION['user_code']),$payment_wallet);
                                    if($info==88){
                                        $msg = 'Your withdrawal was successful expect payment soon!';
                                    }else{
                                        $msg = 'Unexpected error occurred. Try again later!';
                                    }
                                }else{
                                    $msg = 'Unexpected error occurred. Try again later!';
                                }
                            }else{
                                $msg = 'Insufficient fund to carry out this transaction!';
                            }
                        }else{
                            $msg = 'Please amount to withdraw can not be below $'.$minimum_withdrawal.'!';
                        }
                    } else {
                        $msg = 'The security PIN you entered is incorrect. Please try again!';
                    }
                } else {
                    $msg = 'Please fill out all required fields correctly! eg(Amount to withdraw, Enter Security PIN)';
                }
            }
        }
    }else{
        $msg = 'You do not have enough balance to carry out this transaction!';
    }
}

$title = 'Withdraw Funds | '.$siteName;
$desc = '';
require_once('head.php');?>
<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php require_once('side-bar.php');?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php require_once('header.php');?>
                <!-- content @s -->
<div class="nk-content nk-content-fluid">
<div class="container-xl wide-lg">
<div class="nk-content-body">
<div class="buysell wide-xs m-auto">
    <div class="buysell-nav text-center">
        <ul class="nk-nav nav nav-tabs nav-tabs-s2">
            <li class="nav-item">
                <a class="nav-link" href="withdrawal-history">Withdrawal History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="all-transaction">All Transaction</a>
            </li>
        </ul>
    </div>
    <div class="buysell-title text-center">
        <h2 class="title">Withdraw Your Referral Earnings!</h2>
    </div>
    <div class="buysell-block">
        <?php if(!empty($msg)){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php print @$msg;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <form action="" method="post" enctype="multipart/form-data" class="buysell-form">
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label">Available Account Balance</label>
                </div>
                <input type="hidden" value="btc" name="bs-currency" id="buysell-choose-currency">
                <div class="dropdown buysell-cc-dropdown">
                    <a href="#" class="buysell-cc-choosen dropdown-indicator" data-toggle="dropdown">
                        <div class="coin-item coin-btc">
                            <div class="coin-icon">
                                <em class="icon ni ni-sign-dollar"></em>
                            </div>
                            <div class="coin-info">
                                <span class="coin-name"><?php print  number_format($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'main_account_balance'),2);?> (USD)</span>
                                <span class="coin-text">Last withdrawal: <?php print $sqli->getLastwithdrawalDate($sqli->getEmail($_SESSION['user_code']));?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="buysell-field form-group">
                <div style="margin-top: 20px;" class="form-label-group">
                    <label class="form-label" for="buysell-amount">Your Payment wallet (USDT: <?php print $usdt_network;?>)</label>
                </div>
                <div class="form-control-group">
                    <span class="text-warning"><?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt');?></span> <a href="add-wallet">Not correct? <u>Update</u></a>
                </div>
                <div style="margin-top: 20px;" class="form-label-group">
                    <label class="form-label" for="buysell-amount">Amount to withdraw: <span class="text-danger">*</span></label>
                </div>
                <div class="form-control-group">
                    <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="0.055960">
                </div>
                <div class="form-note-group">
                    <span class="buysell-min form-note-alt">Minimum: <?php print number_format($minimum_withdrawal,2);?> USD</span>
                    <span class="buysell-min form-note-alt">Withdrawal Chrage: <?php print number_format($withdrawal_charge,2);?> USD</span>
                </div>
                <div style="margin-top: 20px;" class="form-label-group">
                    <label class="form-label" for="buysell-amount">Enter Security PIN: <span class="text-danger">*</span></label>
                </div>
                <div class="form-control-group">
                    <input type="text" class="form-control form-control-lg form-control-number" id="pin" name="pin" placeholder="">
                </div>
            </div>
            <div class="buysell-field form-group">
                <div class="form-label-group">
                    <label class="form-label">Payment Method: <span class="text-danger">*</span></label>
                </div>
                <div class="form-pm-group">
                    <ul class="buysell-pm-list">
                        <li class="buysell-pm-item">
                            <input value="USDT" checked class="buysell-pm-control" type="radio" name="bs-method" id="pm-USDT" />
                            <label class="buysell-pm-label" for="pm-USDT">
                                <span class="pm-name">USDT</span>
                                <span class="pm-icon"><em class="icon ni ni-tether"></em></span>
                            </label>
                        </li>
                        <!--<li class="buysell-pm-item">
                            <input disabled class="buysell-pm-control" type="radio" name="bs-method" id="pm-BTC" />
                            <label class="buysell-pm-label" for="pm-BTC">
                                <span class="pm-name">BTC</span>
                                <span class="pm-icon"><em class="icon ni ni-bitcoin"></em></span>
                            </label>
                        </li>
                        <li class="buysell-pm-item">
                            <input disabled class="buysell-pm-control" type="radio" name="bs-method" id="pm-ETH" />
                            <label class="buysell-pm-label" for="pm-ETH">
                                <span class="pm-name">ETH</span>
                                <span class="pm-icon"><em class="icon ni ni-ethereum"></em></span>
                            </label>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="buysell-field form-action">
                <button name="sub" class="btn btn-lg btn-block btn-primary">Continue to withdrawal</button>
            </div>
            <div class="form-note text-base text-center">Note: Transfer fee may be included.</div>
        </form>
    </div>
</div>
</div>
</div>
</div>
                <!-- content @e -->
<?php require_once('footer.php');?>