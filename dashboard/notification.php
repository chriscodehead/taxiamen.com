<?php
require_once('include.php');
$title = 'Notification | '.$siteName;
$desc = '';
require_once('check-verification.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM $news";
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
                                        <h3 class="nk-block-title page-title">Notifications</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>You have some notifications.</p>
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
                                                    <h5 class="title">Notification History</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0" style="overflow: scroll;">
                                            <div class="nk-tb-list nk-tb-tnx">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col"><span>#</span></div>
                                                    <div class="nk-tb-col text-left"><span>Title</span></div>
                                                    <div class="nk-tb-col text-left"><span>Message</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Date</span></div>
                                                    <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-md-block">Action</span></div>
                                                </div>


                                        <?php $sql = query_sql("SELECT * FROM $news ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
                                        if(mysqli_num_rows($sql)>0){ $c=0;
                                            while($row = mysqli_fetch_assoc($sql)){?>
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <div class="nk-tnx-type">
                                                            <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                                                <em class="icon ni ni-arrow-down-left"></em><span style="font-size: 10px;"><?php print $c+1;?></span>
                                                            </div>
                                                            <div class="nk-tnx-type-text">
                                                                <span class="tb-lead"></span>
                                                                <span class="tb-date"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col text-left">
                                                        <span class="tb-amount"><?php print $row['title'];?> <span></span></span>
                                                        <span class="tb-amount-sm"></span>
                                                    </div>
                                                    <div class="nk-tb-col text-left">
                                                        <span class="tb-amount"><?php print $bassic->reduceTextLength($row['news'],50);?> <span></span></span>
                                                        <span class="tb-amount-sm"></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <span class="badge badge-sm badge-dim badge-outline-warning d-md-inline-flex"><?php print $row['date_post'];?></span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-status">
                                                        <a href="./dashboard/notification-details?id=<?php print $row['id'];?>">
                                                        <span class="badge badge-sm badge-dim badge-outline-success d-md-inline-flex">Open</span></a>
                                                    </div>
                                                </div>
                                            <?php $c++;}}else{?>
                                            <h4 style="padding: 20px;">No data found!</h4>
                                            <?php }?>

                                            </div>
                                        </div>

                                        <div class="card-inner">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "./dashboard/notification?page=".($page - 1); } ?>">Prev</a></li>
                                                <li class="page-item"><a class="page-link" href="./dashboard/notification?page=1">1</a></li>
                                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                <li class="page-item"><a class="page-link" href="./dashboard/notification?page=<?php echo $total_pages; ?>">Last</a></li>
                                                <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>"><a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "./dashboard/notification?page=".($page + 1); } ?>">Next</a></li>
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