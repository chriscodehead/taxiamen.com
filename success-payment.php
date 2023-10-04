<?php
require_once('include.php');
$title = 'Booking Error | From Doorstep to Destination, We`ve Got Your Back!';
require_once('head.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
 $booking_id = $_GET['id'];
 $sql = query_sql("SELECT * FROM $booking_tb WHERE booking_id='" . $booking_id . "' LIMIT 1");
 $row = mysqli_fetch_assoc($sql);
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



     <div class="col-lg-12">
      <div class="user-profile-wrapper">
       <div class="row">
        <div class="col-lg-12">
         <div class="user-profile-card">


          <div class="user-profile-card-header">
           <h4 class="user-profile-card-title">Booking Payment Success</h4>
           <div class="user-profile-card-header-right">
            <div class="user-profile-search">
             <div class="form-group">
              <!-- <input type="text" class="form-control" placeholder="Search...">
              <i class="far fa-search"></i> -->
             </div>
            </div>

           </div>
          </div>

          <div class="table-responsive">
           <img src="img/Success-icon.png" width="100" />
           <span>Congratulations your payment was success!!!</span>
          </div>

          <div class="pagination-area mt-3">
           <div aria-label="Page navigation example">
            <a href="continue-to-payment?id=<?php print $booking_id; ?>"><button name="PostButton" class="theme-btn" type="submit">Back To Booking <i class="fas fa-arrow-right"></i></button></a>
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