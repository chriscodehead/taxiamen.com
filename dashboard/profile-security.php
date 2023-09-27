<?php
require_once('include.php');

if(isset($_POST['sub'])){
    $pin = mysqli_real_escape_string($link, $_POST['pin']);
    $opin = mysqli_real_escape_string($link, $_POST['opin']);
    if(empty($opin)){
        if(is_numeric($pin)){
            if(strlen($pin)>4){
                $msg =  "PIN should be a maximum of four digits!";
            }else{
                if(!empty($pin)){
                    $feilds = array('pin');
                    $value = array($pin);
                    $msg = $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
                }else{
                    $msg =  "Please enter a valid Security PIN!";
                }
            }
        }else{
            $msg =  "PIN should be a numeric value .eg(1234)!";
        }
    }else{
        $oldpin = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'pin');
        if($opin==$oldpin){
            if(is_numeric($pin)){
                if(strlen($pin)>4){
                    $msg =  "PIN should be a maximum of four digits!";
                }else{
                    if(!empty($pin)){
                        $feilds = array('pin');
                        $value = array($pin);
                        $msg = $cal->update($user_tb, $feilds, $value, 'email', $sqli->getEmail($_SESSION['user_code']));
                    }else{
                        $msg =  "Please enter a valid Security PIN!";
                    }
                }
            }else{
                $msg =  "PIN should be a numeric value .eg(1234)!";
            }
        }else{
            $msg = 'PIN does not match. Please enter your previous pin to continue!';
        }
    }
}

$title = 'Account Security | '.$siteName;
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
                            <h2 class="nk-block-title fw-normal">Add Security PIN</h2>
                            <div class="nk-block-des">
                                <p>Please provide your 4 digit security PIN. This PIN will be needed during fund withdrawal make sure you keep it safe. </p>
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
                                            <?php $pin_val = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'pin');?>
                                            <h5 class="title">PIN Details(<span class="text-warning"><?php if($pin_val) print $pin_val[0].$pin_val[1].'xx';?></span>)</h5>
                                            <p class="sub-title"></p>
                                        </div>
                                    </div>
                                    <div class="nk-kycfm-content">
                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <?php if($pin_val){?>
                                                    <div class="form-group">
                                                        <div class="form-label-group">
                                                            <label class="form-label">Enter old PIN <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="form-control-group">
                                                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" value="" name="opin" id="opin" type="text" class="form-control form-control-lg">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-label-group">
                                                            <label class="form-label">Enter New PIN <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="form-control-group">
                                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" value="" name="pin" id="pin" type="text" class="form-control form-control-lg">
                                                        </div>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="form-group">
                                                        <div class="form-label-group">
                                                            <label class="form-label">Enter Four Digit PIN <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="form-control-group">
                                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" value="" name="pin" id="pin" type="text" class="form-control form-control-lg">
                                                        </div>
                                                        <input type="hidden" name="opin" value="">
                                                    </div>
                                                <?php }?>
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