<?php
require_once('include.php');
$title = 'Booking | From Doorstep to Destination, We`ve Got Your Back!';
require_once('head.php');
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

  <div class="contact-area py-120">
   <div class="container">
    <div class="contact-content">
     <div class="row">
      <div class="col-md-3">
       <div class="contact-info">
        <div class="contact-info-icon">
         <i class="fal fa-map-location-dot"></i>
        </div>
        <div class="contact-info-content">
         <h5>Office Address</h5>
         <p><?php print $siteAddress; ?></p>
        </div>
       </div>
      </div>
      <div class="col-md-3">
       <div class="contact-info">
        <div class="contact-info-icon">
         <i class="fal fa-phone-volume"></i>
        </div>
        <div class="contact-info-content">
         <h5>Call Us</h5>
         <p><?php print $sitePhone; ?></p>
        </div>
       </div>
      </div>
      <div class="col-md-3">
       <div class="contact-info">
        <div class="contact-info-icon">
         <i class="fal fa-envelopes"></i>
        </div>
        <div class="contact-info-content">
         <h5>Email Us</h5>
         <p><a href="mailto:<?php print $siteEmail; ?>" class="__cf_email__" data-cfemail=""><?php print $siteEmail; ?></a></p>
        </div>
       </div>
      </div>
      <div class="col-md-3">
       <div class="contact-info">
        <div class="contact-info-icon">
         <i class="fal fa-alarm-clock"></i>
        </div>
        <div class="contact-info-content">
         <h5>Opened</h5>
         <p>Mon - Sun</p>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="contact-wrapper">
     <div class="row">
      <div class="col-lg-6 align-self-center">
       <div class="contact-img">
        <img src="assets/img/contact/01.jpg" alt>
       </div>
      </div>
      <div class="col-lg-6 align-self-center">
       <div class="contact-form">
        <div class="contact-form-header">
         <h2>Get In Touch</h2>
         <p>It is a long established fact that a reader will be distracted by the readable
          content of a page randomised words slightly when looking at its layout. </p>
        </div>
        <form method="post" action="" id="contact-form">
         <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
           </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
           </div>
          </div>
         </div>
         <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Your Subject" required>
         </div>
         <div class="form-group">
          <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write Your Message"></textarea>
         </div>

         <button type="submit" class="theme-btn" id="n" onClick="contatMail();">Send
          Message <i class="far fa-paper-plane"></i></button>

         <div class="col-md-12 mt-3">
          <div class="form-messege text-success"></div>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>


 </main>

 <?php require_once('footer.php'); ?>
 <?php require_once('footer.php'); ?>
 <script type="text/javascript">
  $('#n').css("cursor", "pointer");

  function contatMail() {
   $('i#sp5').attr("class", "fa fa-spinner fa-spin");
   var hr = new XMLHttpRequest();
   var url = "reg_process.php";
   var cotactmail = document.getElementById('email').value;
   var name = document.getElementById('name').value;
   var subject = document.getElementById('subject').value;
   var message = document.getElementById('message').value;
   var vars = "cotactmail=" + cotactmail + "&name=" + name + "&message=" + message;
   if (cotactmail == "" || name == "" || message == "") {
    sweetUnpre("Please fill all necessary fields!");
    $('i#sp5').attr("class", "");
   } else {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(cotactmail)) {
     sweetUnpre('Please use a valid email address!');
     $('i#sp5').attr("class", "");
    } else {

     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     // Access the onreadystatechange event for the XMLHttpRequest object
     hr.onreadystatechange = function() {
      //  console.log(hr);
      if (hr.readyState == 4 && hr.status == 200) {
       var return_data = hr.responseText;
       sweetUnpre(return_data);
       $('i#sp5').attr("class", "");
       //setTimeout(refreshPage,2000);
       document.getElementById('email').value = "";
       document.getElementById('name').value = "";
       document.getElementById('message').value = "";
      }
     }
     hr.send(vars); // Actually execute the request
    } //email
    sweetUnpre('processing...');
   } //else empty
  }
 </script>