<?php
require_once('include.php');
$title = $siteName . ' | ' . "From Doorstep to Destination, We`ve Got Your Back!";
require_once('head.php');

//id booking_id name phone 	email pick_location drop_location passengers cab_type pick_date pick_time 	message 	taxi_type 	price taxi_title	payment_status 	booking_status 	driver 	date_booked 	comments 	update_date 	deleted  
$msg = '';

if (isset($_POST['search'])) {
  $search = $_POST['search-detail'];
  if (!empty($search)) {
    header("location:continue-to-payment?id=" . $search);
  }
}

if (isset($_POST['sub'])) {
  $booking_id = $bassic->picker() . uniqid();
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
  $price = $cal->selectFrmDB($taxi_type, 'price', 'taxi_id', $taxi_ty);
  $taxi_title = $cal->selectFrmDB($taxi_type, 'title', 'taxi_id', $taxi_ty);
  $payment_status  = 'Not Paid'; //Paid
  $booking_status  = 'In Progress'; //Picked Up, Completed
  $driver  = '';
  $date_booked  = date('Y-m-d g:i:a');
  $comments   = '';
  $update_date  =  date('Y-m-d g:i:a');
  $deleted = 'no';

  if (!empty($name) && !empty($phone) && !empty($email) && !empty($pick_location) && !empty($drop_location) && !empty($passengers) && !empty($pick_date) && !empty($pick_time) && !empty($taxi_type)) {

    $feilds = array('id', 'booking_id', 'name', 'phone', 'email', 'pick_location', 'drop_location', 'passengers', 'cab_type', 'pick_date', 'pick_time', 'message', 'taxi_type', 'price', 'taxi_title', 'payment_status', 'booking_status', 'driver', 'date_booked', 'comments', 'update_date', 'deleted');

    $value = array(null, $booking_id, $name, $phone, $email, $pick_location, $drop_location, $passengers, $cab_type, $pick_date, $pick_time, $message, $taxi_ty, $price, $taxi_title, $payment_status, $booking_status, $driver, $date_booked, $comments, $update_date, $deleted);

    $insert = $cal->insertDataB($booking_tb, $feilds, $value);

    if ($insert) {
      $msg = 'Your data was entered successfully!';
      $subjt = 'Booking Info';
      $message = 'Hi ' . $name . ', Your booking was successful. <br />Booking Id: ' . $booking_id . ', <br />Pick Up Location: ' . $pick_location . ', <br />Drop Location: ' . $drop_location . ', <br />Taxi Type: ' . $taxi_title . ',  <br />Pick Up Date: ' . $pick_date . ', <br />Pick Up Time: ' . $pick_time . ', <br />Price: €' . $price;
      $email = $email;
      $siteName = $siteName;
      $siteDomain = $siteDomain;
      $email_call->generalMessage($subjt, $message, $email, $siteName, $siteDomain);

      $name = $name;
      $email = $dummyEmail;
      $subject = 'New Booking Order From ' . $name . ' - ID:' . $booking_id;
      $message = 'Booking information from ' . $name . '. <br />Booking Id: ' . $booking_id . ', <br />Pick Up Location: ' . $pick_location . ', <br />Drop Location: ' . $drop_location . ', <br />Taxi Type: ' . $taxi_title . ',  <br />Pick Up Date: ' . $pick_date . ', <br />Pick Up Time: ' . $pick_time . ', <br />Price: €' . $price;
      $email_call->generalMessage($subject, $message, $email, $siteName, $siteDomain);

      header("location:continue-to-payment?id=" . $booking_id);
    } else {
      $msg = 'Error! Please try again.';
    }
  } else {
    $msg = 'Please fill all feilds!';
  }
}

?>

