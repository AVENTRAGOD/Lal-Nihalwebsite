<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking1 | Lal & Nihal AutoWorks</title>
    <link href="'https://fonts.googleapis.com/css?family=Montserrat:300,400,700'" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="booking.css">
</head>
<body>
   <div id="m1">              <!--main div-->

    <div id="gradient_wrapper">
    <?php include 'navigation_bar.php'; ?>
      <form action="booking3.php" method="POST" style="
    position: absolute;
    margin-top: 263px;
    margin-left: 44%;
    text-align: center;
">
        <div class="input">                        <!--input-->
            <input type="text" id="n_num" name="vnumber" placeholder="ENTER VEHICLE NUMBER">
        </div>
        <div class="submit">                     <!--submit-->
            <button type="submit">GO</button>
        </div>
      </form>
    </div>

    <footer>
      <div class="mainfContainer">
        <!--Main container with dark wrapper-->
        <div class="fContainer">
          <!--Second container to hold three section-->
          <div class="colSection">
            <!--Quick links section-->
            <h4>Quick Links</h4>
            <span class="quickList">
              <li><a href="home.html">Home</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="aboutus.html">About Us</a></li>
              <li><a href="contactus.html">Contact Us</a></li>
              <li><a href="review.html">Rate Us</a></li>
              <li><a href="booknow.html">Book Now</a></li>
            </span>
          </div>

          <div class="colSection">
            <!--Working hours and Connect with us Section-->
            <h4>Working Hours</h4>
            <p>
              Monday to Saturday from <span class="bold">9:00 a.m</span> to
              <span class="bold"> 5:00 p.m</span>
            </p>
            <h4>Connect with us</h4>
            <div class="iconContainer">
              <div class="icon">
                <!-- facebook icon -->
                <a
                  href="https://www.facebook.com/profile.php?id=100063969882558&mibextid=ZbWKwL"
                  target="_blank"
                  class="linkimg"
                  ><img src="images/icons/facebook.svg" alt="" class="img"
                /></a>

                <!-- tiktok icon -->
                <a
                  href="https://www.tiktok.com/@lalandnihalautowo?_t=8pzN6q7SPR9&_r=1"
                  target="_blank"
                  class="linkimg"
                  ><img src="images/icons/tiktok.svg" alt="" class="img"
                /></a>

                <!-- Email icon -->
                <a
                  href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsCSnVxvqJRDxMGlKGcmcVFVSgRGqbvdxPsCZPGfkPHxFnLpjMzDPhFdpLdbvcdFhMPptJsB"
                  target="_blank"
                  class="linkimg"
                  ><img src="images/icons/gmail.svg" alt="" class="img"
                /></a>

                <!-- whatsapp icon -->
                <a
                  href="https://web.whatsapp.com/"
                  target="_blank"
                  class="linkimg"
                  ><img src="images/icons/whatsapp.svg" alt="" class="img"
                /></a>
              </div>
            </div>
          </div>

          <div class="colSection">
            <!--email address and contact number section-->
            <p class="contactDetails">lalandnihalautoworks@gmail.com</p>
            <address class="contactDetails">
              249/A Railway avenue, High level Rd, Colombo 10280.
            </address>
            <p class="contactDetails">Contact : 0777458477</p>
          </div>
        </div>
      </div>
    </footer>
    <div class="holder">
      <!--copywright-->
      &copy;2025 Copyright, Lal & Nihal Autoworks
    </div>
    <!-- footer -->  
</body>
</html>