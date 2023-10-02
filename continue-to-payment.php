<?php
require_once('include.php');
$title = 'Booking | From Doorstep to Destination, We`ve Got Your Back!';
require_once('head.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
 $booking_id = $_GET['id'];
 $sql = query_sql("SELECT * FROM $booking_tb WHERE booking_id='" . $booking_id . "' LIMIT 1");
 $row = mysqli_fetch_assoc($sql);
} else {
 header("location:book");
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


  <div class="user-profile py-120">
   <div class="container">
    <div class="row">
     <div class="col-lg-3">
      <div class="user-profile-sidebar">
       <div class="user-profile-sidebar-top">
        <div class="user-profile-img">
         <img src="img/User_Avatar.png" alt>
         <!-- <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button> -->
         <input type="file" class="profile-img-file">
        </div>
        <h5><?php print $row['name']; ?></h5>
        <p><?php print $row['email']; ?></p>
       </div>
       <ul class="user-profile-sidebar-list">
        <li><a href="book"><i class="far fa-xmark-circle"></i> Cancel Booking</a></li>
       </ul>
      </div>
     </div>

     <div class="col-lg-9">
      <div class="user-profile-wrapper">
       <div class="row">
        <div class="col-lg-12">
         <div class="user-profile-card">
          <div class="user-profile-card-header">
           <h4 class="user-profile-card-title">My Booking Details</h4>
           <div class="user-profile-card-header-right">
            <div class="user-profile-search">
             <div class="form-group">
              <!-- <input type="text" class="form-control" placeholder="Search...">
              <i class="far fa-search"></i> -->
             </div>
            </div>
            <a href="book" class="theme-btn"><span class="fas fa-taxi"></span>Book Another Taxi</a>
           </div>
          </div>
          <div class="table-responsive">
           <table class="table text-nowrap">
            <tbody>
             <tr>
              <td>
               <div class="table-list-info">
                <a href="#">
                 <img src="assets/img/taxi/01.png" alt>
                 <div class="table-list-content">
                  <h6><?php print $row['taxi_title']; ?></h6>
                  <span>Booking ID: <span class="text-success">#<?php print $row['booking_id']; ?></span></span>
                 </div>
                </a>
               </div>
              </td>
             </tr>
             <tr>
              <td>
               <span><span class="text-success">From</span> > <?php print $row['pick_location']; ?> | <span class="text-success">To</span> > <?php print $row['drop_location']; ?> </span>
               <p><span class="text-success">Date:</span><?php print $row['pick_date']; ?> | <span class="text-success">Time:</span><?php print $row['pick_time']; ?></p>
              </td>
             </tr>
             <tr>
              <td>
               <span><span class="text-success">No. Of Pacengers:</span><?php print $row['passengers']; ?> </span>
               <p></p>
              </td>
             </tr>
             <tr>
              <td>
               <span><span class="text-success">Assigned Driver:</span><?php print $row['driver']; ?> </span>
               <p></p>
              </td>
             </tr>
             <tr>
              <td>
               <span><span class="text-success">Booking Status:</span><?php print $row['booking_status']; ?> </span>
               <p></p>
              </td>
             </tr>
             <tr>
              <td>
               <span><span class="text-success">Payment Status:</span><?php print $row['payment_status']; ?> </span>
               <p></p>
              </td>
             </tr>
             <tr>
              <td>€<?php print $row['price']; ?></td>
             </tr>

            </tbody>
           </table>
          </div>

          <div class="pagination-area">
           <div aria-label="Page navigation example">
            <button onclick="alert('coming soon...');" name="sub" class="theme-btn" type="submit">Continue To Payment <i class="fas fa-arrow-right"></i></button>
           </div>
          </div>

         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

 </main>

 <?php require_once('footer.php'); ?>