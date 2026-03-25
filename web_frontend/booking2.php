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
    <title>Booking2 | Lal & Nihal AutoWorks</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="csssheet.css">
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
            background: #ffcc00;
            font-weight: bold;
        }

        .nav a {
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container_one">
        <div class="gradient_wrapper">
            <div class="navigation_bar">
                <div class="logo"></div>
                <div class="navigation_button_container">
                    <span class="navigation_buttons">
                        <li class="text_container"><a href="#">Home</a></li>
                        <li class="text_container"><a href="services.html">Services</a></li>
                        <li class="text_container"><a href="#">About Us</a></li>
                        <li class="text_container"><a href="#">Contact Us</a></li>
                        <li class="text_container"><a href="#">Review</a></li>
                        <li class="book_now"><a href="#">BOOK NOW</a></li>
                    </span>
                </div>
            </div>
            <div class="containerbox">
                <div id="titlebox">
                    <h1>Appointment Reservation</h1>
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
                    <div class="tableContainer" style="margin-top: 144px;">
                        <div id="lefttable">
                            <table border="0">
                                <tr id="title">
                                    <th>First Name</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        if ($record_status == "existing") {
                                            echo '<input type="text" name="firstname" value="' . $row['fname'] . '" id="mybox" placeholder="Enter your First name">';
                                        } else {
                                            echo '<input type="text" name="firstname" id="mybox" placeholder="Enter your First name">';
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <tr id="title">
                                    <th>Last Name</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        if ($record_status == "existing") {
                                            echo '<input type="text" name="lastname" value="' . $row['lname'] . '" id="mybox2" placeholder="Enter your Last name">';
                                        } else {
                                            echo '<input type="text" name="lastname" id="mybox2" placeholder="Enter your Last name">';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr id="title">
                                    <th>Phone Number</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        if ($record_status == "existing") {
                                            echo '<input type="text" name="phone" value="' . $row['phone'] . '" id="mybox3" placeholder="Enter your Phone Number">';
                                        } else {
                                            echo '<input type="text" name="phone" id="mybox3" placeholder="Enter your Phone Number">';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="righttable">
                            <table border="0">
                                <tr id="title">
                                    <th>ID Number</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        if ($record_status == "existing") {
                                            echo '<input type="text" name="idnumber" value="' . $row['idnumber'] . '" id="mybox4" placeholder="Enter your ID number">';
                                        } else {
                                            echo '<input type="text" name="idnumber" id="mybox4" placeholder="Enter your ID number">';
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <tr id="title">
                                    <th>Vehicle Type</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="vehicle-type">
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
                                        </div>
                                        <div class="Vehicle-text">
                                            <?php
                                            if ($record_status == "existing") {
                                                echo '<input type="text" name="model" value="' . $row['model'] . '" id="mybox4" placeholder="Enter your Vehicle model">';
                                            } else {
                                                echo '<input type="text" name="model" id="mybox4" placeholder="Enter your Vehicle model">';
                                            }
                                            ?>

                                        </div>
                                    </td>
                                </tr>
                                <tr id="title">
                                    <th>Pick a Date & Time</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="date-container">
                                            <input name="date" type="datetime-local" class="date-input">
                                            <span class="custom-icon"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="submit_button">SUBMIT</button>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <h2>Availability - <?php echo date('F Y', strtotime("$year-$month-01")); ?></h2>
                <div class="nav">
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
            <div class="containerbox2">
                <div class="whitebox"><br>
                    <div class="left_side">
                        <div class="full_service">
                            <h2>Full Service</h2><br>
                            <label><input type="checkbox" name="service" value="general_check">General Check</label><br>
                            <label><input type="checkbox" name="service" value="engine_check"> Engine Check</label><br>
                            <label><input type="checkbox" name="service" value="fluid_check"> Fluid Check</label><br>
                            <label><input type="checkbox" name="service" value="change_clutch_pads"> Change Clutch Pads</label><br>
                            <label><input type="checkbox" name="service" value="change_brake_pads"> Change Brake Pads</label><br>
                            <label><input type="checkbox" name="service" value="steering_check"> Steering Check</label><br>
                            <label><input type="checkbox" name="service" value="suspension_check"> Suspension Check</label><br>
                            <label><input type="checkbox" name="service" value="exhaust_check"> Exhaust Check</label><br>
                            <label><input type="checkbox" name="service" value="brake_system_inspection"> Brake System Inspection</label>
                        </div><br>
                        <div class="Engine_reapair">
                            <h2>Engine Repair</h2><br>
                            <label><input type="checkbox" name="service" value="engine_overhaul"> Engine Overhaul</label><br>
                            <label><input type="checkbox" name="service" value="fixing_oil_leaks"> Fixing Oil Leaks</label><br>
                            <label><input type="checkbox" name="service" value="engine_oil_changes"> Engine Oil Changes</label>
                        </div><br>
                        <div class="Minor_Service">
                            <h2>Minor Service</h2><br>
                            <label><input type="checkbox" name="service" value="filter_replacement"> Filter Replacement</label><br>
                            <label><input type="checkbox" name="service" value="vehicle_greasing"> Vehicle Greasing</label><br>
                            <label><input type="checkbox" name="service" value="tyre_rotation"> Tyre Rotation</label><br>
                            <label><input type="checkbox" name="service" value="engine_oil_replacement"> Engine Oil Replacement</label>
                        </div>
                        <div class="T_P">
                            <h2>Tinkering & Painting</h2><br>
                            <label><input type="checkbox" name="service" value="tinkering"> Tinkering</label><br>
                            <label><input type="checkbox" name="service" value="painting"> Painting</label><br>
                            <label><input type="checkbox" name="service" value="polishing"> Polishing</label>
                            <div class="vertical-line"></div>
                        </div>
                        <div class="calander" style="display: none;">

                        </div>

                    </div>

                    <div class="T_area">
                        <h2 class="title_2">Anything Else..</h2>
                        <label><textarea cols="50" wrap="soft" class="textarea"></textarea></label>
                    </div>
                    <div class="res_sub">


                    </div>
                </div>
            </div>
            <div class="footer">
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
        </div>
    </div>
    <script>
        document.getElementById('resetbutton').addEventListener('click', function() {
            document.getElementById('mybox').value = ' '
        });
        document.getElementById('resetbutton2').addEventListener('click', function() {
            document.getElementById('mybox2').value = ' '
        });
        document.getElementById('resetbutton3').addEventListener('click', function() {
            document.getElementById('mybox3').value = ' '
        });
        document.getElementById('resetbutton4').addEventListener('click', function() {
            document.getElementById('mybox4').value = ' '
        });
    </script>
</body>

</html>