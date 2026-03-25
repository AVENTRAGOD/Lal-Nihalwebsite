<?php
include 'dbconnect.php';
$sql = "SELECT id,name,email,address,address,message,response from reachout ORDER BY id DESC";
$result = $conn->query($sql);
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

  <?php include('sidebar_navigation.php'); ?>

  <section class="home">
    <div class="container mt-5">
      <h2>Reach-outs</h2>
      <?php if (!empty($_GET['status'])) {
        $status = $_GET['status'];
        if ($status == 'success') {
          echo '<script>toastr.success("User Added Successfully");</script>';
        } else {
          echo '<script>toastr.error("Error");</script>';
        }
      }

      if (!empty($_GET['update_status'])) {
        $status = $_GET['update_status'];
        if ($status == 'success') {
          echo '<script>toastr.success("User Updated Successfully");</script>';
        } else {
          echo '<script>toastr.error("Error");</script>';
        }
      }

      if (!empty($_GET['delete_status'])) {
        $status = $_GET['delete_status'];
        if ($status == 'success') {
          echo '<script>toastr.success("User Delete Successfully");</script>';
        } else {
          echo '<script>toastr.error("Error");</script>';
        }
      }
      ?>
      <button style="display:none;" id="addnew" type="button" class="btn btn-primary">Add New</button>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Response</th>
          </tr>
        </thead>
        <?php       
       
        if (mysqli_num_rows($result)>0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo '<td><a href="mailto:'. $row['email'] .'"><button type="button" class="btn btn-warning">Response</button></a></td>';
            echo '<td><a href="./edit_user_review.php?id=' . $row['id'] . '"><button type="button" class="btn btn-primary">Edit</button></a></td>';
            echo '<td><button onclick="deleteConfirmation(' . $row['id'] . ')" type="button" class="btn btn-danger">Delete</button></td>';
           
            echo "<tr>";
          }
        } else {
          echo "<tr><td>No users Found </td></tr>";
        }
        ?>
      </table>
    </div>
  </section>

  <script>
    document.getElementById('addnew').addEventListener('click', function() {
      window.location.href = '/hshi/userreview.php';
    });

    function deleteConfirmation(id) {

      let text = "Are you sure you want to delete this record?";
      if (confirm(text) == true) {
        //text = "You pressed OK!";
        window.location = "delete_review_function.php?id=" + id;
      } else {

      }

    }
  </script>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>