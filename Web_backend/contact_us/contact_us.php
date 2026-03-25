<?php
include 'dbconnect.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="contactus.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
<script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
  
  <?php if (!empty($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'success') {
      echo '<script>toastr.success("User Added Successfully");</script>';
    } else {
      echo '<script>toastr.error("Error");</script>';
    }
  }
  ?>
  
  <section class="contact-us">
    <div class="maincontainer">
      <div class="navigation_bar">
        <div class="logo">
          <img src="logo1.png" alt="Logo" style="width: 100%; height: auto;">
        </div>
        <div class="navigation_button_container">
          <ul class="navigation_buttons">
            <li class="text_container"><a href="#">Home</a></li>
            <li class="text_container"><a href="#">Services</a></li>
            <li class="text_container"><a href="#">About Us</a></li>
            <li class="text_container"><a href="#">Contact Us</a></li>
            <li class="text_container"><a href="#">Review</a></li>
            <li class="book_now"><a href="#">BOOK NOW</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <!-- Left Section -->
    <div class="left-section">
      <h2>Contact Details</h2>
      <p>📞 07774584477</p>
      <p>📞 0745145053</p>
      <p>📧 lalandnihalautoworks@gmail.com</p>

      <h2>Find Us</h2>
      <div class="map-image">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.377556684563!2d79.9316129748089!3d6.845261093152985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251c01adc2b11%3A0x4961e51edaece264!2sLAL%20AND%20NIHAL%20AUTOWORKS!5e0!3m2!1sen!2slk!4v1740552549131!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
      <h2>Reach Out to Us</h2>
      <form id="form1" action="insert_user_review_function.php" method="post">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your Name">

        <label for="address">Your Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your Address">

        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email">

        <label for="message">Your Message</label>
        <textarea id="message" name="message" placeholder="Write your message"></textarea>

        <div class="form-buttons">
          <button type="reset" class="reset-btn">Reset</button>
          <button type="submit" class="submit-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <!-- <footer style="text-align: center; padding: 10px; background: #111; color: #fff;">
    <p>© 2025 Lal & Nihal Autoworks | All Rights Reserved</p>
  </footer> -->
  <footer>
    <div class="mainfContainer"> <!--Main container with dark wrapper-->
      <div class="fContainer"> <!--Second container to hold three section-->
        <div class="colSection"> <!--Quick links section-->
          <h4>Quick Links</h4>
          <span class="quickList">
            <li><a href="">Home</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Rate Us</a></li>
            <li><a href="">Book Now</a></li>
          </span>
        </div>



        <div class="colSection"> <!--Working hours and Connect with us Section-->
          <h4>Working Hours</h4>
          <p>Monday to Saturday from <span class="bold">9:00 a.m</span> to <span class="bold"> 5:00 p.m</span>
          </p>
          <h4>Connect with us</h4>
          <div class="iconContainer">
            <div class="icon">
              <!-- facebook icon -->
              <a href="https://www.facebook.com/profile.php?id=100063969882558&mibextid=ZbWKwL" target="_blank" class="linkimg"><img src="images/icons/facebook.svg" alt="" class="img"></a>

              <!-- tiktok icon -->
              <a href="https://www.tiktok.com/@lalandnihalautowo?_t=8pzN6q7SPR9&_r=1" target="_blank" class="linkimg"><img src="Lal Nihal Web\Contact Us/tiktok.svg" alt="" class="img"></a>

              <!-- Email icon -->
              <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsCSnVxvqJRDxMGlKGcmcVFVSgRGqbvdxPsCZPGfkPHxFnLpjMzDPhFdpLdbvcdFhMPptJsB" target="_blank" class="linkimg"><img src="images/icons/gmail.svg" alt="" class="img"></a>

              <!-- whatsapp icon -->
              <a href="https://web.whatsapp.com/" target="_blank" class="linkimg"><img src="whatsapp.png" alt="" class="img"></a>
            </div>
          </div>
        </div>


        <div class="colSection"> <!--email address and contact number section-->
          <p class="contactDetails">lalandnihalautoworks@gmail.com</p>
          <address class="contactDetails">
            249/A Railway avenue,
            High level Rd,
            Colombo 10280.
          </address>
          <p class="contactDetails">Contact : 0777458477</p>
        </div>
      </div>

    </div>
  </footer>
  <div class="holder"> <!--copywright-->
    &copy;2025 Copyright, Lal & Nihal Autoworks
  </div>


</body>

</html>