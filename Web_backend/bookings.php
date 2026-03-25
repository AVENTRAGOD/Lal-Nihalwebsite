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




  <?php include('sidebar_navigation.php'); ?>

  <section class="home">
    <div class="container mt-5">
      <?php
      // Check if the filter button was clicked
      $filterToday = isset($_GET['filter']) && $_GET['filter'] == 'today';

      $sql = "SELECT b.id, b.date, c.fname, c.lname, c.idnumber, c.phone, c.manufacture, c.model, c.vehicle_number
        FROM bookings b
        JOIN registered_customers c ON b.cus_id = c.id";

      // Apply filter for today's bookings
      if ($filterToday) {
        $sql .= " WHERE DATE(b.date) = CURDATE()";
      }

      $sql .= " ORDER BY b.date DESC"; // Order by latest bookings first
      $result = $conn->query($sql);
      ?>
      <h2 class="mb-4">Bookings with Customer Details</h2>

      <div class="mb-3">
        <a href="?filter=today" class="btn btn-primary">Filter Today</a>
        <a href="?" class="btn btn-secondary">Reset</a>
      </div>



      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID Number</th>
            <th>Phone</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Vehicle Number</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $formatted_date = date("Y-m-d", strtotime($row['date']));
              echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$formatted_date}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['idnumber']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['manufacture']}</td>
                        <td>{$row['model']}</td>
                        <td>{$row['vehicle_number']}</td>
                        <td>
                            <button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#viewModal{$row['id']}'>View</button>
                        </td>
                      </tr>";

              // Fetch requested services for this booking
              $services_sql = "SELECT service FROM requested_services WHERE booking_id = {$row['id']}";
              $services_result = $conn->query($services_sql);
              $services_list = [];
              while ($service_row = $services_result->fetch_assoc()) {
                $services_list[] = $service_row['service'];
              }
              $services_display = !empty($services_list) ? implode(", ", $services_list) : "No services requested.";

              // Modal for booking details
              echo "
                <div class='modal fade' id='viewModal{$row['id']}' tabindex='-1' aria-labelledby='viewModalLabel{$row['id']}' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='viewModalLabel{$row['id']}'>Booking Details</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <p><strong>Booking ID:</strong> {$row['id']}</p>
                                <p><strong>Date:</strong> {$formatted_date}</p>
                                <p><strong>Name:</strong> {$row['fname']} {$row['lname']}</p>
                                <p><strong>ID Number:</strong> {$row['idnumber']}</p>
                                <p><strong>Phone:</strong> {$row['phone']}</p>
                                <p><strong>Manufacturer:</strong> {$row['manufacture']}</p>
                                <p><strong>Model:</strong> {$row['model']}</p>
                                <p><strong>Vehicle Number:</strong> {$row['vehicle_number']}</p>
                                <p><strong>Requested Services:</strong> {$services_display}</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
          } else {
            echo "<tr><td colspan='10' class='text-center'>No bookings found.</td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>
  </section>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>