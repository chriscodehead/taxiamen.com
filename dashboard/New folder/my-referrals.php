<?php
require_once('include.php');
$title = 'My Referrals | '.$siteName;
$desc = '';
require_once('check-verification.php');
$username = $cal->selectFrmDB($user_tb,'client_username','email',$sqli->getEmail($_SESSION['user_code']));
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM $user_tb WHERE `referral_username` = '".$username."' ";
$result = query_sql($total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

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
                                        <h3 class="nk-block-title page-title">My Referrals</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>You have a total of <?php print @$sqli->countReferals($cal->selectFrmDB($user_tb,'client_username','email',$sqli->getEmail($_SESSION['user_code'])));?> referrals.</p>
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
                                <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h5 class="title">My Referral History</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0" style="overflow: scroll;">
                                            <div class="nk-tb-list nk-tb-tnx">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col"><span>User</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span>ID</span></div>
                                                    <div class="nk-tb-col text-right"><span>Username</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Status</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Email</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Last Seen</span></div>
                                                </div>

                                        <?php $sql = query_sql("SELECT * FROM $user_tb WHERE `referral_username` = '".$username."' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
                                        if(mysqli_num_rows($sql)>0){ $c=0;
                                            while($row = mysqli_fetch_assoc($sql)){?>
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                                                <em class="icon ni ni-arrow-up-right"></em>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead"><?php print $row['first_name'].' '.$row['last_name'];?></span>
                                                                <span class="tb-date"><?php print $row['date_reg'];?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-lg">
                                                        <span class="tb-lead-sub"><?php print $row['user_code'];?></span>
                                                        <span class="badge badge-dot badge-warning"></span>
                                                    </div>
                                                    <div class="nk-tb-col text-right">
                                                        <span class="tb-amount"><?php print $row['client_username'];?> <span></span></span>
                                                        <span class="tb-amount-sm"></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <span class="badge badge-sm badge-dim badge-outline-warning d-md-inline-flex"><?php  if($row['payment_activation_status']=='yes'){print 'Activated';}else{print 'Pending Activation';}?></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-md-inline-flex"><?php print $row['email'];?></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-md-inline-flex"><?php print $row['last_login'];?></span>
                                                    </div>
                                                </div>
                                            <?php }}else{?>
                                            <h4 style="padding: 20px;">No data found!</h4>
                                            <?php }?>

                                            </div>
                                        </div>

                                        <div class="card-inner">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "my-referrals?page=".($page - 1); } ?>">Prev</a></li>
                                                <li class="page-item"><a class="page-link" href="my-referrals?page=1">1</a></li>
                                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                <li class="page-item"><a class="page-link" href="my-referrals?page=<?php echo $total_pages; ?>">Last</a></li>
                                                <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "my-referrals?page=".($page + 1); } ?>">Next</a></li>
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