<?php
require_once('include.php');

if (isset($_GET['idd']) && !empty($_GET['idd'])) {
    $id =  $_GET['idd'];
    $ps = $_GET['ps'];

    $fieldsR = array('pause_status');
    $valuesR = array($ps);
    $msg = $cal->update($deposit_tb, $fieldsR, $valuesR, 'id', $id);

    $email_id = $cal->selectFrmDB($deposit_tb, 'email', 'id', $id);
    $name_id = $cal->selectFrmDB($user_tb, 'first_name', 'email', $email_id);
    $coin = $cal->selectFrmDB($deposit_tb, 'coin_type', 'id', $id);
    $plan = $cal->selectFrmDB($deposit_tb, 'plan_type', 'id', $id);
    $amount = $cal->selectFrmDB($deposit_tb, 'amount', 'id', $id);

    if ($_GET['ps'] == 0) {
        @$email_call->playTransaction($amount, $plan, $coin, $id, $name_id, $email_id);
    } else {
        @$email_call->pauseTransaction($amount, $plan, $coin, $id, $name_id, $email_id);
    }
    header("location:./?done=" . $msg);
}
if (isset($_GET['done']) && !empty($_GET['done'])) {
    $msg = $_GET['done'];
}

$title = 'Dashboard | ' . $siteName;
$desc = '';
require_once('head.php'); ?>

<body class="nk-body npc-crypto bg-white has-sidebar ">
    <div class="nk-app-root">

        <div class="nk-main ">
            <?php require_once('side-bar.php'); ?>

            <div class="nk-wrap ">
                <?php require_once('header.php'); ?>

                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">

                            <div class="nk-block-head">
                                <div class="nk-block-head-sub"><span>Welcome! Admin <?php print $firstname = $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'first_name') . ' ' . $sqli->getRow($sqli->getEmail($_SESSION['user_code']), 'last_name'); ?></span>
                                </div>
                            </div>

                            <div class="nk-block">
                                <div class="row gy-gs">
                                    <div class="col-lg-5 col-xl-4">
                                        <div class="nk-block">
                                            <div class="nk-block-head-xs">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Bookings Overview</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">

                                <div class="table-responsive">
                                    <table id="myTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                                <th>Column 1</th>
                                                <th>Column 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                            </tr>
                                            <tr>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php require_once('info.php'); ?>

                </div>
            </div>
        </div>


        <?php require_once('footer.php'); ?>