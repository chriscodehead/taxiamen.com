<?php
require_once('include.php');
$title = 'Deposit | ' . $siteName;
$desc = '';
require_once('head.php'); ?>

<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php require_once('side-bar.php'); ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php require_once('header.php'); ?>
                <!-- content @s -->


                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="kyc-app wide-sm m-auto">
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
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">Create Investment</h2>
                                        <div class="nk-block-des">
                                            <p>Start earning by creating an investment.</p>
                                        </div>
                                    </div>
                                </div>

                                <?php if (isset($_GET['error']) && !empty($_GET['error'])) { ?>
                                    <div class="alert alert-warning">
                                        <div class="alert-cta flex-wrap flex-md-nowrap">
                                            <div class="alert-text">
                                                <p><?php print @$_GET['error']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <form enctype="multipart/form-data" method="post" action="deposit_btc.php">
                                    <div class="nk-block">
                                        <div class="card card-bordered">


                                            <div class="nk-kycfm">

                                                <div class="nk-kycfm-content">
                                                    <div class="">
                                                        <h5 class="title">Select Investment Type</h5>
                                                        <select id="" name="inv_type" class="form-control form-control-lg">
                                                            <option value="CRYPTO">CRYPTO</option>
                                                            <!-- <option  value="FOREX">FOREX</option>
                        <option value="STOCK">STOCK </option>
                        <option value="LOAN">LOAN</option>
                        <option  value="REAL-ESTATE-INVESTMENT">REAL ESTATE INVESTMENT</option>
                        <option value="FUNDS-INVESTMENT">FUNDS INVESTMENT </option> 
                        <option value="BUSINESS-MANAGEMENT">BUSINESS-MANAGEMENT</option> -->
                                                        </select>
                                                    </div>
                                                </div>


                                                <!--  -->
                                                <div class="nk-kycfm-content">
                                                    <h5 class="title">Select Plan</h5>
                                                    <div class="nk-block">
                                                        <div class="row g-gs">

                                                            <div class="col-sm-6 col-xl-4">
                                                                <div class="card card-bordered h-100">
                                                                    <div class="card-inner">
                                                                        <div class="project">
                                                                            <div class="project-head">
                                                                                <h5><?php print $planA; ?></h5>
                                                                            </div>
                                                                            <div class="project-details">
                                                                                <p>Min $<?php print $siteMinA; ?> - Max $<?php print $siteMaxA; ?></p>
                                                                                <p><?php print $percentageA; ?>%
                                                                                    <?php print $durationA; ?>
                                                                                </p>
                                                                                <p class="cont">
                                                                                    <center>
                                                                                        <div class="user-avatar sm bg-blue"><span>
                                                                                                <input checked value="LEVEL1" type="radio" name="plan" id="plan1"></span>
                                                                                        </div>
                                                                                    </center>
                                                                                </p>
                                                                            </div>
                                                                            <div class="project-progress">
                                                                                <div class="project-progress-details">
                                                                                    <div class="project-progress-percent"></div>
                                                                                </div>
                                                                                <div class="progress progress-pill progress-md bg-light">
                                                                                    <div class="progress-bar" data-progress="93.5"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xl-4">
                                                                <div class="card card-bordered h-100">
                                                                    <div class="card-inner">
                                                                        <div class="project">
                                                                            <div class="project-head">
                                                                                <h5><?php print $planB; ?></h5>
                                                                            </div>
                                                                            <div class="project-details">
                                                                                <p>Min $<?php print $siteMinB; ?> - Max $<?php print $siteMaxB; ?></p>
                                                                                <p><?php print $percentageB; ?>%
                                                                                    <?php print $durationB; ?>
                                                                                </p>
                                                                                <p class="cont">
                                                                                    <center>
                                                                                        <div class="user-avatar sm bg-blue"><span>
                                                                                                <input value="LEVEL2" type="radio" name="plan" id="plan2"></span>
                                                                                        </div>
                                                                                    </center>
                                                                                </p>
                                                                            </div>
                                                                            <div class="project-progress">
                                                                                <div class="project-progress-details">
                                                                                    <div class="project-progress-percent"></div>
                                                                                </div>
                                                                                <div class="progress progress-pill progress-md bg-light">
                                                                                    <div class="progress-bar" data-progress="93.5"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xl-4">
                                                                <div class="card card-bordered h-100">
                                                                    <div class="card-inner">
                                                                        <div class="project">
                                                                            <div class="project-head">
                                                                                <h5><?php print $planC; ?></h5>
                                                                            </div>
                                                                            <div class="project-details">
                                                                                <p>Min $<?php print $siteMinC; ?> - Max $<?php print $siteMaxC; ?></p>
                                                                                <p><?php print $percentageC; ?>%
                                                                                    <?php print $durationC; ?>
                                                                                </p>
                                                                                <p class="cont">
                                                                                    <center>
                                                                                        <div class="user-avatar sm bg-blue"><span>
                                                                                                <input value="LEVEL3" type="radio" name="plan" id="plan3"></span>
                                                                                        </div>
                                                                                    </center>
                                                                                </p>
                                                                            </div>
                                                                            <div class="project-progress">
                                                                                <div class="project-progress-details">
                                                                                    <div class="project-progress-percent"></div>
                                                                                </div>
                                                                                <div class="progress progress-pill progress-md bg-light">
                                                                                    <div class="progress-bar" data-progress="93.5"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xl-4">
                                                                <div class="card card-bordered h-100">
                                                                    <div class="card-inner">
                                                                        <div class="project">
                                                                            <div class="project-head">
                                                                                <h5><?php print $planD; ?></h5>
                                                                            </div>
                                                                            <div class="project-details">
                                                                                <p>Min $<?php print $siteMinD; ?> - Max $<?php print $siteMaxD; ?></p>
                                                                                <p><?php print $percentageD; ?>%
                                                                                    <?php print $durationD; ?>
                                                                                </p>
                                                                                <p class="cont">
                                                                                    <center>
                                                                                        <div class="user-avatar sm bg-blue"><span>
                                                                                                <input value="LEVEL4" type="radio" name="plan" id="plan4"></span>
                                                                                        </div>
                                                                                    </center>
                                                                                </p>
                                                                            </div>
                                                                            <div class="project-progress">
                                                                                <div class="project-progress-details">
                                                                                    <div class="project-progress-percent"></div>
                                                                                </div>
                                                                                <div class="progress progress-pill progress-md bg-light">
                                                                                    <div class="progress-bar" data-progress="93.5"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-xl-4">
                                                                <div class="card card-bordered h-100">
                                                                    <div class="card-inner">
                                                                        <div class="project">
                                                                            <div class="project-head">
                                                                                <h5><?php print $planE; ?></h5>
                                                                            </div>
                                                                            <div class="project-details">
                                                                                <p>Min $<?php print $siteMinE; ?> - Max $<?php print $siteMaxE; ?></p>
                                                                                <p><?php print $percentageE; ?>%
                                                                                    <?php print $durationE; ?>
                                                                                </p>
                                                                                <p class="cont">
                                                                                    <center>
                                                                                        <div class="user-avatar sm bg-blue"><span>
                                                                                                <input value="LEVEL5" type="radio" name="plan" id="plan5"></span>
                                                                                        </div>
                                                                                    </center>
                                                                                </p>
                                                                            </div>
                                                                            <div class="project-progress">
                                                                                <div class="project-progress-details">
                                                                                    <div class="project-progress-percent"></div>
                                                                                </div>
                                                                                <div class="progress progress-pill progress-md bg-light">
                                                                                    <div class="progress-bar" data-progress="93.5"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->


                                                <div class="nk-kycfm-content">
                                                    <div class="">
                                                        <h5 class="title">Amount</h5>
                                                        <input type="text" class="form-control form-control-lg form-control-number" id="amount" name="amount" placeholder="0.055960">
                                                    </div>
                                                </div>

                                                <div class="nk-kycfm-content">
                                                    <div class="nk-kycfm-note">
                                                        <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em>
                                                        <p>Select coin type to make payment.</p>
                                                    </div>
                                                    <ul class="nk-kycfm-control-list g-3">

                                                        <li class="nk-kycfm-control-item">
                                                            <input value="USDT" class="nk-kycfm-control" type="radio" name="coin" id="coin" data-title="coin" checked>
                                                            <label class="nk-kycfm-label" for="coin">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="icon ni ni-tether x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">USDT (<?php print $usdt_network; ?>)</span>
                                                            </label>
                                                        </li>

                                                        <li class="nk-kycfm-control-item">
                                                            <input value="ETH" class="nk-kycfm-control" type="radio" name="coin" id="national-id" data-title="National ID">
                                                            <label class="nk-kycfm-label" for="national-id">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="coin ni ni-ethereum x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">ETH(Ethereum)</span>
                                                            </label>
                                                        </li>

                                                        <li class="nk-kycfm-control-item">
                                                            <input value="BTC" class="nk-kycfm-control" type="radio" name="coin" id="driver-licence" data-title="Driving License">
                                                            <label class="nk-kycfm-label" for="driver-licence">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="coin ni ni-bitcoin x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">BTC(Bitcoin)</span>
                                                            </label>
                                                        </li>


                                                        <li class="nk-kycfm-control-item">
                                                            <input value="BCH" class="nk-kycfm-control" type="radio" name="coin" id="bitcoin-cash" data-title="Bitcoin cash">
                                                            <label class="nk-kycfm-label" for="bitcoin-cash">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="coin ni ni-bitcoin x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">BCH(Bitcoin cash)</span>
                                                            </label>
                                                        </li>


                                                        <li class="nk-kycfm-control-item">
                                                            <input value="XLM" class="nk-kycfm-control" type="radio" name="coin" id="stellar" data-title="stellar">
                                                            <label class="nk-kycfm-label" for="stellar">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="coin ni ni-stellar x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">XLM(Stellar)</span>
                                                            </label>
                                                        </li>

                                                        <li class="nk-kycfm-control-item">
                                                            <input value="XRP" class="nk-kycfm-control" type="radio" name="coin" id="ripple" data-title="ripple">
                                                            <label class="nk-kycfm-label" for="ripple">
                                                                <span class="nk-kycfm-label-icon">
                                                                    <div class="label-icon">
                                                                        <em class="coin ni ni-ripple x4"></em>
                                                                    </div>
                                                                </span>
                                                                <span class="nk-kycfm-label-text">XRP(Ripple)</span>
                                                            </label>
                                                        </li>



                                                    </ul>
                                                    <h6 class="title">To avoid delays when verifying account, Please make sure:</h6>
                                                    <ul class="list list-sm list-checked">
                                                        <li>You have verified your email address.</li>
                                                        <li>You have set up your payment wallet.</li>
                                                        <li>You have filled out your profile correctly.</li>
                                                    </ul>
                                                </div>

                                                <div class="nk-kycfm-footer">
                                                    <div class="nk-kycfm-action pt-2">
                                                        <!-- <button name="payments" type="submit" class="btn btn-lg btn-primary">Proceed to payment</button> -->

                                                        <button id="sub" name="submit" style="display: none;" type="submit" class="btn btn-raised btn-primary btn-round waves-effect"></button>

                                                        <button name="submit" type="button" onClick="invest();" class="btn btn-lg btn-primary theme-button btn btn-raised btn-success waves-effect">Invest Now!</button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="kyc-app wide-sm m-auto">

                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal text-warning"></h2>
                                        <div class="nk-block-des">

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

                <!-- content @e -->
                <?php require_once('footer.php'); ?>
                <script type="text/javascript" src="js/functionsmain.js"></script>
                <script>
                    function invest() {
                        var hr = new XMLHttpRequest();
                        var url = "code_prosessor.php";
                        var amount = document.getElementById('amount').value;
                        var plan = $('input[name="plan"]:checked').val();
                        //document.getElementById('plan').value;
                        var coin = document.getElementById('coin').value;
                        var vars = "amount=" + amount;
                        if (amount == "" || coin == "" || plan == "") {
                            sweetUnpre("Please fill all necessary fields!");
                        } else {
                            if (parseInt(amount) < <?php print $siteMinA; ?>) {
                                sweetUnpre("Error! Min is $<?php print $siteMinA; ?>!");
                            } else {

                                if (plan == 'LEVEL1' && parseInt(amount) < <?php print $siteMinA; ?>) {
                                    sweetUnpre("Error! `<?php print $planA; ?> Plan` Min $<?php print $siteMinA; ?> - Max $<?php print $siteMaxA; ?>");
                                } else {



                                    if (plan == 'LEVEL2' && parseInt(amount) < <?php print $siteMinB; ?>) {
                                        sweetUnpre("Error! `<?php print $planB; ?> Plan` Min $<?php print $siteMinB; ?> - Max $<?php print $siteMaxB; ?>");
                                    } else {



                                        if (plan == 'LEVEL3' && parseInt(amount) < <?php print $siteMinC; ?>) {
                                            sweetUnpre("Error! `<?php print $planC; ?> Plan` Min $<?php print $siteMinC; ?> - Max $<?php print $siteMaxC; ?>");
                                        } else {

                                            if (plan == 'LEVEL4' && parseInt(amount) < <?php print $siteMinD; ?>) {
                                                sweetUnpre("Error! `<?php print $planD; ?> Plan` Min $<?php print $siteMinD; ?> - Max $<?php print $siteMaxD; ?>");
                                            } else {


                                                if (plan == 'LEVEL5' && parseInt(amount) < <?php print $siteMinE; ?>) {
                                                    sweetUnpre("Error! `<?php print $planE; ?> Plan` Min $<?php print $siteMinE; ?> - Max $<?php print $siteMaxE; ?>");
                                                } else {
                                                    $('#sub').click();
                                                }
                                            }
                                        }
                                    }
                                }
                            } //end
                        } //end starter
                    } //else empty
                </script>