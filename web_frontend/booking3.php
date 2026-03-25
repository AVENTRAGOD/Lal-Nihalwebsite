<?php error_reporting(E_ERROR | E_PARSE); ?>

<?php
// Get the current month and year
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// Highlighted dates (format: YYYY-MM-DD)
$highlighted_dates = [
    "$year-03-05",
    "$year-03-12",
    "$year-03-20" // Example dates
];

// Get the first day of the month and number of days in the month
$first_day = date('w', strtotime("$year-$month-01"));
$days_in_month = date('t', strtotime("$year-$month-01"));

$prev_month = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
$prev_year = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
$next_month = date('m', strtotime("+1 month", strtotime("$year-$month-01")));
$next_year = date('Y', strtotime("+1 month", strtotime("$year-$month-01")));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking3 | Lal & Nihal AutoWorks</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="csssheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 300px;
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            width: 14.28%;
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background: #f4f4f4;
        }

        .highlight {
            background: red;
            font-weight: bold;
            color: white;
        }

        .nav a {
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }
    </style>
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

    <div class="container_one">
        <div class="gradient_wrapper">
        <?php include 'navigation_bar.php'; ?>
        
            <?php
    if (!empty($_GET['date_validation'])) {
        $status = $_GET['date_validation'];
        if ($status == 'failed') {
            $error = 'Maximum 4 bookings allowed per day! '. $_GET['date']. ' is not available.';
            echo '<script>toastr.error("'.$error.'");</script>';
        }
    }

    if (!empty($_GET['status'])) {
        $status = $_GET['status'];
        if ($status == 'success') {
          
            echo '<script>toastr.success("Booking saved successfully");</script>';
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Appointment Reservation</h1>
            </div>
        </div>
        <?php
        include 'dbconnect.php';
        $record_status = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $vnumber = $_POST['vnumber'];
            $sql = "SELECT * from registered_customers where vehicle_number='$vnumber'";
            $result = $conn->query($sql);


            if (mysqli_num_rows($result) > 0) {
                $record_status = "existing";
                $row = $result->fetch_assoc();
            } else {
                $record_status = "new";
            }
        }
        ?>
        <form action="insert_new_booking.php" method="POST">
            <?php
            if ($record_status == "existing") {
                echo '<input type="hidden" name="record_status" value="existing">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            } else {
                echo '<input type="hidden" name="record_status" value="new">';
            }
            ?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <div class="" style="margin-top: 20px;">First Name</div>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="firstname" value="' . $row['fname'] . '" id="mybox" placeholder="Enter your First name">';
                    } else {
                        echo '<input type="text" name="firstname" id="mybox" placeholder="Enter your First name">';
                    }
                    ?>
                </div>
                <div class="col text-left">
                    <div class="" style="margin-top: 20px;">Last Name</div>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="lastname" value="' . $row['lname'] . '" id="mybox2" placeholder="Enter your Last name">';
                    } else {
                        echo '<input type="text" name="lastname" id="mybox2" placeholder="Enter your Last name">';
                    }
                    ?>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <div class="">Phone Number</div>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="phone" value="' . $row['phone'] . '" id="mybox3" placeholder="Enter your Phone Number">';
                    } else {
                        echo '<input type="text" name="phone" id="mybox3" placeholder="Enter your Phone Number">';
                    }
                    ?>
                </div>
                <div class="col text-left">
                    <div class="">ID Number</div>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="idnumber" value="' . $row['idnumber'] . '" id="mybox4" placeholder="Enter your ID number">';
                    } else {
                        echo '<input type="text" name="idnumber" id="mybox4" placeholder="Enter your ID number">';
                    }
                    ?>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <div class="">Vehicle Number</div>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="vehicle_num" value="' . $row['vehicle_number'] . '" id="vehicle_num" placeholder="Enter your Vehicle Number">';
                    } else {
                        echo '<input type="text" name="vehicle_num" id="vehicle_num" placeholder="Enter your Vehicle Number">';
                    }
                    ?>
                </div>
                <div class="col text-left">

                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-4 text-left">
                    <div class="">Vehicle Type</div>
                    <select name="manufacture">
                        <option value="KIA" <?= $row['manufacture'] == 'KIA' ? ' selected="selected"' : ''; ?>>KIA</option>
                        <option value="HYUNDAI" <?= $row['manufacture'] == 'HYUNDAI' ? ' selected="selected"' : ''; ?>>HYUNDAI</option>
                        <option value="HONDA" <?= $row['manufacture'] == 'HONDA' ? ' selected="selected"' : ''; ?>>HONDA</option>
                        <option value="MINI COOPER" <?= $row['manufacture'] == 'MINI COOPER' ? ' selected="selected"' : ''; ?>>MINI COOPER</option>
                        <option value="TOYOTA" <?= $row['manufacture'] == 'TOYOTA' ? ' selected="selected"' : ''; ?>>TOYOTA</option>
                        <option value="CHERY" <?= $row['manufacture'] == 'CHERY' ? ' selected="selected"' : ''; ?>>CHERY</option>
                        <option value="GEELY" <?= $row['manufacture'] == 'GEELY' ? ' selected="selected"' : ''; ?>>GEELY</option>
                        <option value="LEXUS" <?= $row['manufacture'] == 'LEXUS' ? ' selected="selected"' : ''; ?>>LEXUS</option>
                        <option value="MAZDA" <?= $row['manufacture'] == 'MAZDA' ? ' selected="selected"' : ''; ?>>MAZDA</option>
                        <option value="NIZZAN" <?= $row['manufacture'] == 'NIZZAN' ? ' selected="selected"' : ''; ?>>NIZZAN</option>
                        <option value="MITSUBISHI" <?= $row['manufacture'] == 'MITSUBISHI' ? ' selected="selected"' : ''; ?>>MITSUBISHI</option>
                        <option value="PEUGEOT" <?= $row['manufacture'] == 'PEUGEOT' ? ' selected="selected"' : ''; ?>>PEUGEOT</option>
                        <option value="SUZUKI" <?= $row['manufacture'] == 'SUZUKI' ? ' selected="selected"' : ''; ?>>SUZUKI</option>
                        <option value="RENAULT" <?= $row['manufacture'] == 'RENAULT' ? ' selected="selected"' : ''; ?>>RENAULT</option>
                    </select>
                    <?php
                    if ($record_status == "existing") {
                        echo '<input type="text" name="model" value="' . $row['model'] . '" id="mybox4" placeholder="Enter your Vehicle model">';
                    } else {
                        echo '<input type="text" name="model" id="mybox4" placeholder="Enter your Vehicle model">';
                    }
                    ?>

                </div>
                <div class="col-5">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php // Calendar php
                    // Get the current month and year
                    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                    $highlighted_dates = [];

                    $sql = "SELECT DATE(date) AS full_day 
                            FROM bookings 
                            WHERE date <> '0000-00-00 00:00:00'
                            GROUP BY full_day
                            HAVING COUNT(*) > 3
                            ORDER BY full_day;";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $highlighted_dates[] = $row['full_day'];
                        }
                    }

                    $conn->close();


                    // Get the first day of the month and number of days in the month
                    $first_day = date('w', strtotime("$year-$month-01"));
                    $days_in_month = date('t', strtotime("$year-$month-01"));

                    $prev_month = date('m', strtotime("-1 month", strtotime("$year-$month-01")));
                    $prev_year = date('Y', strtotime("-1 month", strtotime("$year-$month-01")));
                    $next_month = date('m', strtotime("+1 month", strtotime("$year-$month-01")));
                    $next_year = date('Y', strtotime("+1 month", strtotime("$year-$month-01")));
                    ?>
                    <h2 style="margin-top: 20px;">Availability - <?php echo date('F Y', strtotime("$year-$month-01")); ?></h2>
                    <div style="font-weight: 700;">
                        <a href="?month=<?php echo $prev_month; ?>&year=<?php echo $prev_year; ?>">&laquo; Previous</a>
                        <a href="?month=<?php echo $next_month; ?>&year=<?php echo $next_year; ?>">Next &raquo;</a>
                    </div>

                    <table>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                        <tr>
                            <?php
                            // Empty cells before the first day
                            for ($i = 0; $i < $first_day; $i++) {
                                echo "<td></td>";
                            }

                            for ($day = 1; $day <= $days_in_month; $day++) {
                                $current_date = "$year-$month-" . str_pad($day, 2, "0", STR_PAD_LEFT);
                                $class = in_array($current_date, $highlighted_dates) ? 'highlight' : '';

                                echo "<td class='$class'>$day</td>";

                                // Break the row on Saturday
                                if (($day + $first_day) % 7 == 0) {
                                    echo "</tr><tr>";
                                }
                            }

                            // Fill remaining empty cells
                            while (($day + $first_day) % 7 != 1) {
                                echo "<td></td>";
                                $day++;
                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <div style="margin-left: 10px;margin-top: 20px;">
                        <div class="">Pick a Date & Time</div>
                        <input name="date" type="datetime-local" class="date-input">
                    </div>
                </div>
                <div class="col text-left">
                </div>
                <div class="col">
                </div>
            </div>

            <!-- secnd  -->
        <div class="containerSub">
                            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <h2 style="margin-top: 20px;">Full Service</h2><br>
                    <label><input type="checkbox" name="service[]" value="General Check">Full Service</label><br>
                    <label><input type="checkbox" name="service[]" value="Engine Check">Engine Check</label><br>
                    <label><input type="checkbox" name="service[]" value="Fluid Check">Fluid Check</label><br>
                    <label><input type="checkbox" name="service[]" value="Change Clutch Pads">Change Clutch Pads</label><br>
                    <label><input type="checkbox" name="service[]" value="Change Brake Pads">Change Brake Pads</label><br>
                    <label><input type="checkbox" name="service[]" value="Steering Check">Steering Check</label><br>
                    <label><input type="checkbox" name="service[]" value="Suspension Check">Suspension Check</label><br>
                    <label><input type="checkbox" name="service[]" value="Exhaust Check">Exhaust Check</label><br>
                    <label><input type="checkbox" name="service[]" value="Brake System Inspection">Brake System Inspection</label>
                </div>
                <div class="col text-left">
                    <h2 style="margin-top: 20px;">Engine Repair</h2><br>
                    <label><input type="checkbox" name="service[]" value="Engine Overhaul">Engine Overhaul</label><br>
                    <label><input type="checkbox" name="service[]" value="Fixing Oil Leaks">Fixing Oil Leaks</label><br>
                    <label><input type="checkbox" name="service[]" value="Engine Oil Changes">Engine Oil Changes</label>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-3 text-left">
                    <h2 style="margin-top: 20px;">Minor Service</h2><br>
                    <label><input type="checkbox" name="service[]" value="Filter Replacement">Filter Replacement</label><br>
                    <label><input type="checkbox" name="service[]" value="Vehicle Greasing">Vehicle Greasing</label><br>
                    <label><input type="checkbox" name="service[]" value="Tyre Rotation">Tyre Rotation</label><br>
                    <label><input type="checkbox" name="service[]" value="Engine Oil Replacement">Engine Oil Replacement</label>
                </div>
                <div class="col-4 text-left">
                    <h2 style="margin-top: 20px;">Tinkering & Painting</h2><br>
                    <label><input type="checkbox" name="service[]" value="Tinkering">Tinkering</label><br>
                    <label><input type="checkbox" name="service[]" value="Painting">Painting</label><br>
                    <label><input type="checkbox" name="service[]" value="Polishing">Polishing</label>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col text-left">
                    <button type="submit" class="btn btn-success" style="margin-top: 20px;">Submit</button>
                </div>
                <div class="col text-left">

                </div>
                <div class="col text-left">

                </div>
            </div>
        </form>
    </div>
    </div>
        </div>

</div>
            
    
    <div class="footer" >
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
                                <a href="https://www.tiktok.com/@lalandnihalautowo?_t=8pzN6q7SPR9&_r=1" target="_blank" class="linkimg"><img src="images/icons/tiktok.svg" alt="" class="img"></a>

                                <!-- Email icon -->
                                <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsCSnVxvqJRDxMGlKGcmcVFVSgRGqbvdxPsCZPGfkPHxFnLpjMzDPhFdpLdbvcdFhMPptJsB" target="_blank" class="linkimg"><img src="images/icons/email_icon-01.png" alt="" class="img"></a>

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
    </div>
</body>

</html>