<?php
require_once('include.php');
$title = 'Notification Details | '.$siteName;
$desc = '';
require_once('check-verification.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){$get_id=$_GET['id'];}else{header("location:./dashboard/");}
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
                                                    <h5 class="title"><?php print $cal->selectFrmDB($news,'title','id',$get_id);?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0">
                                            <div class="nk-tb-list nk-tb-tnx">

                                                <div class="nk-tb-item">
                                                    <p style="padding: 20px;"><?php print $cal->selectFrmDB($news,'news','id',$get_id);?></p>
                                                    <p style="text-align: right; padding: 20px; font-size: 11px;" class="text-primary"><?php print $cal->selectFrmDB($news,'date_post','id',$get_id);?></p>
                                                </div>

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