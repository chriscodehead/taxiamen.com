<?php
require_once('include.php');
$title = 'Profile | '.$siteName;
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
                                        <h2 class="nk-block-title fw-normal">Update Profile</h2>
                                        <div class="nk-block-des">
                                            <p>Ensure you fill out your information's correctly. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="nk-kycfm">
                                            <center>
                                                    <div class="nk-kycfm-head">
                                                        <a onClick="performClick('theFile');" id="point"><img id="btn" style="width:130px; height:130px;" src="<?php print './photo/'.$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'passport');?>" alt="" class="avatar-lg rounded-circle img-thumbnail"></a>
                                                        <div class="nk-kycfm-title">
                                                        <h5 class="title" style="margin-left: 10px;"> Tap to edit</h5>
                                                        </div>
                                                        <input style="display: none;" class="hidden cropper-source" id="theFile" type="file" data-handler="" data-width="320" data-height="320" data-attribute="photo" data-preview="<?php print '../photo/'.$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'passport');?>"/>
                                                    </div>
                                            </center>
                                            <div class="nk-kycfm-head">
                                                <div class="nk-kycfm-count">01</div>
                                                <div class="nk-kycfm-title">
                                                    <h5 class="title">Personal Details</h5>
                                                    <p class="sub-title">Your simple personal information required for identification</p>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-content">
                                                <div class="nk-kycfm-note">
                                                    <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em>
                                                    <p>Please type carefully and fill out the form with your personal details.</p>
                                                </div>
                                                <div class="row g-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input readonly value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'client_username');?>" type="text" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text" class="form-control form-control-lg" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');?>"  name="fname" id="fname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text" class="form-control form-control-lg" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');?>" name="lname" id="lname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text" class="form-control form-control-lg" id="email" name="email" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text" class="form-control form-control-lg" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'phone');?>" name="phone" id="phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Sex <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <?php $sex = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'sex');?>
                                                                <select class="form-control" id="sex">
                                                                    <option <?php if($sex=='Male') print 'selected="selected';?> value="Male">Male</option>
                                                                    <option <?php if($sex=='Female') print 'selected="selected';?> value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-head">
                                                <div class="nk-kycfm-count">02</div>
                                                <div class="nk-kycfm-title">
                                                    <h5 class="title">Your Address</h5>
                                                    <p class="sub-title">Your simple personal information required for identification</p>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-content">
                                                <div class="nk-kycfm-note">
                                                    <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></em>
                                                    <p>Your can’t edit these details once you submitted the form.</p>
                                                </div>
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input type="text" id="address" name="address" class="form-control font-fix" placeholder="Home Address" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'address');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-label-group">
                                                                <label class="form-label">City</label>
                                                            </div>
                                                            <div class="form-control-group">
                                                                <input class="form-control" type="text" id="country" name="country" placeholder="Country" value="<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'country');?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="nk-kycfm-footer">
                                                <div class="nk-kycfm-action pt-2">
                                                    <button id="btn" type="button" onClick="updateProfile();" class="btn btn-lg btn-primary">Update your profile <i id="sp2" class="coin ni ni-send"></i></button>
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
<script type="text/javascript" src="./dashboard/js/functionsmain.js"></script>
<script>
    $(document).ready(function(){
        $('#btn').css("cursor","pointer");
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#clik').css("cursor","pointer");
        $('#theFile').on('change',(function(e) {
            var file_data = $('#theFile').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: './dashboard/code_prosessor.php', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    sweetUnpre(php_script_response); // display response from the PHP script, if any
                    setTimeout(refreshThisPage,2500);
                }
            });
            sweetUnpre("Processing...");
        }));
    });
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
