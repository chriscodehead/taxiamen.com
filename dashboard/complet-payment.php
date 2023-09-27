<?php
require_once('include.php');
$title = 'Complete Payment | '.$siteName;
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
                            <div class="kyc-app wide-sm m-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">Send Payment</h2>
                                        <div class="nk-block-des">
                                            <p>To be eligible to participate in our <?php print $siteName;?> program deposit $<?php print $initial_pay;?> to get your account activated so you can start earning when you refer other users to our platform. <i class="fa fa-spin"></i> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="nk-refwg">
                                            <div style="width: 100%;" class="nk-refwg-invite card-inner">
                                                <div class="nk-refwg-head g-3">
                                                    <div class="nk-refwg-title">
                                                        <h5 class="title">Pay to wallet address:</h5>
                                                    </div>
                                                    <!--<div class="nk-refwg-action">
                                                        <a target="_blank" href="<?php /*print $siteLink;*/?>?ref=<?php /*print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'client_username');*/?>" class="btn btn-primary">Invite</a>
                                                    </div>-->
                                                </div>
                                                <div class="nk-refwg-url">
                                                    <div class="form-control-wrap">
                                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                                        <div class="form-icon">
                                                            <em class="icon ni ni-link-alt"></em>
                                                        </div>
                                                        <?php //print $payment_address;?>
                                                        <input type="text" class="form-control copy-text" id="refUrl" value="<?php print $_SESSION['wallet'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="nk-refwg">
                                            <div style="width: 100%;" class="nk-refwg-invite card-inner">
                                                <div class="nk-refwg-head g-3">
                                                    <div class="nk-refwg-title">
                                                        <h5 class="title">Amount to pay:</h5>
                                                    </div>
                                                </div>
                                                <div class="nk-refwg-url">
                                                    <div class="form-control-wrap">
                                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl1" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                                        <div class="form-icon">
                                                            <em class="icon ni ni-coin-alt"></em>
                                                        </div>
                                                        <input type="text" class="form-control copy-text" id="refUrl1" value="<?php print $initial_pay;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center><a style="margin-bottom: 20px;" href="deposit-success" class="btn btn-primary">Done</a>
                                        </center>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
<?php require_once('footer.php');?>