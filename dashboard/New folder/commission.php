<?php
require_once('include.php');
$title = 'My Referrals | '.$siteName;
$desc = '';
require_once('check-verification.php');
require_once('head.php');?>
<style>
    .circla{
        border-radius: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        background-color: white;
        box-shadow: #CCCCCC 1px 1px 0px 1px;
    }
</style>
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
                        <h3 class="nk-block-title page-title">Commission Earnings</h3>
                        <div class="nk-block-des text-soft">
                            <p></p>
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
                                    <h5 class="title">How you earn</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner p-0" style="overflow: scroll;">
                            <div class="nk-tb-list nk-tb-tnx">

                                <div class="img-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><h5>Category</h5></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>LEVEL 1</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefA;?>%</div></td>
                                        </tr>
                                        <tr>
                                            <td><strong>LEVEL 2</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefB;?>%</div></td>
                                        </tr>
                                        <tr>
                                            <td><strong>LEVEL 3</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefC;?>%</div></td>
                                        </tr>
                                        <tr>
                                            <td><strong>LEVEL 4</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefD;?>%</div></td>
                                        </tr>
                                        <tr style="display: none;">
                                            <td><strong>LEVEL 5</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefE;?>%</div></td>
                                        </tr>
                                        <tr style="display: none;">
                                            <td><strong>LEVEL 6</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefF;?>%</div></td>
                                        </tr>
                                        <tr style="display: none;">
                                            <td><strong>LEVEL 7</strong></td>
                                            <td><div class="circla"><i class="coin ni ni-users text-warning ni-view-x2"></i></div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;">---</div></td>
                                            <td><div style="padding-top: 5px; font-size: 20px;"><?php print $siteRefG;?>%</div></td>
                                        </tr>
                                        </tbody>
                                    </table>
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