 <header class="header">
   <div class="header-top">
     <div class="container">
       <div class="header-top-wrapper">
         <div class="header-top-left">
           <div class="header-top-contact">
             <ul>
               <li><a href="mailto:<?php print $siteEmail; ?>"><i class="far fa-envelopes"></i>
                   <span><?php print $siteEmail; ?></span></a></li>
               <li><a href="tel:<?php print $sitePhone; ?>"><i class="far fa-phone-volume"></i> <?php print $sitePhone; ?></a>
               </li>
               <li><a href="#"><i class="far fa-alarm-clock"></i> <?php print $siteAddress; ?></a></li>
             </ul>
           </div>
         </div>
         <div class="header-top-right">
           <div class="header-top-link">
             <!-- <a href="#"><i class="far fa-arrow-right-to-bracket"></i> Book</a>
       <a href="#"><i class="far fa-user-vneck"></i> Register</a> -->
           </div>

           <div class="header-top-social">
             <span>Follow Us: </span>
             <a href="<?php print $siteFacebook; ?>"><i class="fab fa-facebook"></i></a>
             <a href="<?php print $siteTwitter; ?>"><i class="fab fa-twitter"></i></a>
             <a href="<?php print $siteInstagram; ?>"><i class="fab fa-instagram"></i></a>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="main-navigation">
     <nav class="navbar navbar-expand-lg">
       <div class="container position-relative">
         <a class="navbar-brand" href="./">
           <img src="img/logo.png" alt="logo">
         </a>
         <div class="mobile-menu-right">
           <div class="search-btn">
             <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
           </div>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
           </button>
         </div>
         <div class="collapse navbar-collapse" id="main_nav">
           <ul class="navbar-nav">
             <li class="nav-item"><a class="nav-link active" href="./">Home</a></li>
             <li class="nav-item"><a class="nav-link" href="./#about">About</a></li>
             <li class="nav-item"><a class="nav-link" href="./#service">Service</a></li>
             <li class="nav-item"><a class="nav-link" href="book">Book Taxi</a></li>
             <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
           </ul>
         </div>

       </div>
     </nav>
   </div>
 </header>


 <div class="sidebar-popup">
   <div class="sidebar-wrapper">
     <div class="sidebar-content">
       <button type="button" class="close-sidebar-popup"><i class="far fa-xmark"></i></button>
       <div class="sidebar-logo">
         <img src="img/logo.png" alt>
       </div>
       <div class="sidebar-about">
         <h4>About Us</h4>
         <p>Welcome to <?php print $siteName; ?>, your trusted transportation partner in Your City. We are proud to be the go-to choice for reliable, safe, and comfortable taxi services. At <?php print $siteName; ?>, we believe that every journey should be a hassle-free and enjoyable experience.</p>
       </div>
       <div class="sidebar-contact">
         <h4>Contact Info</h4>
         <ul>
           <li>
             <h6>Email</h6>
             <a href="mailto:<?php print $siteEmail; ?>"><i class="far fa-envelope"></i><span><?php print $siteEmail; ?></span></a>
           </li>
           <li>
             <h6>Phone</h6>
             <a href="tel:+<?php print $sitePhone; ?>"><i class="far fa-phone"></i><?php print $sitePhone; ?></a>
           </li>
           <li>
             <h6>Address</h6>
             <a href="#"><i class="far fa-location-dot"></i><?php print $siteAddress; ?></a>
           </li>
         </ul>
       </div>
       <div class="sidebar-social">
         <h4>Follow Us</h4>
         <a href="<?php print $siteFacebook; ?>"><i class="fab fa-facebook"></i></a>
         <a href="<?php print $siteTwitter; ?>"><i class="fab fa-twitter"></i></a>


       </div>
     </div>
   </div>
 </div>