<body>

  <div class="preloader">
    <div class="loader-ripple">
      <div></div>
      <div></div>
    </div>
  </div>

  <?php require_once('header.php') ?>


  <main class="main">

    <!-- <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
   <div class="container">
    <h2 class="breadcrumb-title">Book A Ride</h2>
    <ul class="breadcrumb-menu">
     <li><a href="./">Home</a></li>
     <li class="active">Book A Ride</li>
    </ul>
   </div>
  </div> -->


    <div class="book-ride py-120">
      <div class="container">
        <div class="row">

          <?php if (!empty($msg)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php print @$msg; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>


          <div class="col-md-10 mx-auto">

            <div class="booking-form p-3 mb-3">
              <form action="" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-lg-8 col-sm-8">
                    <div class="form-group">
                      <input name="search-detail" type="text" class="form-control" placeholder="Your Booking ID" />
                      <i class="far fa-search"></i>
                    </div>
                  </div>

                  <div class="col-lg-4 col-sm-4 mt-2">
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit" name="search">Search Bookings</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>

            <div class="booking-form">
              <div class="book-ride-head">
                <h4 class="booking-title">Make Your Booking Today</h4>
                <p>Booking a ride with us is easy! You can call, book online, or use our website for seamless reservations.</p>
              </div>
              <form action="book" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input id="name" name="name" type="text" class="form-control" placeholder="Your Name">
                      <i class="far fa-user"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input id="phone" name="phone" type="text" class="form-control" placeholder="Your Phone">
                      <i class="far fa-phone"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input id="email" name="email" type="text" class="form-control" placeholder="Your Email">
                      <i class="far fa-envelope"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Pick Up Location</label>
                      <input id="pick_location" name="pick_location" type="text" class="form-control" placeholder="Type Location">
                      <i class="far fa-location-dot"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Drop Off Location</label>
                      <input id="drop_location" name="drop_location" type="text" class="form-control" placeholder="Type Location">
                      <i class="far fa-location-dot"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Passengers</label>
                      <select id="passengers" name="passengers" class="select">
                        <option value>Choose Cab</option>
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                          <option value="<?php print $i; ?>"><?php print $i; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div style="display: none;" class="col-lg-6">
                    <div class="form-group">
                      <label>Cab Type</label>
                      <select id="cab_type" name="cab_type" class="select">
                        <option value>Choose Cab</option>
                        <option value="All Type">All Type</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="Luxury">Luxury</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Pick Up Date</label>
                      <input id="pick_date" name="pick_date" type="text" class="form-control date-picker" placeholder="MM/DD/YY">
                      <i class="far fa-calendar-days"></i>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Pick Up Time</label>
                      <input id="pick_time" name="pick_time" type="text" class="form-control time-picker" placeholder="00:00 AM">
                      <i class="far fa-clock"></i>
                    </div>
                  </div>

                  <div style="display: none;" class="col-lg-6">
                    <div class="form-group">
                      <label>Driver Age</label>
                      <select class="select">
                        <option value>Choose Age</option>
                        <option value="1">Any Age</option>
                        <option value="2">25</option>
                        <option value="3">30</option>
                        <option value="4">35</option>
                        <option value="5">40</option>
                      </select>
                    </div>
                  </div>

                  <div style="display: none;" class="col-lg-6">
                    <div class="form-group">
                      <label>Cab Model</label>
                      <select class="select">
                        <option value>Choose Model</option>
                        <option value="1">All Model</option>
                        <option value="2">M5 2022</option>
                        <option value="3">Q7 2021</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Select Taxi Tour</label>
                      <select class="form-control" name="taxi_type" id="taxi_type">
                        <option value="">Select Tour</option>
                        <?php $sql = query_sql("SELECT * FROM $taxi_type ORDER BY id DESC");
                        $i = 1;
                        if (mysqli_num_rows($sql) > 0) {
                          while ($row = mysqli_fetch_assoc($sql)) { ?>

                            <option value="<?php print $row['taxi_id']; ?>"><?php print $row['title']; ?></option>

                        <?php }
                        } ?>

                      </select>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Your Message</label>
                      <textarea id="message" name="message" class="form-control" rows="5" placeholder="Write Your Message"></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="condition" name="condition">
                      <label class="form-check-label" for="condition">
                        By using this form you agree to our terms & conditions.
                      </label>
                    </div>
                  </div>

                  <div class="col-lg-3 mx-auto">
                    <button name="sub" class="theme-btn" type="submit">Book Your Taxi<i class="fas fa-arrow-right"></i></button>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php require_once('footer.php'); ?>