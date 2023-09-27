<?php
require_once('include.php');

if(isset($_POST['sendmailac'])){
    $_SESSION['error2'] ='';
    $emailfgt = $_POST['emailac'];
    if(!empty($emailfgt)){
        if(!empty($cal->checkifdataExists($emailfgt,'email',$user_tb,'Exist'))){
            $passwordh = $cal->selectFrmDB($user_tb,'password','email',$emailfgt);
            $cet = $email_call->ActivateMail($emailfgt,$passwordh);
            if(!empty($cet)){
                $msg = $cet;
            }
        }else{
            $msg  = 'Email not found in database. Ensure you typed it correctly!';
        }
    }
}

$title = 'Verify Account | '.$siteName;
$desc = '';
require_once('head.php');?>
<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">

        <div class="nk-main ">
            <?php require_once('side-bar.php');?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php require_once('header.php');?>
                <!-- content @s -->
                <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="yes"){?>
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                <div class="nk-block-head-content text-center">
                                    <h2 class="nk-block-title fw-normal">Hello, <?php print $firstname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name').' '.$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');?>!</h2>
                                    <div class="nk-block-des">
                                        <p>Welcome to <strong> <?php print $siteName;?></strong>. You are few steps away from completing your account registration. These are required to start earning on our platform! Let’s get started!</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-custom-s1 card-bordered">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="card-inner-group h-100">
                    <div class="card-inner">
                        <h5>Let’s Finish Registration</h5>
                        <p>Only few minutes required to complete your registration and set up your account.</p>
                    </div>
                    <div class="card-inner">
                        <ul class="list list-step">
                            <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=='no'){ $a=0; $aa=0;?>
                                <li class="list-step-curren"><a data-toggle="modal" href="#myModalAC"  style="color:#06C; font-size:16px;">Verify email address</a></li>
                            <?php }else{ $a=33.3333333333; $aa=1;?>
                                <li class="list-step-done" style="color: gold;">Email address Verified</li>
                            <?php }?>

                            <!--<li class="list-step-current">Verify your identity (KYC)</li>-->

                            <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no'){ $b=0; $bb=0;?>
                                <li class="list-step-curren"><a href="deposit">Verify account</a></li>
                            <?php }else{ $b=33.3333333333; $bb=1;?>
                                <li class="list-step-done" style="color: gold;">Account Verified <em class="icon ni ni-star-fill text-warning"></em></li>
                            <?php }?>

                            <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')==''){ $c=0; $cc=0;?>
                                <li class="list-step-curren"><a href="add-wallet">Set up payment wallet</a></li>
                            <?php }else{ $c=33.3333333333; $cc=1;?>
                                <li class="list-step-done" style="color: gold;">Payment wallet added</li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="card-inner">
                        <div class="align-center gx-3">
                            <div class="flex-item">
                                <div class="progress progress-sm progress-pill w-80px">
                                    <div class="progress-bar" data-progress="<?php print $a+$b+$c;?>"></div>
                                </div>
                            </div>
                            <div class="flex-item">
                                <span class="sub-text sub-text-sm text-soft"><?php print $aa+$bb+$cc;?>/3 Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-8">
                <div class="card-inner card-inner-lg h-100">
                    <div class="align-center flex-wrap flex-md-nowrap g-3 h-100">
                        <div class="nk-block-image w-200px flex-shrink-0 order-first order-md-last">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 113.9">
                                <path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                <path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe" />
                                <rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff" />
                                <rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff" />
                                <rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe" />
                                <rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                <rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                <rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                <rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe" />
                                <rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe" />
                                <rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe" />
                                <path d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                <path d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                <path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                <path d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z" transform="translate(-4 -2.1)" fill="#9cabff" />
                                <path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a" />
                                <path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff" /></svg>
                        </div>
                        <div class="nk-block-content">
                            <div class="nk-block-content-head">
                                <h4>Complete Account Verification</h4>
                                <span class="sub-text sub-text-sm text-soft"></span>
                            </div>
                            <p>Why am i seeing this page? Looks like you have not verified your account yet. Please verify your account to get full access to <strong><?php print $siteName;?></strong>.</p>
                            <ul class="list list-sm list-checked">
                                <li>Add <?php print $usdt_network;?>(USDT) Wallet Address for payouts <span></span></li>
                                <li>Verify your email address <span>(eg: yourname@domain.com)</span></li>
                                <li>Verify your account by making your first payment starting from $<?php print $siteMinA;?>.</li>
                            </ul>
                            <a href="deposit" class="btn btn-lg btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            <?php require_once('info.php');?>
                        </div>
                    </div>
                </div>
                <?php }else{?>
                <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                    <div class="nk-block-head-content text-center">
                        <h2 class="nk-block-title fw-normal">Nice, <?php print $firstname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name').' '.$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');?>!</h2>
                        <div class="nk-block-des">
                            <p>Welcome to your <strong> <?php print $siteName;?> Dashboard</strong>. Good job your account is verified you can now start referring to earn!</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-custom-s1 card-bordered">
                        <div class="row no-gutters">
                            <div class="col-lg-12" style="padding-bottom: 20px; padding-top: 20px;"><center><a href="./" class="btn btn-lg btn-primary">Get Started</a></center></div>
                        </div>
                    </div>
                </div>
                <?php require_once('info.php');?>
            </div>
        </div>
    </div>
                <?php }?>
                <!-- content @e -->

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAC" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Resend Email For Account Activation?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your email address below to receive email activation link.<br />(Check your email for email activation link.)</p>
                        <input type="text" value="<?php if(!empty($sqli->getEmail($_SESSION['user_code']))) print $sqli->getEmail($_SESSION['user_code']);?>" name="emailac" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button name="sendmailac" class="btn btn-theme" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->

<?php require_once('footer.php');?>