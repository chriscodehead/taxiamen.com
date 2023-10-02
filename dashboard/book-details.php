<?php
require_once('include.php');
$title = 'Booking Details | ' . $siteName;
$desc = '';
require_once('head.php');

//id booking_id name phone 	email pick_location drop_location passengers cab_type pick_date pick_time 	message 	taxi_type 	price taxi_title	payment_status 	booking_status 	driver 	date_booked 	comments 	update_date 	deleted  
$msg = '';
if (isset($_POST['sub'])) {

 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $pick_location = $_POST['pick_location'];
 $drop_location  = $_POST['drop_location'];
 $passengers = $_POST['passengers'];
 $cab_type = $_POST['cab_type'];
 $pick_date = $_POST['pick_date'];
 $pick_time = $_POST['pick_time'];
 $message   = $_POST['message'];
 $taxi_ty  = $_POST['taxi_type'];
 $price = $_POST['price'];
 $taxi_title = $cal->selectFrmDB($taxi_type, 'title', 'taxi_id', $taxi_ty);
 $payment_status  = $_POST['payment_status']; //Paid
 $booking_status  = $_POST['booking_status']; //Picked Up, Completed
 $driver  = $_POST['driver'];
 $update_date  =  date('Y-m-d g:i:a');

 $feilds = array('name', 'phone', 'email', 'pick_location', 'drop_location', 'passengers', 'cab_type', 'pick_date', 'pick_time', 'message', 'taxi_type', 'price', 'taxi_title', 'payment_status', 'booking_status', 'driver', 'update_date');

 $value = array($name, $phone, $email, $pick_location, $drop_location, $passengers, $cab_type, $pick_date, $pick_time, $message, $taxi_ty, $price, $taxi_title, $payment_status, $booking_status, $driver, $update_date);

 $insert = $cal->update($booking_tb, $feilds, $value, 'booking_id', $_GET['id']);

 if ($insert) {
  $msg = 'Update was successfully!';
 } else {
  $msg = 'Error! Please try again.';
 }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
 $booking_idd = $_GET['id'];
 $sql = query_sql("SELECT * FROM $booking_tb WHERE booking_id='" . $booking_idd . "' LIMIT 1");
 $row = mysqli_fetch_assoc($sql);
} else {
 header("location:./");
}
?>

