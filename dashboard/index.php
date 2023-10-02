<?php
require_once('include.php');

if (isset($_GET['del']) && !empty($_GET['del'])) {
    if (query_sql("DELETE FROM $booking_tb WHERE `id`='" . $_GET['del'] . "' LIMIT 1")) {
        $msg = 'Delete process was successful!';
        header("location:./?done=" . $msg);
    } else {
        $msg = 'Info Faild to delete!';
        header("location:./?done=" . $msg);
    }
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

                                <?php if (!empty($msg)) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php print @$msg; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <div class="table-responsive">
                                    <table id="myTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Booking Id</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Pick Location</th>
                                                <th>Drop Location</th>
                                                <th>Passengers</th>
                                                <th>Cab Type</th>
                                                <th>Pick Date</th>
                                                <th>Pick Time</th>
                                                <th>Price</th>
                                                <th>Taxi Tour</th>
                                                <th>Payment Status</th>
                                                <th>Booking Status</th>
                                                <th>Driver</th>
                                                <th>Date Booked</th>
                                                <th>Details</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = query_sql("SELECT * FROM $booking_tb ORDER BY id DESC");
                                            if (mysqli_num_rows($sql) > 0) {
                                                $c = 0;
                                                while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                    <tr>
                                                        <td><?php print $row['booking_id']; ?></td>
                                                        <td><?php print $row['name']; ?></td>
                                                        <td><?php print $row['phone']; ?></td>
                                                        <td><?php print $row['email']; ?></td>
                                                        <td><?php print $row['pick_location']; ?></td>
                                                        <td><?php print $row['drop_location']; ?></td>
                                                        <td><?php print $row['passengers']; ?></td>
                                                        <td><?php print $row['cab_type']; ?></td>
                                                        <td><?php print $row['pick_date']; ?></td>
                                                        <td><?php print $row['pick_time']; ?></td>
                                                        <td>€<?php print $row['price']; ?></td>
                                                        <td><?php print $row['taxi_title']; ?></td>
                                                        <td><span class="btn btn-sm btn-success"><?php print $row['payment_status']; ?></span></td>
                                                        <td><span class="btn btn-sm btn-success"><?php print $row['booking_status']; ?></span></td>
                                                        <td><?php print $row['driver']; ?></td>
                                                        <td><?php print $row['date_booked']; ?></td>
                                                        <td><a href="book-details?id=<?php print $row['booking_id']; ?>"><button class="btn btn-sm btn-primary">View</button></a></td>
                                                        <td><a data-toggle="modal" href="#myModalWWW<?php print $row['id']; ?>"><i class="btn btn-danger icon ni ni-trash"></i></a></td>

                                                        <!-- Modal -->
                                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalWWW<?php print $row['id']; ?>" class="modal fade">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title">Delete Item?</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this item</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                                                        <a href="./?del=<?php print $row['id']; ?>">
                                                                            <span class="btn btn-danger">Delete</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- modal -->
                                                    </tr>

                                                <?php $c++;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h3>No data found!</h3>
                                                    </td>
                                                </tr>

                                            <?php } ?>

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