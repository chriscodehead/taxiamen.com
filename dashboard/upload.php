<?php
require_once('include.php');
$title = 'Upload | '.$siteName;
$desc = '';
require_once('check-verification.php');
require_once('head.php');?>
<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php require_once('side-bar.php');?>
            <div class="nk-wrap ">
                <?php require_once('header.php');?>
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><a class="back-to" href="./"><em class="icon ni ni-arrow-left"></em><span>Home</span></a></div>
                                        <h2 class="nk-block-title fw-normal">Upload contents</h2>
                                        <div class="nk-block-des">
                                            <p>Hi, welcome to our upload section. In this section you can either upload links to some digital content you think will be helpful to the community the idea is to help people who might want to learn a particular digital skill have access to your used materials like a course you purchase and want to share it for free to help other who might not have the money to purchase such course. We are doing this to encourage each other and to help the community grow faster by empowering each other.</p>
                                            <p>In the other hand if you are a content creator you can also list your content on this platform and set a price to it as well as the commission you would like people to earn when the help you sale your digital products see it as an affiliate thing. Also note the platform will be taking a certain percentage when you product sell you can check the <a href="pricing">pricing section</a> to find out more.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Toast Position</h5>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <ul class="align-center flex-wrap g-2">
                                                <li><a href="#" class="btn btn-primary eg-toastr-default">Default</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-bottom-center">Bottom Center</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-bottom-left">Bottom left</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-bottom-right">Bottom Right</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-bottom-full">Bottom Full Width</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-top-center">Top Center</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-top-left">Top left</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-top-right">Top Right</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-top-full">Top Full Width</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Toast States</h5>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <ul class="align-center flex-wrap g-2">
                                                <li><a href="#" class="btn btn-success eg-toastr-success">Success</a></li>
                                                <li><a href="#" class="btn btn-info eg-toastr-info">Info</a></li>
                                                <li><a href="#" class="btn btn-warning eg-toastr-warning">Warning</a></li>
                                                <li><a href="#" class="btn btn-danger eg-toastr-error">Error</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Toast Style</h5>
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <ul class="align-center flex-wrap g-2">
                                                <li><a href="#" class="btn btn-success eg-toastr-with-title">Message With Title</a></li>
                                                <li><a href="#" class="btn btn-primary eg-toastr-no-icon">No Icon Version</a></li>
                                                <li><a href="#" class="btn btn-dark eg-toastr-dark">Dark Version</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
<?php require_once('footer.php');?>