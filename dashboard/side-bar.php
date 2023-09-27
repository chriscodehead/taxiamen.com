<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="./" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="../img/logo.png" srcset="../img/logo.png" alt="logo">
                <img class="logo-dark logo-img" src="../img/logo.png" srcset="../img/logo.png" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget d-none d-xl-block">
                    <div class="user-account-info between-center">
                        <div class="user-account-main">
                            <h6 class="overline-title-alt">Available Balance</h6>
                            <div class="user-balance"><?php print  number_format($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'main_account_balance'),2);?> <small class="currency currency-btc">USD</small></div>
                        </div>
                        <a class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                    </div>
                    <ul class="user-account-data gy-1">
                        <li>
                            <div class="user-account-label">
                                <span class="sub-text">Bonus (Recent)</span>
                            </div>
                            <div class="user-account-value">
                                <span class="lead-text">+ <?php print number_format($sqli->gettodayRefcom($sqli->getEmail($_SESSION['user_code'])),2);?> <span class="currency currency-btc">USD</span></span>
                                <span class="text-success ml-2">% <em class="icon ni ni-arrow-long-up"></em></span>
                            </div>
                        </li>
                        
                    </ul>
                    <div class="user-account-actions">
                        <ul class="g-3">
                            <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="no"){?>
                            <li><a href="deposit" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                            <?php }else{?> 
                            <li><a href="deposit" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                            <?php }?> 
                            <li><a href="withdraw" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                    <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                        <div class="user-card-wrap">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <?php $firstname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'first_name');
                                    $lastname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'last_name');?>
                                    <span><?php print strtoupper(mb_substr($firstname, 0, 1).''.mb_substr($lastname, 0, 1));?></span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text"><?php print $firstname.' '.$lastname;?></span>
                                    <span class="sub-text"><?php print  $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email');?></span>
                                </div>
                                <div class="user-action">
                                    <em class="icon ni ni-chevron-down"></em>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                        <div class="user-account-info between-center">
                            <div class="user-account-main">
                                <h6 class="overline-title-alt">Available Balance</h6>
                                <div class="user-balance"><?php print  number_format($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'main_account_balance'),2);?> <small class="currency currency-btc">USDT</small></div>
                            </div>
                            <a class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                        </div>
                        <ul class="user-account-data">
                            <li>
                                <div class="user-account-label">
                                    <span class="sub-text">Profits (Recent)</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="lead-text">+ <?php print number_format($sqli->gettodayRefcom($sqli->getEmail($_SESSION['user_code'])),2);?> <span class="currency currency-btc">USDT</span></span>
                                    <span class="text-success ml-2">% <em class="icon ni ni-arrow-long-up"></em></span>
                                </div>
                            </li>
                            <li>
                                <!-- <div class="user-account-label">
                                    <span class="sub-text">Sponsor (Main)</span>
                                </div>
                                <div class="user-account-value">
                                    <span class="sub-text text-base"> <span class="currency currency-btc"><?php print $sqli->GetReferral($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'referral_username'),'first_name');?> </span></span>
                                </div> -->
                            </li>
                        </ul>
                        <ul class="user-account-links">
                            <li><a href="withdraw" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
                            <?php if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="no"){?>
                            <li><a href="deposit" class="link"><span>Deposit</span> <em class="icon ni ni-wallet-in"></em></a></li>
                            <?php }else{?>
                                <li><a href="withdraw" class="link"><span>Withdraw</span> <em class="icon ni ni-wallet-in"></em></a></li>
                            <?php }?>

                        </ul>
                        <ul class="link-list">
                            <li><a href="profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                            <li><a href="profile-security"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                        </ul>
                        <ul class="link-list">
                            <li><a href="./end-current-session"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="./" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">User Account</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="profile" class="nk-menu-link">
                                        <span class="nk-menu-text">My Profile</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="update-password" class="nk-menu-link"><span class="nk-menu-text">Update Password</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="profile-security" class="nk-menu-link"><span class="nk-menu-text">Update Security PIN</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item">
                            <a href="add-wallet" class="nk-menu-link">
                                <div class="wallet-icon"><em class="icon ni ni-plus"></em></div>
                                <div class="wallet-text">
                                    <h6 class="wallet-name">Add wallet</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="deposit" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Deposit</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="withdraw" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Withdraw</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="referral-bonus?id=USDT" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                                <span class="nk-menu-text">My Bonus Earnings</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="my-referrals" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                                <span class="nk-menu-text">Referrals</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="commission" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Commission</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="wallets" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Deposit History</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="withdrawal-history" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Withdrawal History</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="referral-history" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                <span class="nk-menu-text">Referral History</span>
                            </a>
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="notification" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-bell-fill"></em></span>
                                <span class="nk-menu-text">Notification</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a target="_blank" href="mailto:<?php print $siteEmail;?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="../end-current-session" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                <span class="nk-menu-text">Sign out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sidebar @e -->