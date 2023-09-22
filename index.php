<?php
require_once('include.php');
$title = $siteName . ' | ' . "From Doorstep to Destination, We`ve Got Your Back!";
require_once('head.php') ?>

<body>

  <div class="preloader">
    <div class="loader-ripple">
      <div></div>
      <div></div>
    </div>
  </div>

  <?php require_once('header.php') ?>



  <main class="main">

    <div class="hero-section">
      <div class="hero-slider owl-carousel owl-theme">
        <div class="hero-single" style="background: url(assets/img/slider/slider-1.jpg)">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-12 col-lg-9 mx-auto">
                <div class="hero-content text-center">
                  <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                    <?php print $siteName; ?>!</h6>
                  <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                    Book <span>Taxi</span> For Your Ride
                  </h1>
                  <p data-animation="fadeInLeft" data-delay=".75s">
                    Welcome to <?php print $siteName; ?>, your trusted transportation partner in Your City. We are proud to be the go-to choice for reliable, safe, and comfortable taxi services. At <?php print $siteName; ?>, we believe that every journey should be a hassle-free and enjoyable experience.
                  </p>
                  <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                    <a href="about" class="theme-btn">About Us<i class="fas fa-arrow-right"></i></a>
                    <a href="book" class="theme-btn theme-btn2">Book A Taxi<i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-single" style="background: url(assets/img/slider/slider-2.jpg)">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-12 col-lg-9 mx-auto">
                <div class="hero-content text-center">
                  <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Reliable Service!</h6>
                  <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                    Book <span><?php print $siteName; ?></span> For Your Ride
                  </h1>
                  <p data-animation="fadeInLeft" data-delay=".75s">
                    Count on us to be there when you need us. We take pride in our punctuality and dependability.
                  </p>
                  <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                    <a href="about" class="theme-btn">About Us<i class="fas fa-arrow-right"></i></a>
                    <a href="book" class="theme-btn theme-btn2">Book Taxi<i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-single" style="background: url(assets/img/slider/slider-3.jpg)">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-12 col-lg-9 mx-auto">
                <div class="hero-content text-center">
                  <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Fair and Transparent Pricing</h6>
                  <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                    We <span> Are Here </span> For You
                  </h1>
                  <p data-animation="fadeInLeft" data-delay=".75s">
                    With <?php print $siteName; ?>, you'll always know the fare upfront, with no hidden fees or surprises. Our drivers are not just skilled behind the wheel but also courteous and knowledgeable about the local area.
                  </p>
                  <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                    <a href="about" class="theme-btn">About Us<i class="fas fa-arrow-right"></i></a>
                    <a href="book" class="theme-btn theme-btn2">Book A Ride<i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="booking-area">
      <div class="container">
        <div class="booking-form">
          <h4 class="booking-title">Book Your Ride</h4>
          <form action="#">
            <div class="row">
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Full-Name</label>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Type Location">
                  <i class="far fa-user"></i>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input id="phone" name="phone" type="text" class="form-control" placeholder="Type Location">
                  <i class="far fa-phone"></i>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Pick Up Location</label>
                  <input id="pick_location" name="pick_location" type="text" class="form-control" placeholder="Type Location">
                  <i class="far fa-location-dot"></i>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Drop Off Location</label>
                  <input id="drop_location" name="drop_location" type="text" class="form-control" placeholder="Type Location">
                  <i class="far fa-location-dot"></i>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label>No. Of Passengers</label>
                  <input id="passengers" name="passengers" type="text" class="form-control" placeholder="Passengers">
                  <i class="far fa-user-tie"></i>
                </div>
              </div>
              <div class="col-lg-3">
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
              <div class="col-lg-3">
                <div class="form-group">
                  <label>Pick Up Date</label>
                  <input id="pick_date" name="pick_date" type="text" class="form-control date-picker" placeholder="MM/DD/YY">
                  <i class="far fa-calendar-days"></i>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label>Pick Up Time</label>
                  <input id="pick_time" name="pick_time" type="text" class="form-control time-picker" placeholder="00:00 AM">
                  <i class="far fa-clock"></i>
                </div>
              </div>
              <!-- <div class="col-lg-2">
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
              </div> -->
              <!-- <div class="col-lg-3">
                <div class="form-group">
                  <label>Cab Model</label>
                  <select class="select">
                    <option value>Choose Model</option>
                    <option value="1">All Model</option>
                    <option value="2">M5 2022</option>
                    <option value="3">Q7 2021</option>
                  </select>
                </div>
              </div> -->
              <div class="col-lg-2 align-self-end  mt-20">
                <button id="sub" name="sub" class="theme-btn" type="submit">Book Taxi<i class="fas fa-arrow-right"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div id="about" class="about-area py-120">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
              <div class="about-img">
                <img src="assets/img/about/01.png" alt>
              </div>
              <div class="about-experience">
                <div class="about-experience-icon">
                  <img src="assets/img/icon/taxi-booking.svg" alt>
                </div>
                <b>+Years Of <br> Quality Service</b>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-right wow fadeInRight" data-wow-delay=".25s">
              <div class="site-heading mb-3">
                <span class="site-title-tagline justify-content-start">
                  <i class="flaticon-drive"></i> About Us
                </span>
                <h2 class="site-title">
                  We Provide Trusted <span>Cab Service</span> In Your Locality
                </h2>
              </div>
              <p class="about-text">
                Welcome to <?php print $siteName; ?>, your trusted transportation partner in Your City. We are proud to be the go-to choice for reliable, safe, and comfortable taxi services. At <?php print $siteName; ?>, we believe that every journey should be a hassle-free and enjoyable experience.
              </p>
              <div class="about-list-wrapper">
                <ul class="about-list list-unstyled">
                  <li>
                    Our mission at <?php print $siteName; ?> is simple yet profound: to offer the highest level of service, safety, and convenience to our valued customers. We strive to make transportation effortless and stress-free for everyone who chooses to ride with us.
                  </li>
                </ul>
              </div>
              <a href="about" class="theme-btn mt-4">Discover More<i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="service" class="service-area bg py-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="site-heading text-center">
              <span class="site-title-tagline">Services</span>
              <h2 class="site-title">Our Best Services For You</h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".25s">
              <div class="service-img">
                <img src="assets/img/service/01.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/taxi-booking-1.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">Online Booking</a>
                </h3>
                <p class="service-text">
                  Easy online booking for quick, hassle-free travel.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".50s">
              <div class="service-img">
                <img src="assets/img/service/02.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/city-taxi.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">City Transport</a>
                </h3>
                <p class="service-text">
                  Seamless city transportation you can trust, at your service 24/7.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".75s">
              <div class="service-img">
                <img src="assets/img/service/03.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/airport.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">Airport Transport</a>
                </h3>
                <p class="service-text">
                  Reliable airport transfers for stress-free journeys.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".25s">
              <div class="service-img">
                <img src="assets/img/service/04.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/business.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">Business Transport</a>
                </h3>
                <p class="service-text">
                  Professional business transport solutions that mean business.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".50s">
              <div class="service-img">
                <img src="assets/img/service/05.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/taxi-2.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">Regular Transport</a>
                </h3>
                <p class="service-text">
                  Everyday, dependable transportation for your routine.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="service-item wow fadeInUp" data-wow-delay=".75s">
              <div class="service-img">
                <img src="assets/img/service/06.jpg" alt>
              </div>
              <div class="service-icon">
                <img src="assets/img/icon/taxi.svg" alt>
              </div>
              <div class="service-content">
                <h3 class="service-title">
                  <a href="book">Tour Transport</a>
                </h3>
                <p class="service-text">
                  Explore with confidence – our tour transport is your gateway to adventure.
                </p>
                <div class="service-arrow">
                  <a href="book" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="counter-area">
      <div class="container">
        <div class="counter-wrapper">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box">
                <div class="icon">
                  <img src="assets/img/icon/taxi-1.svg" alt>
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                  <h6 class="title">+ Available Taxi </h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box">
                <div class="icon">
                  <img src="assets/img/icon/happy.svg" alt>
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="900" data-speed="3000">900</span>
                  <h6 class="title">+ Happy Clients</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box">
                <div class="icon">
                  <img src="assets/img/icon/driver.svg" alt>
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="700" data-speed="3000">700</span>
                  <h6 class="title">+ Our Drivers</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="counter-box">
                <div class="icon">
                  <img src="assets/img/icon/trip.svg" alt>
                </div>
                <div>
                  <span class="counter" data-count="+" data-to="1800" data-speed="3000">1800</span>
                  <h6 class="title">+ Road Trip Done</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="feature-area feature-bg py-120">
      <div class="container mt-150">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="site-heading text-center">
              <span class="site-title-tagline">Feature</span>
              <h2 class="site-title text-white">Our Awesome Feature</h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
              <div class="feature-icon">
                <img src="assets/img/icon/taxi-safety.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Safety Guarantee</h4>
                <p>Your safety is our top priority. With stringent measures and trained drivers, we provide a secure journey, ensuring peace of mind for every passenger.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
              <div class="feature-icon">
                <img src="assets/img/icon/pickup.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Fast Pickup</h4>
                <p>Don't wait! Our swift pickup service ensures you're on your way in no time, whether it's a rush-hour commute or a midnight ride.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
              <div class="feature-icon">
                <img src="assets/img/icon/money.svg" alt>
              </div>
              <div class="feature-content">
                <h4>Affordable Rate</h4>
                <p>Enjoy economical travel without sacrificing quality. Our transparent pricing offers budget-friendly rates, making every trip with <?php print $siteName; ?> a cost-effective choice.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
              <div class="feature-icon">
                <img src="assets/img/icon/support.svg" alt>
              </div>
              <div class="feature-content">
                <h4>24/7 Support</h4>
                <p>We're here whenever you need us. Our round-the-clock customer support team is ready to assist with any questions or concerns, ensuring a smooth and convenient experience.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- <div class="taxi-rate py-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="site-heading text-center">
              <span class="site-title-tagline">Taxi Rate</span>
              <h2 class="site-title">Our Taxi Rate For You</h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="rate-item wow fadeInUp" data-wow-delay=".25s">
              <div class="rate-header">
                <div class="rate-img">
                  <img src="assets/img/rate/01.png" alt>
                </div>
              </div>
              <div class="rate-header-content">
                <h4>Basic Pakage</h4>
                <p class="rate-duration">One Time Payment</p>
              </div>
              <div class="rate-content">
                <div class="rate-icon">
                  <img src="assets/img/icon/taxi-1.svg" alt>
                </div>
                <div class="rate-feature">
                  <ul>
                    <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                    <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                    <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                    <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                    <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                  </ul>
                  <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="rate-item wow fadeInDown" data-wow-delay=".25s">
              <div class="rate-header">
                <div class="rate-img">
                  <img src="assets/img/rate/01.png" alt>
                </div>
              </div>
              <div class="rate-header-content">
                <h4>Standard Pakage</h4>
                <p class="rate-duration">One Time Payment</p>
              </div>
              <div class="rate-content">
                <div class="rate-icon">
                  <img src="assets/img/icon/taxi-1.svg" alt>
                </div>
                <div class="rate-feature">
                  <ul>
                    <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                    <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                    <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                    <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                    <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                  </ul>
                  <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="rate-item wow fadeInUp" data-wow-delay=".25s">
              <div class="rate-header">
                <div class="rate-img">
                  <img src="assets/img/rate/01.png" alt>
                </div>
              </div>
              <div class="rate-header-content">
                <h4>Premium Pakage</h4>
                <p class="rate-duration">One Time Payment</p>
              </div>
              <div class="rate-content">
                <div class="rate-icon">
                  <img src="assets/img/icon/taxi-1.svg" alt>
                </div>
                <div class="rate-feature">
                  <ul>
                    <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                    <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                    <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                    <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                    <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                  </ul>
                  <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->



    <div class="faq-area py-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="faq-right">
              <div class="site-heading mb-3">
                <span class="site-title-tagline justify-content-start">Faq's</span>
                <h2 class="site-title my-3"> <span>frequently</span> asked questions</h2>
              </div>
              <p class="about-text"></p>
              <div class="faq-img mt-3">
                <img src="assets/img/faq/01.jpg" alt>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span><i class="far fa-question"></i></span> How do I book a taxi with <?php print $siteName; ?>?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Booking a taxi with us is easy. You can call our hotline or use our user-friendly website to make a reservation quickly and conveniently.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span><i class="far fa-question"></i></span> Are your drivers licensed and experienced?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Absolutely. We take pride in our professional and experienced drivers who are fully licensed and undergo rigorous training and background checks to ensure your safety and comfort.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span><i class="far fa-question"></i></span> Can I get a fare estimate before my ride?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Yes, you can. We provide an online fare calculator on our website and app. Simply enter your pickup and drop-off locations, and you'll receive an instant estimate of the fare for your trip.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <span><i class="far fa-question"></i></span> Is <?php print $siteName; ?> available 24/7?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Yes, we are. We operate round the clock, 365 days a year. Whether you need a ride in the early morning or late at night, we're here to serve you anytime you require transportation.
                  </div>
                </div>

              </div>
            </div>
            <p>Contact: <?php print $sitePhone; ?> for more enquires.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="testimonial-area py-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="site-heading text-center">
              <span class="site-title-tagline"><i class="flaticon-drive"></i> Testimonials</span>
              <h2 class="site-title text-white">What Our Client <span>Say's</span></h2>
              <div class="heading-divider"></div>
            </div>
          </div>
        </div>
        <div class="testimonial-slider owl-carousel owl-theme">
          <div class="testimonial-single">
            <div class="testimonial-content">
              <div class="testimonial-author-img">
                <img src="assets/img/testimonial/01.jpg" alt>
              </div>
              <div class="testimonial-author-info">
                <h4>Sylvia Green</h4>
                <p>Customer</p>
              </div>
            </div>
            <div class="testimonial-quote">
              <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
              <p>
                <?php print $siteName; ?> is my go-to choice for travel. Their drivers are courteous, the cars are clean, and the service is prompt. Highly recommended!
              </p>
            </div>
            <div class="testimonial-rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-single">
            <div class="testimonial-content">
              <div class="testimonial-author-img">
                <img src="assets/img/testimonial/02.jpg" alt>
              </div>
              <div class="testimonial-author-info">
                <h4>Gordo Novak</h4>
                <p>Customer</p>
              </div>
            </div>
            <div class="testimonial-quote">
              <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
              <p>
                I rely on <?php print $siteName; ?> for airport transfers. Their 24/7 availability, professional drivers, and competitive rates make every journey stress-free. Exceptional service all around.
              </p>
            </div>
            <div class="testimonial-rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-single">
            <div class="testimonial-content">
              <div class="testimonial-author-img">
                <img src="assets/img/testimonial/03.jpg" alt>
              </div>
              <div class="testimonial-author-info">
                <h4>Reid Butt</h4>
                <p>Customer</p>
              </div>
            </div>
            <div class="testimonial-quote">
              <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
              <p>
                Affordable and dependable – <?php print $siteName; ?> has never let me down. The ease of online booking and their commitment to safety make them my preferred transportation service.
              </p>
            </div>
            <div class="testimonial-rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-single">
            <div class="testimonial-content">
              <div class="testimonial-author-img">
                <img src="assets/img/testimonial/04.jpg" alt>
              </div>
              <div class="testimonial-author-info">
                <h4>Parker Jime</h4>
                <p>Customer</p>
              </div>
            </div>
            <div class="testimonial-quote">
              <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
              <p>
                <?php print $siteName; ?>'s customer support is top-notch. I appreciate their quick response to queries and their dedication to ensuring a smooth and enjoyable travel experience.
              </p>
            </div>
            <div class="testimonial-rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-single">
            <div class="testimonial-content">
              <div class="testimonial-author-img">
                <img src="assets/img/testimonial/05.jpg" alt>
              </div>
              <div class="testimonial-author-info">
                <h4>Heruli Nez</h4>
                <p>Customer</p>
              </div>
            </div>
            <div class="testimonial-quote">
              <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
              <p>
                <?php print $siteName; ?> goes the extra mile for their customers. Their friendly drivers, clean vehicles, and punctuality have made my daily commute a breeze. A reliable partner in travel.
              </p>
            </div>
            <div class="testimonial-rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="cta-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 text-center text-lg-start">
            <div class="cta-text cta-divider">
              <h1>Book Your Cab It's Simple And Affordable</h1>
              <p>Booking a ride with us is easy! You can call, book online, or use our web app for seamless reservations.</p>
            </div>
          </div>
          <div class="col-lg-5 text-center text-lg-end">
            <div class="mb-20">
              <a href="tel:<?php print $sitePhone; ?>" class="cta-number"><i class="far fa-headset"></i><?php print $sitePhone; ?></a>
            </div>
            <div class="cta-btn">
              <a href="book" class="theme-btn">Book Your Cab<i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="download-area mb-120">
      <div class="container">
        <div class="download-wrapper">
          <div class="row">
            <div class="col-lg-6">
              <div class="download-content">
                <div class="site-heading mb-4">
                  <span class="site-title-tagline justify-content-start">
                    <i class="flaticon-drive"></i> App Coming soon...
                  </span>
                  <h2 class="site-title mb-10">Download <span>Our <?php print $siteName; ?></span> App For Free</h2>
                  <p>
                    Coming soon...
                  </p>
                </div>
                <div class="download-btn">
                  <a href="#">
                    <i class="fab fa-google-play"></i>
                    <div class="download-btn-content">
                      <span>Get It On</span>
                      <strong>Google Play</strong>
                    </div>
                  </a>
                  <a href="#">
                    <i class="fab fa-app-store"></i>
                    <div class="download-btn-content">
                      <span>Get It On</span>
                      <strong>App Store</strong>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="download-img">
            <img src="assets/img/download/01.png" alt>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php require_once('footer.php'); ?>