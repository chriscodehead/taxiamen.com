<?php
require_once('include.php');
$title = $siteName . ' | ' . "From Doorstep to Destination, We`ve Got Your Back!";
require_once('head.php')

//name phone email pick_location drop_location passengers cab_type pick_date pick_time message condition
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
     <div class="col-md-10 mx-auto">
      <div class="booking-form">
       <div class="book-ride-head">
        <h4 class="booking-title">Make Your Booking Today</h4>
        <p>Booking a ride with us is easy! You can call, book online, or use our website for seamless reservations.</p>
       </div>
       <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">

         <div class="col-lg-4">
          <div class="form-group">
           <label>Full Name</label>
           <input id="name" name="name" type="text" class="form-control" placeholder="Your Name">
           <i class="far fa-user"></i>
          </div>
         </div>

         <div class="col-lg-4">
          <div class="form-group">
           <label>Phone Number</label>
           <input id="phone" name="phone" type="text" class="form-control" placeholder="Your Phone">
           <i class="far fa-phone"></i>
          </div>
         </div>

         <div class="col-lg-4">
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
           <input id="passengers" name="passengers" type="text" class="form-control" placeholder="Passengers">
           <i class="far fa-user-tie"></i>
          </div>
         </div>

         <div class="col-lg-6">
          <div class="form-group">
           <label>Cab Type</label>
           <select id="cab_type" name="cab_type" class="select">
            <option value>Choose Cab</option>
            <option value="1">All Type</option>
            <option value="2">Hybrid</option>
            <option value="3">Luxury</option>
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
          <button class="theme-btn" type="submit">Book Your Taxi<i class="fas fa-arrow-right"></i></button>
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