<body class="nk-body npc-crypto bg-white has-sidebar ">
 <div class="nk-app-root">
  <!-- main @s -->
  <div class="nk-main ">
   <?php require_once('side-bar.php'); ?>
   <!-- wrap @s -->
   <div class="nk-wrap ">
    <?php require_once('header.php'); ?>
    <!-- content @s -->

    <div class="nk-content nk-content-fluid">
     <div class="container-xl wide-lg">
      <div class="nk-content-body">
       <div class="kyc-app wide-sm m-auto">
        <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
         <div class="nk-block-head-content text-center">
          <h2 class="nk-block-title fw-normal">Update Booking Details</h2>
         </div>
        </div>
        <?php if (!empty($msg)) { ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php print @$msg; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data">
         <div class="row">

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Full Name</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Your Name" value="<?php print $row['name']; ?>">
            <i class="far fa-user"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Phone Number</label>
            <input id="phone" name="phone" type="text" class="form-control" placeholder="Your Phone" value="<?php print $row['phone']; ?>">
            <i class="far fa-phone"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Email</label>
            <input id="email" name="email" type="text" class="form-control" placeholder="Your Email" value="<?php print $row['email']; ?>">
            <i class="far fa-envelope"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Pick Up Location</label>
            <input id="pick_location" name="pick_location" type="text" class="form-control" placeholder="Type Location" value="<?php print $row['pick_location']; ?>">
            <i class="far fa-location-dot"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Drop Off Location</label>
            <input id="drop_location" name="drop_location" type="text" class="form-control" placeholder="Type Location" value="<?php print $row['drop_location']; ?>">
            <i class="far fa-location-dot"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Passengers</label>
            <?php $passengers = $row['passengers']; ?>
            <select id="passengers" name="passengers" class="form-control">
             <option value>Choose Cab</option>
             <?php for ($i = 1; $i <= 20; $i++) { ?>
              <option <?php if ($passengers == $i) print 'selected="selected"'; ?> value="<?php print $i; ?>"><?php print $i; ?></option>
             <?php } ?>
            </select>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Cab Type</label>
            <?php $cab_type = $row['cab_type']; ?>
            <select id="cab_type" name="cab_type" class="form-control">
             <option value>Choose Cab</option>
             <option <?php if ($cab_type == 'All Type') print 'selected="selected"'; ?> value="All Type">All Type</option>
             <option <?php if ($cab_type == 'Hybrid') print 'selected="selected"'; ?> value="Hybrid">Hybrid</option>
             <option <?php if ($cab_type == 'Luxury') print 'selected="selected"'; ?> value="Luxury">Luxury</option>
            </select>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Pick Up Date</label>
            <input id="pick_date" name="pick_date" type="text" class="form-control date-picker" placeholder="MM/DD/YY" value="<?php print $row['pick_date']; ?>">
            <i class="far fa-calendar-days"></i>
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Pick Up Time</label>
            <input id="pick_time" name="pick_time" type="text" class="form-control time-picker" placeholder="00:00 AM" value="<?php print $row['pick_time']; ?>">
            <i class="far fa-clock"></i>
           </div>
          </div>


          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Select Taxi Tour</label>
            <?php $taxi_typ = $row['taxi_type']; ?>
            <select class="form-control" name="taxi_type" id="taxi_type">
             <option value="">Select Tour</option>
             <?php $sql = query_sql("SELECT * FROM $taxi_type ORDER BY id DESC");
             $i = 1;
             if (mysqli_num_rows($sql) > 0) {
              while ($roww = mysqli_fetch_assoc($sql)) { ?>

               <option <?php if ($taxi_typ == $roww['taxi_id']) print 'selected="selected"'; ?> value="<?php print $roww['taxi_id']; ?>"><?php print $roww['title']; ?></option>

             <?php }
             } ?>

            </select>
           </div>
          </div>


          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Price (€)</label>
            <input id="price" name="price" type="text" class="form-control" placeholder="Price" value="<?php print $row['price']; ?>">
           </div>
          </div>

          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Assign Driver (Name)</label>
            <input id="driver" name="driver" type="text" class="form-control" placeholder="Driver Name" value="<?php print $row['driver']; ?>">
           </div>
          </div>


          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Booking Status</label>
            <?php $booking_status = $row['booking_status']; ?>
            <select id="booking_status" name="booking_status" class="form-control">
             <option <?php if ($booking_status == 'In Progress') print 'selected="selected"'; ?> value="In Progress">In Progress</option>

             <option <?php if ($booking_status == 'Picked Up') print 'selected="selected"'; ?> value="Picked Up">Picked Up</option>

             <option <?php if ($booking_status == 'Completed') print 'selected="selected"'; ?> value="Completed">Completed</option>
            </select>
           </div>
          </div>


          <div class="col-lg-6 mt-3">
           <div class="form-group">
            <label>Payment Status</label>
            <?php $payment_status = $row['payment_status']; ?>
            <select id="payment_status" name="payment_status" class="form-control">
             <option <?php if ($payment_status == 'Not Paid') print 'selected="selected"'; ?> value="Not Paid">Not Paid</option>

             <option <?php if ($payment_status == 'Paid') print 'selected="selected"'; ?> value="Paid">Paid</option>

            </select>
           </div>
          </div>


          <div class="col-lg-12 mt-3">
           <div class="form-group">
            <label>Pacengers Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write Your Message"><?php print $row['message']; ?></textarea>
           </div>
          </div>

          <div class="col-lg-12 mt-3">
           <div class="form-check">

           </div>
          </div>

          <div class="col-lg-3 mx-auto mt-3">
           <button name="sub" class="btn btn-primary" type="submit">Update Booking<i class="fas fa-arrow-right"></i></button>
          </div>

         </div>
        </form>


       </div>
      </div>
     </div>
    </div>


    <!-- content @e -->
    <?php require_once('footer.php'); ?>