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
                        <li class="nk-menu-item">
                            <a href="taxi-type" class="nk-menu-link">
                                <div class="wallet-icon"><em class="icon ni ni-plus"></em></div>
                                <div class="wallet-text">
                                    <h6 class="wallet-name">Add Taxi Info</h6>
                                </div>
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
                            <a target="_blank" href="mailto:<?php print $siteEmail; ?>" class="nk-menu-link">
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