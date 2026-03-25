<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {     
    
    $id = $_GET['id'];    

    $sql = "DELETE FROM `reachout` WHERE `id` = $id;";
    
    $location = './dashboard_view_user.php';
    if ($conn->query($sql)) {
        header("Location: $location?delete_status=success");
    } else {
        header("Location: $location?delete_status=failed");
    }
    $conn->close();
}
