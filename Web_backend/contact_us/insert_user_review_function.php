<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];    //we have to put the fields that we have
    $address = $_POST['address'];
    $email = $_POST['email'];
    $message = $_POST['message'];    

    $sql = "INSERT INTO `reachout` (`name`, `address`, `email`, `message`) VALUES
('$name', '$address', '$email', '$message')";
    $location = './contact_us.php';
    if ($conn->query($sql)) {
        header("Location: $location?status=success");
    } else {
        header("Location: $location?status=failed");
    }
    $conn->close();
}
