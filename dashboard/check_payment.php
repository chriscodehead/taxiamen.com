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
    <!-- <div class="buysell-nav text-center">
        <ul class="nk-nav nav nav-tabs nav-tabs-s2">
            <li class="nav-item">
                <a class="nav-link" href="withdrawal-history">Withdrawal History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="all-transaction">All Transaction</a>
            </li>
        </ul>
    </div> -->
    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
        <div class="nk-block-head-content text-center">
            <h2 class="nk-block-title fw-normal">Make Payments</h2>
            <div class="nk-block-des">
                <p></p>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['error']) && !empty($_GET['error'])){?>
    <div class="alert alert-warning">
        <div class="alert-cta flex-wrap flex-md-nowrap">
            <div class="alert-text">
                <p><?php print @$_GET['error'];?></p>
            </div>
        </div>
    </div>
    <?php }?>

    
        <div class="nk-block">
        <div class="card card-bordered">


            <div class="nk-kycfm">


           <div class="row">

            <div class="col-xl-12 col-xxl-12 col-lg-12">
                <div class="">
                    <div class="card profile-card">
                        <div class="card-body">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <h3>
                    Transaction (<small style="color: #367713;"><?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');?></small>)
                </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </div>

<section class="content">
<div class="row">
<div class="dashboard-user-content settings-panel">
    <div class="user-settings-content">
        <!-- /.settings-nav -->
        <div class="tab-content settings-tab-content">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <p class="col-md-12 col-md-offset-1 alert fadeInUp theAlert1" style="font-size: 12px; text-transform: lowercase">
                                    <strong class="text-uppercase text-center">Status: </strong> Waiting for funds <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                </p>
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row text-center">
                                        <span class="col-md-4 theTitle">Transsaction ID: </span>
                                        <span class="col-md-8"> <?php echo $_SESSION['your_txn_id']; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                                    <div class="row text-center">
                                        <span class="col-md-4 theTitle">Amount in <?php print $_SESSION['currency'];?>: </span>
                                        <span class="col-md-8">
<?php echo  $_SESSION['currency']."($".$_SESSION['amt'].") ( Total No of confirms:".  $_SESSION['your_confirms_needed']." )"; ?>
                                            <div class="input-group col-md-12">
    <input type="text" class="form-control" id="moo" value="<?php echo $_SESSION['amt']; ?>">
    <span class="input-group-btn">
        <button id="copy-button" style="background-color: red; color:white;" class="btn btn-default copyBtn" data-clipboard-target="#moo" type="button">Copy Amount</button>
    </span>
</div>
</span>
                                    </div>
                                </div>

                                <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                                    <div class="row text-center">
                                        <span class="col-md-4 theTitle">Pay to Address: </span>
                                        <span class="col-md-8">
    <div class="input-group col-md-12 ">
        <input type="text" class="form-control" id="mooo" value="<?php echo $_SESSION['your_address']; ?>">
        <span class="input-group-btn">
            <button  id="copy-button" style="background-color: red; color:white;" class="btn btn-default copyBtn" data-clipboard-target="#mooo" type="button">Copy Address</button>
        </span>
    </div>
    <span class="col-md-8" style="font-size: 10px;"><?php echo $_SESSION['your_address']; ?></span>
</span>
                                    </div>
                                </div>

                                <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                                    <div class="row text-center">
                                        <span class="col-md-4 theTitle">Timer: </span>
                                        <span class="col-md-8" id="time"> </span>
                                    </div>
                                    <input type="hidden" value="<?php echo $_SESSION['your_timeout'] ?>" id="getTime">
                                    <input type="hidden" value="<?php echo $_SESSION['TIDer'] ?>" id="getTranId">
                                </div>
                            </div>

                            <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                                <div class="row text-center">
                                    <span class="col-md-4 theTitle">Scan Code: </span>
                                    <span class="col-md-8"> 
                                    <?php 
                                    if($_SESSION['currency']='BTC'){
                                        $coin_c = 'bitcoin';
                                        }
                                        if($_SESSION['currency']='USDT'){
                                        $coin_c = 'usdt';
                                        }
                                    ?>
                                    <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:<?php echo $_SESSION['your_address'];?>?amount=<?php echo sprintf('%.08f', $_SESSION['your_amount']);?>">

                                        <br><span style="font-size: 10px;"><?php echo $_SESSION['your_address'];?></span>
                                        </span></div><p></p>
                            </div>
                        </div>

                        <!-- <div class="col-md-10 col-md-offset-1 text-center">
                            <a target="_blank" href="<?php echo $_SESSION['your_status_url'] ?>" style="font-size: 11px !important; background-color:#30a5ff; border-color: #30a5ff; " class="btn btn-warning topmargin_40">
                                View Transaction Status
                            </a>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>


        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


                

            </div>
        </div>
    </div>
   
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
<?php require_once('footer.php');?>
    <script type="text/javascript" src="js/functions.js"></script>

    <!--<script src="js/dist/clipboard.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script type="text/javascript">
        (function(){
            new Clipboard('.copyBtn');
        })();
    </script>
    <script type="text/javascript">

        function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt(timer / 3600, 10)
                minutes = Math.floor(parseInt(timer % 3600, 10)/60);
                seconds = parseInt(timer % 60, 10);

                //hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + "h" + ":" + minutes + "m" + ":" + seconds + "s";
                //alert(minutes)
                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        function getDate(){
            var fiveMinutes = document.getElementById("getTime").value;

            display = document.querySelector("#time");
            startTimer(fiveMinutes, display);
        }

        getDate();


        function checkPaymentStatus(){

            var theId = $("#getTranId").val() ;

            $.post("checkStatus.php", {theId:theId}, function(data, status){
                //alert(data)
                if(data == 1){
                    $(".theAlert2").removeClass("hidden");
                    $(".theAlert1").addClass("hidden")
                }
            })

        }
        setInterval(function(){
            checkPaymentStatus()
        }, 10000)

    </script>
    <style>
        .theTitle{
            font-weight: bold !important;
            font-size: 18px !important;
            color: black !important;
            text-align: right;

        }
        .check_img{
            text-align: left !important;
        }
        .theMainHolder{
            text-align: left;
        }
        @media (max-width: 767px) {
            .theTitle{
                font-weight: bold !important;
                font-size: 18px !important;
                color: black !important;
                text-align: left;
            }
            .check_img{
                text-align: right !important;
            }
            .theMainHolder{
                text-align: center;
            }
        }
        @media (min-width: 768px) {
            .theTitle{
                font-weight: bold !important;
                font-size: 18px !important;
                color: black !important;
                text-align: right;
            }
            .check_img{
                text-align: left !important;
            }
            .theMainHolder{
                text-align: left;
            }
        }
        @media (min-width: 1200px) {
            .theTitle{
                font-weight: bold !important;
                font-size: 18px !important;
                color: black !important;
                text-align: right;
            }
            .check_img{
                text-align: left !important;
            }
            .theMainHolder{
                text-align: left;
            }
        }
    </style>