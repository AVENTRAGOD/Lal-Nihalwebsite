<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $record_status = $_POST['record_status'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $idnumber = $_POST['idnumber'];
    $manufacture = $_POST['manufacture'];
    $model = $_POST['model'];
    $date = $_POST['date'];

    $date_format = date("Y-m-d", strtotime($date));

    //date validation
    $sql_check = "SELECT COUNT(*) AS total FROM bookings WHERE DATE(date) = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("s", $date_format);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['total'] >= 4) {
        //echo "Error: Maximum 4 bookings allowed per day!";
        $location = './booking3.php';
        header("Location: $location?date_validation=failed&date=$date_format");
        $conn->close();
    } else {
        if ($record_status == "existing") {
            $id = $_POST['id'];
            $sql = "INSERT INTO `bookings` (`cus_id`, `date`) VALUES
                ('$id', '$date')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                if (isset($_POST['service']) && is_array($_POST['service'])) {
                    $selected_services = $_POST['service']; // Get selected checkbox values       
                    foreach ($selected_services as $service) {
                        $sql = "INSERT INTO `requested_services` (`booking_id`, `service`) VALUES ('$last_id', '$service')";
                        $conn->query($sql);
                    }
                }
            } else {
                //failed
            }
        } else {
            $sql = "INSERT INTO `registered_customers` (`fname`, `lname`, `phone`, `idnumber`,`manufacture`, `model`) VALUES
            ('$firstname', '$lastname', '$phone', '$idnumber', '$manufacture', '$model')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $sql = "INSERT INTO `bookings` (`cus_id`, `date`) VALUES
                ('$last_id', '$date')";
                if ($conn->query($sql) === TRUE) {
                    //success
                } else {
                    //failed
                }
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $location = './booking3.php';
        if ($conn->query($sql)) {
            header("Location: $location?status=success");
        } else {
            header("Location: $location?status=failed");
        }
        $conn->close();
    }
}
