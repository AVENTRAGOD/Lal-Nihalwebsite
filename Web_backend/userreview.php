<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Lal & Nihal AutoWorks</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php include('sidebar_navigation.php'); ?>

  <section class="home">
    <div class="container mt-5">

   
      <form id="form1" action="insert_user_review_function.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter Name">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" aria-describedby="address" placeholder="Enter Address">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">          
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <input type="text" class="form-control" name="message" id="message" aria-describedby="message" placeholder="Enter Message">
        </div>

        <div class="form-group">
          <label for="response">Response</label>
          <input type="text" class="form-control" name="response" id="response" aria-describedby="response" placeholder="Enter Response">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </section>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
        // function validateForm() {
            
        //     let email = document.forms["form1"]["email"].value;
            
        //     let error = "";
            
        //     if (email.trim() === "") {
        //         error += "Email is required.\n";
        //     } else if (!email.match(/^\S+@\S+\.\S+$/)) {
        //         error += "Invalid email format.\n";
        //     }            

        //     if (error) {
        //         alert(error);
        //         return false; // Prevent form submission
        //     }
        //     return true; // Allow form submission
        // }
    </script>
</body>

</html>