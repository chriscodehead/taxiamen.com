<?php
require_once('include.php');

if(isset($_POST['sub'])){
    $old = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'rawpass');
    $oldpass = mysqli_real_escape_string($link, $_POST['oldpass']);
    $newpass = mysqli_real_escape_string($link, $_POST['pass']);
    $cpass = mysqli_real_escape_string($link, $_POST['cpass']);
    $passlogh = $bassic->passwordHash($agorithm, $newpass);

    if(!empty($newpass)&&!empty($oldpass)){
        if($newpass==$cpass) {
            if ($old == $oldpass) {
                $feilds = array('password', 'rawpass');
                $value = array($passlogh, $newpass);
                $msg = $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
            } else {
                $msg = "Please enter your correct old password!";
            }
        }else{
            $msg = "Your password dose no match!";
        }
    }else{
        $msg =  "Please fill out necessary fields!";
    }
}

$title = 'Update Password | '.$siteName;
$desc = '';
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
                            <div class="kyc-app wide-sm m-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">Update Password</h2>
                                        <div class="nk-block-des">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($msg)){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php print @$msg;?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php }?>
                                <form enctype="multipart/form-data" action="" method="post">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="nk-kycfm">
                                            <div class="nk-kycfm-head">
                                                <div class="nk-kycfm-count">1</div>
                                                <div class="nk-kycfm-title">
                                                    <h5 class="title">Security Details</h5>
                                                    <p class="sub-title"></p>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-content">
                                                <div class="row g-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Old Password <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input value="" name="oldpass" id="oldpass" type="text" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">New Password <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input value="" name="pass" id="pass" type="text" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input value="" name="cpass" id="cpass" type="text" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-footer">
                                                <div class="nk-kycfm-action pt-2">
                                                    <button type="submit" name="sub" id="sub" class="btn btn-lg btn-primary">Update wallet details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
<?php require_once('footer.php');?>