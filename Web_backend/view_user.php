<?php
include 'dbconnect.php';
$sql = "SELECT id,name,email,address,address,message,response from reachout";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5-Column Table</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <h2>Reach-outs</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">User_name</th>
          <th scope="col">Address</th>
          <th scope="col">E-mail_Address</th>
          <th scope="col">Message</th>
          <th scope="col">Response</th>
        </tr>
      </thead>
      <?php
      if ($result->fetch_assoc()) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['message'] . "</td>";
          echo "<td>" . $row['response'] . "</td>";
          echo "<tr>";
        }
      } else {
        echo "<tr><td>No users Found </td></tr>";
      }
      ?>
    </table>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>