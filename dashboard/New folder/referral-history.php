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
  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
   <?php $select->getReferralHistory($sqli->getEmail($_SESSION['user_code']));?>
                                    
                            </div><br>
                            <br><br>
                             <p></p><p></p>
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
