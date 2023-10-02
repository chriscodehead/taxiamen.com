<?php
require_once('include.php');

if(isset($_GET['idd'])&&!empty($_GET['idd'])){
   $id =  $_GET['idd'];
   $ps = $_GET['ps'];

   $fieldsR = array('pause_status');
   $valuesR = array($ps);
   $msg = $cal->update($deposit_tb,$fieldsR,$valuesR,'id',$id);

   $email_id = $cal->selectFrmDB($deposit_tb,'email','id',$id);
   $name_id = $cal->selectFrmDB($user_tb,'first_name','email',$email_id);
   $coin = $cal->selectFrmDB($deposit_tb,'coin_type','id',$id);
   $plan = $cal->selectFrmDB($deposit_tb,'plan_type','id',$id);
   $amount = $cal->selectFrmDB($deposit_tb,'amount','id',$id);

   if($_GET['ps']==0){
       @$email_call->playTransaction($amount,$plan,$coin,$id,$name_id,$email_id);
   }else{
       @$email_call->pauseTransaction($amount,$plan,$coin,$id,$name_id,$email_id);
   }
   header("location:wallets?done=".$msg);
}
if(isset($_GET['done'])&&!empty($_GET['done'])){$msg = $_GET['done'];}

$title = 'My Investment Wallets | '.$siteName;
$desc = '';
require_once('check-verification.php');
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
                            <div class="nk-block-head">
                                <div class="nk-block-between-md">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><a class="back-to" href="wallets"><em class="icon ni ni-arrow-left"></em><span>My Investment Wallets</span></a></div>
                                        <div class="nk-wgwh">
                                            <em class="icon-circle icon-circle-lg icon ni ni-sign-usd"></em>
                                            <div class="nk-wgwh-title h5"> Account Wallets <small>/</small>
                                                <div class="dropdown">
                                                    <a class="dropdown-indicator-caret" data-offset="0,4" href="#" data-toggle="dropdown"><small>USD</small></a>
                                                    <div class="dropdown-menu dropdown-menu-xxs dropdown-menu-center">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-content">
                                        <div class="nk-wg1">
                                            <div class="nk-wg1-group g-2">
                                                <div class="nk-wg1-item mr-xl-4">
                                                    <div class="nk-wg1-title text-soft">Available Balance</div>
                                                    <div class="nk-wg1-amount">
                                                        <div class="amount"><?php print  number_format($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'main_account_balance'),2);?> <small class="currency currency-usd">USD</small></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="card-title-group">
                
                <?php if(!empty($msg)){?>
                    <!-- <div class="row">
                            <div id="go" class=" col-lg-12">
                            <div id="go" class="alert alert-warning" style="text-align: center; color:#333;"><?php print @$msg;?> <i id="remove" class="fa fa-remove pull-right"></i></div>
                            </div>
                    </div> -->
                <?php }?>

                    <div class="card-title">
                        <h5 class="title">My Active Investments <!-- (<a href="wallets">See all</a>) <br>(Remember to turn on your investment between 9am - 1pm everyday). Expect R.O.I from 5pm --></h5>
                    </div>
                </div>
            </div>
            <div class="card-inner p-0" style="overflow: scroll;">
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>S/N</span></div>
                        <div class="nk-tb-col text-right"><span>Capital</span></div>
                        <!-- <div class="nk-tb-col text-right"><span>Status</span></div> -->
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Status</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Accumulated Profit</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Type</span></div>
                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Date</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Package</span></div>
                    </div>




    <?php $sql = query_sql("SELECT * FROM $deposit_tb WHERE `email` = '".$sqli->getEmail($_SESSION['user_code'])."' AND `deposit_status`='confirmed' ORDER BY id DESC ");
                    if(mysqli_num_rows($sql)>0){ $a=0;
                        while($row = mysqli_fetch_assoc($sql)){

                        $day = date('D');
                        $time = date('H');
                                

                        if($row['pause_status']==0){
                        // href="dashboard/wallets?idd='.$row['id'].'&ps=1"
                            $ps = '<a title="Click To Pause"> <i class="btn icon ni ni-pause btn-warning"></i></a>';
                            $statt = '<span class="text-warning">Running...</span>';
                        }else{
                            if($time == '08' || $time == '09' || $time == '10' || $time == '11' || $time == '12' || $time == '13') {
                                $ps = '<a href="dashboard/wallets?idd='.$row['id'].'&ps=0" title="Click To Start" > <i class="btn icon ni ni-play btn-primary"></i></a>';
                                $statt = 'Paused';
                            }else{
                                if($time <'08'){
                                        $ps =  '<small class="text-success">Next Trade Starts From 9am!!</small>';
                                        $statt = 'Paused';
                                    }else{
                                        $ps =  '<small class="text-success">You Misses Out Todays Trade!!</small>';
                                        $statt = 'Paused';
                                    }
                                 }
                        }
                        ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <div class="nk-tnx-type">
                                        <!-- <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                            <em class="icon ni ni-arrow-down-left"></em>
                                        </div> -->
                                        <div class="nk-tnx-type-text">
                                            <span class="tb-lead"><?php print $a+1;?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="nk-tb-col text-right">
                                    <span class="tb-amount">$<?php print $row['amount'];?> <span></span></span>
                                    <span class="tb-amount-sm"></span>
                                </div>
                                <!-- <div class="nk-tb-col text-center">
                                
                                <?php if($day=='Sat' || $day=='Sun'){ print 'Weekend! No Trade';}else{?>
                                   <?php print $ps;?><br>
                                   (<?php print $statt;?>)
                                   <?php }?>
                                </div> -->
                                <div class="nk-tb-col nk-tb-col-status">
                                    <span class="badge badge-sm badge-dim badge-outline-warning d-md-inline-flex"><?php  print $row['deposit_status'];?></span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-status">
                                    $<?php print $row['intrest_growth'];?>
                                </div>
                                
                                <div class="nk-tb-col nk-tb-col-status">
                                    <span class="badge badge-sm badge-dim badge-outline-success d-md-inline-flex"><?php print $row['coin_type'];?></span>
                                </div>
                                <div class="nk-tb-col text-left">
                                    <span class="badge badge-sm badge-dim badge-outline-success d-md-inline-flex"><?php print $row['date_created'];?></span> 
                                    <!-- <?php if($row['pause_status']==0){?>
                                    <div id="the-final-countdown">
                                    <p></p>
                                    </div>
                                    <?php }else{ ?>
                                    <div id="the-final-countstop">00:00:00</div>
                                    <?php }?> -->
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-lead-sub"><?php print $row['packagetype'];?></span>
                                    <span class="badge badge-dot badge-warning"></span>
                                </div>
                            </div>

                            <script>
                            setInterval(function time(){
                            var d = new Date();
                            var hours = <?php print $row['day_counter'];?> - d.getHours();
                            var min = 60 - d.getMinutes();
                            if((min + '').length == 1){
                                min = '0' + min;
                            }
                            var sec = 60 - d.getSeconds();
                            if((sec + '').length == 1){
                                    sec = '0' + sec;
                            }
                            jQuery('#the-final-countdown p').html(hours+':'+min+':'+sec)
                            }, 1000);
                            </script>

                        <?php $a++; }}else{?>

                    <?php }?>

        

    </div>
</div>


                        </div>
                    </div>
                </div>
                            
                        </div>
                    </div>
                </div>
                <!-- content @e -->
<?php require_once('footer.php');?>