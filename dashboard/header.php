<!-- main header @s -->
<div class="nk-header nk-header-fluid nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="./" class="logo-link">
                    <img width="150" class="logo-light logo-img" src="../img/logo.png" srcset="img/logo.png 2x" alt="logo">
                    <img style="width: 110px;" class="logo-dark logo-img" src="img/logo.png" srcset="../img/logo.png" alt="logo-dark">
                    <span class="nio-version"></span>
                </a>
            </div>
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="no"){?>
                    <a class="nk-news-item">
                        <div class="nk-news-icon">
                            <em class="icon ni ni-card-view"></em>
                        </div>
                        <div class="nk-news-text">
                            <p>Start a side hustle today! <span> Start referring to earn.</span></p>
                            <em class="icon ni ni-external"></em>
                        </div>
                    </a>
                    <?php }else{?>
                        <a target="_blank" class="nk-news-item" href="<?php print $siteLink;?>?ref=<?php print $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'client_username');?>">
                            <div class="nk-news-icon">
                                <em class="icon ni ni-card-view"></em>
                            </div>
                            <div class="nk-news-text">
                                <p>Start a side hustle today! <span> Start referring to earn.</span></p>
                                <em class="icon ni ni-external"></em>
                            </div>
                        </a>
                    <?php }?>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img style="width:40px; height:40px;" src="<?php print '../photo/'.$sqli->getRow($sqli->getEmail($_SESSION['user_code']),'passport');?>">
                                </div>
                                <div class="user-info  d-md-block">
                                    <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="no"){?>
                                        <div class="user-status user-status-unverified">Unverified</div>
                                    <?php }else{?>
                                        <div class="user-status user-status-unverified" style="color: gold;">Verified</div>
                                    <?php }?>
                                    <div class="user-name dropdown-indicator"></span> <span class="text-dark"><?php print $firstname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');?> </span> <span class="text-dark"><?php print $lastname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span><?php print strtoupper(mb_substr($firstname, 0, 1).''.mb_substr($lastname, 0, 1));?></span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php print $firstname;?> </span> <span class="text-dark"><?php print $lastname;?></span>
                                        <span class="sub-text"><?php print  $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email');?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner user-account-info">
                                <h6 class="overline-title-alt">Wallet Account</h6>
                                <div class="user-balance"><?php print  number_format($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'main_account_balance'),2);?> <small class="currency currency-btc">USD</small></div>
                                <a href="withdraw" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="profile-security"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <!--<li><a href="profile-activity"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>-->
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="../end-current-session"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="notification" class="nk-quick-nav-icon">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- main header @e -->