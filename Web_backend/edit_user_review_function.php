<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];    //we have to put the fields that we have
    $address = $_POST['address'];
    $email = $_POST['email'];
    $message = $_POST['message'];    
    $id = $_POST['custId'];    

    $sql = "UPDATE `reachout` SET `name` = '$name', `address` = '$address', `email` = '$email', `message` = '$message' WHERE `reachout`.`id` = $id;";

    $location = './dashboard_view_user.php';
    if ($conn->query($sql)) {
        header("Location: $location?update_status=success");
    } else {
        header("Location: $location?update_status=failed");
    }
    $conn->close();
}
