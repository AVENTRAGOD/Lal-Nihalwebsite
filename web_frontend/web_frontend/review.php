<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rate us | Lal & Niha Autoworks</title>
  <link rel="stylesheet" href="review.css">
  <link rel="stylesheet" href="services.css">
  <link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,500,700' rel='stylesheet' type='text/css'> <!--normal font-weight: 400-->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body>
  <div class="container_one">
    <div class="gradient_wrapper">
    <?php include 'navigation_bar.php'; ?>
      <!-- white background -->
      <div class="review_ground">
        <p class="head"><span class="bold">Lal & Nihal</span><br> Autoworks</p>
        <div class="main_container">
          <div class="sectionHolders">
            <!-- <p class="wtopic">write a review</p> -->
            <span class="sectionHeaders">write a direct review</span>

            <div class="write">
              <form action="" method="post">
                <table>
                  <tr>
                    <th><label for="name" class="adjust">Your Name</label></th>
                    <td><input type="text" name="name" class="text" placeholder="Enter Your name here"></td>
                  </tr>
                  <tr>
                    <th><label for="name" class="adjust">Rate us</label></th>
                    <td><input type="range" name="rate" value="50" min="1" max="100" oninput="this.nextElementSibling.value = this.value" class="range"><output class="output">50</output>%</td>
                  </tr>
                  <tr>
                    <th><label for="name" class="adjust">Your Feedback</label></th>
                    <td><textarea name="feedback" id="feedback" class="text" placeholder="Enter your feedback"></textarea></td>
                  </tr>
                </table>
                <button type="submit" class="submitButton">submit</button>
              </form>

            </div>
          </div>
          <div class="sectionHolders">
            <span class="sectionHeaders">customer feedbacks</span>

            <div class="write">
              <!-- Elfsight Google Reviews | Untitled Google Reviews -->
              <!-- Elfsight Google Reviews | Untitled Google Reviews -->
              <script src="https://static.elfsight.com/platform/platform.js" async></script>
              <!-- <div class="elfsight-app-b15620a1-2db9-4cd0-bb12-d7759af7db59" data-elfsight-app-lazy></div> -->
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
    <div class="mainfContainer"> <!--Main container with dark wrapper-->
      <div class="fContainer"> <!--Second container to hold three section-->
        <div class="colSection"> <!--Quick links section-->
          <h4>Quick Links</h4>
          <span class="quickList">
            <li><a href="">Home</a></li>
            <li><a href="services.html">Services</a></li>
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
              <a href="https://www.tiktok.com/@lalandnihalautowo?_t=8pzN6q7SPR9&_r=1" target="_blank" class="linkimg"><img src="images/icons/tiktok.svg" alt="" class="img"></a>

              <!-- Email icon -->
              <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsCSnVxvqJRDxMGlKGcmcVFVSgRGqbvdxPsCZPGfkPHxFnLpjMzDPhFdpLdbvcdFhMPptJsB" target="_blank" class="linkimg"><img src="images/icons/gmail.svg" alt="" class="img"></a>

              <!-- whatsapp icon -->
              <a href="https://web.whatsapp.com/" target="_blank" class="linkimg"><img src="images/icons/whatsapp.svg" alt="" class="img"></a>
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
    &copy;2024 Copyright, Lal & Nihal Autoworks
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>

</html>