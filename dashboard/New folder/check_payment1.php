<?php
require_once('include.php');
$title = 'Deposit';  $active1='active'; $coin='';$plan='';$package='';$sex='';
require_once('head.php');?>
<body>
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<div id="main-wrapper">
    <?php require_once('header.php');?>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
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
                                                                                <strong class="text-uppercase text-center">Status: </strong> Waiting for funds <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>\
                                                                            </p>
                                                                            <div class="col-md-10 col-md-offset-1">
                                                                                <div class="row text-center">
                                                                                    <span class="col-md-4 theTitle">Transsaction ID: </span>
                                                                                    <span class="col-md-8"> <?php echo $_SESSION['your_txn_id']; ?></span>
                                                                                </div>
                                                                            </div>

                                    <div class="col-md-10 col-md-offset-1" style="margin-top: 30px;">
                                        <div class="row text-center">
                                            <span class="col-md-4 theTitle">Amount in BTC: </span>
                                            <span class="col-md-8">
										<?php echo sprintf('%.08f', $_SESSION['your_amount'])." ".$_SESSION['currency']."($".$_SESSION['amt'].") ( Total No of confirms needed:".  $_SESSION['your_confirms_needed']." )"; ?>
                                        <div class="input-group col-md-12">
											<input type="text" class="form-control" id="moo" value="<?php echo sprintf('%.08f', $_SESSION['your_amount']); ?>">
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
											<span class="col-md-8" style="font-size: 12px;"><?php echo $_SESSION['your_address']; ?></span>
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
                                                <span class="col-md-8"> <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:<?php echo $_SESSION['your_address'];?>?amount=<?php echo sprintf('%.08f', $_SESSION['your_amount']);?>"><?php echo $_SESSION['your_address'];?></span></div><p></p>
                                        </div>
                                    </div>

                                    <div class="col-md-10 col-md-offset-1 text-center">
                                        <a target="_blank" href="<?php echo $_SESSION['your_status_url'] ?>" style="font-size: 11px !important; background-color:#30a5ff; border-color: #30a5ff; " class="btn btn-warning topmargin_40">
                                            View Transaction Status
                                        </a>
                                    </div>
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

