<?php
require_once('include.php');
$title = 'Deposit | '.$siteName;
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
                    <div class="buysell-nav text-center">
                        <ul class="nk-nav nav nav-tabs nav-tabs-s2">
                            <li class="nav-item">
                                <a class="nav-link" href="all-transaction">All Transaction</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            <h2 class="nk-block-title fw-normal text-warning">Congratulations!!! <i class="icon ni"></i></h2>
                            <div class="nk-block-des">
                                <p>Your deposit was successful allow us a few minutes to activate your account after the 3rd confirmation from blockchain. Thanks</p>
                                <p>
                                <div class="nk-kycfm-footer">
                                    <div class="nk-kycfm-action pt-2">
                                        <a href="./" class="btn btn-lg btn-primary">Back to home</a>
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('footer.php');?>