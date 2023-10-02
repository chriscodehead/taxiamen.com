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

                          <div class="buysell-nav text-center">
                           <ul class="nk-nav nav nav-tabs nav-tabs-s2">
                               <li class="nav-item">
                                   <a class="nav-link" href="referral-history">Referral History</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="referral-bonus">Referral Bonus</a>
                               </li>
                           </ul>
                       </div>

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
  <div class="col-sm-12 col-lg-12 col-xl-12 col-xxl-4">
<div class="card card-bordered is-dark">
    <div class="nk-wgw">
        <div class="nk-wgw-inner">
            <a class="nk-wgw-name" href="wallets">
                <div class="nk-wgw-icon is-default">
                    <em class="icon ni ni-sign-dollar"></em>
                </div>
                <h5 class="nk-wgw-title title">Bonus Earnings</h5>
            </a>
            <div class="nk-wgw-balance">
                <div class="amount">$<?php print number_format(@$sqli->countAvailableBonus($sqli->getEmail($_SESSION['user_code']))); ?><span class="currency currency-nio">USD</span></div>
            </div>
        </div>
        <div class="nk-wgw-actions">
            <ul>
                <li><a href="deposit"><em class="icon ni ni-arrow-up-right"></em> <span>Deposit</span></a></li>
                <li><a href="withdraw"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a></li>
                <li><a href="<?php print $siteLink;?>?ref=<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'client_username');?>"><em class="icon ni ni-arrow-down-left"></em><span>Invite</span></a></li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Bonus Withdrawal</h4>
                                    <div class="ml-auto">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table width="100%" class="stat table table-strip">
                                        <thead>
                                        <tr>
                                            <th>SELECT PAYMENT TYPE</th>
                                            <th><select id="goTo" name="goTo" class="form-control">
                                                    <!-- <option <?php if(@$_GET['id']=='BTC') print 'selected="selected"'?> value="BTC">BITCOIN</option>
                                                    <option <?php if(@$_GET['id']=='ETH') print 'selected="selected"'?> value="ETH">ETH</option>
                                                    <option <?php if(@$_GET['id']=='BNB') print 'selected="selected"'?> value="BNB">BNB </option> -->
                                                    <option <?php if(@$_GET['id']=='USDT') print 'selected="selected"'?> value="USDT">USDT  </option>
                                                </select></th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="basic-datatable">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Status</th>
                                            <th>Processing</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $select->createReferralWithdrawalALL($sqli->getEmail($_SESSION['user_code']),@$_GET['id']);?>
                                        <tr>
                                            <td colspan="6"><input readonly type="text" id="amt" name="amount" placeholder="" value="0.00" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><button id="bigpushREF" class="btn btn-primary" style="margin-top:25px !important; font-size:16px !important;"> Create Withdrawal  </button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>



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
  <script type="text/javascript">
            $('#bigpushREF').css("cursor","pointer");
            $('#goTo').on('change', function(){
                sweetUnpre('processing...')
                //var baseUrl = '<?php //print $baseurl;?>';
                window.location = 'referral-bonus?id='+$(this).val();
            });

            $(document).ready(function() {
                var ckbox = $("input[name='intrestREF']");
                var chkId = '';
                $('input#intrestREF').on('click', function() {

                    if ($(this).is(':checked')) {
                        chkId = $(this).next('.tamt').val();
                        var oldAMT = $('#amt').val();
                        $('#amt').val(parseInt(oldAMT)+parseInt(chkId));
                    }else{
                        chkId = $(this).next('.tamt').val();
                        var oldAMT = $('#amt').val();
                        $('#amt').val(parseInt(oldAMT)-parseInt(chkId));
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/functionsmain.js"></script>