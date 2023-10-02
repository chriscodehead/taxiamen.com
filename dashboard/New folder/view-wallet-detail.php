<?php
require_once('include.php');
$title = 'Wallet Detail | '.$siteName;
$desc = '';
$level = $_GET['id'];
require_once('check-verification.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM $referral_tb WHERE `referral_email` = '".$sqli->getEmail($_SESSION['user_code'])."' and `referral_level`='".$level."'";
$result = query_sql($total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if(isset($_POST['pushcom'])){
    $getid = $_POST['pushid'];
    $balance = $cal->selectFrmDB($referral_tb,'balance','id',$getid);
    $status = $cal->selectFrmDB($referral_tb,'status','id',$getid);
    $referral_email = $cal->selectFrmDB($referral_tb,'referral_email','id',$getid);
    $referred_email = $cal->selectFrmDB($referral_tb,'referred_email','id',$getid);
    if($status=='pending'){
        $msg = 'Your commission is awaiting confirmation before you can withdraw!';
    }else{
        if($balance>0){
            $payment_activation_status = $cal->selectFrmDB($user_tb,'payment_activation_status','email',$sqli->getEmail($_SESSION['user_code']));
            $name = $cal->selectFrmDB($user_tb,'first_name','email',$sqli->getEmail($_SESSION['user_code']));
            if($payment_activation_status=='yes'){
                $main_account_balance = $cal->selectFrmDB($user_tb,'main_account_balance','email',$sqli->getEmail($_SESSION['user_code']));
                $new_account_balance = $main_account_balance + $balance;
                $fields = array('main_account_balance');
                $values = array($new_account_balance);
                if($msg = $cal->update($user_tb,$fields,$values,'email',$sqli->getEmail($_SESSION['user_code']))){
                    $fields = array('balance');
                    $values = array(0);
                    $msg = $cal->update($referral_tb,$fields,$values,'id',$getid);
                    $email_call->commissionWithdrawalNotice($name,$sqli->getEmail($_SESSION['user_code']),$balance,$level);
                }else{
                    $msg = 'Unexpected error occurred please try again later. Or contact support '.$siteEmail;
                }
            }else{
                $msg = 'Please activate your account by making the initial $100 deposit to continue!';
            }
        }else{
            $msg = 'Insufficient fund to carry out this transaction!';
        }
    }
}

require_once('head.php');?>
<body class="nk-body bg-white has-sidebar ">
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
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">All LEVEL <?php print $level;?> REFERRAL TRANSACTION</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>You have total <?php print number_format($sqli->countallLevelRefcom($sqli->getEmail($_SESSION['user_code']),$level));?> of <?php print number_format($sqli->countallRefcom($sqli->getEmail($_SESSION['user_code'])));?>  confirmed and unconfirmed  earnings.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li><a href="withdraw" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-send"></em><span>Withdraw</span></a></li>
                                                    <li class="nk-block-tools-opt">
                                                        <div class="drodown">
                                                            <a target="_blank" href="<?php print $siteLink;?>?ref=<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'client_username');?>" class="dropdown-toggle btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">
                                <?php if(!empty($msg)){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php print @$msg;?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php }?>
                                <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h5 class="title">Level <?php print $level;?> earning history</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0" style="overflow: scroll;">
                                            <div class="nk-tb-list nk-tb-tnx">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col"><span>Details</span></div>
                                                    <div class="nk-tb-col"><span>Order</span></div>
                                                    <div class="nk-tb-col text-left"><span>Commission</span></div>
                                                    <div class="nk-tb-col text-left"><span class="">Status</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Action</span></div>
                                                </div>


                                        <?php $sql = query_sql("SELECT * FROM $referral_tb WHERE `referral_email` = '".$sqli->getEmail($_SESSION['user_code'])."' and `referral_level`='".$level."'  ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
                                        if(mysqli_num_rows($sql)>0){ $c=0;
                                            while($row = mysqli_fetch_assoc($sql)){
                                                if($row['status']=='confirmed'){$colo='bg-success-dim text-success'; $colo2='badge-success'; $colo3='dot-success'; $colo4='badge-outline-success';}else{$colo='bg-warning-dim text-warning'; $colo2='badge-warning'; $colo3='dot-warning'; $colo4='badge-outline-warning';}?>
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon <?php print $colo;?>">
                                                                <em class="icon ni ni-arrow-up-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead"><?php print $sqli->getRow($row['referral_email'],'first_name');?> <?php print $sqli->getRow($row['referral_email'],'last_name');?></span>
                                                                <span class="tb-date"><?php print $row['date_created'];?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="tb-lead-sub"><?php print $row['transaction_id'];?></span>
                                                        <span class="badge badge-dot <?php print $colo2;?>">Deposit commission</span>
                                                    </div>
                                                    <div class="nk-tb-col text-left">
                                                        <span class="tb-amount"><?php print $row['balance'];?> <span>USD</span></span>
                                                        <span class="tb-amount-sm"></span>
                                                    </div>
                                                    <div class="nk-tb-col text-left">
                                                        <span class="badge badge-sm badge-dim <?php print $colo4;?>  d-md-inline-flex"><?php print $row['status'];?></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <span class="badge badge-sm badge-dim <?php print $colo4;?>  d-md-inline-flex"><?php if($row['balance']<1){ print 'Insufficient Balance';}else{ if($row['status']=='confirmed'){?>
                                                                <a data-toggle="modal" href="#myModalAC<?php print $row['transaction_id'];?>"> Move your Commission</a>
                                                        <?php }else{?>
                                                                Awaiting confirmation...
                                                        <?php } }?>
                                                        </span>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAC<?php print $row['transaction_id'];?>" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="" enctype="multipart/form-data" method="post">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Move this commission to your main balance?</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <input type="hidden" name="pushid" value="<?php print $row['id'];?>">
                                                                    <div class="modal-body">
                                                                        <p>This action will move this commission to your main balance where you can actually withdraw it to your USDT wallet. Click on the submit button below to continue this process.</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button data-dismiss="modal" class="btn btn-success" type="button">Cancel</button>
                                                                        <button name="pushcom" class="btn btn-warning" type="submit">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- modal -->


                                                </div>
                                            <?php }}else{?>
                                            <h4 style="padding: 20px;">No data found!</h4>
                                            <?php }?>

                                            </div>
                                        </div>

                                        <div class="card-inner">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "view-wallet-detail?page=".($page - 1); } ?>&id=<?php print $level;?>">Prev</a></li>
                                                <li class="page-item"><a class="page-link" href="view-wallet-detail?page=1&id=<?php print $level;?>">1</a></li>
                                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                <li class="page-item"><a class="page-link" href="view-wallet-detail?page=<?php echo $total_pages; ?>&id=<?php print $level;?>">Last</a></li>
                                                <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "view-wallet-detail?page=".($page + 1); } ?>&id=<?php print $level;?>">Next</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
<?php require_once('footer.php');?>