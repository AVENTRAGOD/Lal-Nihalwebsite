<?php
include 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id=$_POST['User_name'];    //we have to put the fields that we have
    $id=$_POST['Address'];
    $id=$_POST['E-mail_Address'];
    $id=$_POST['Message'];
    $id=$_POST['Response'];


$sql = "INSERT INTO form(User_name,Address,E-mail_Address,Message,Response)";

if($conn->query($sql)){
    echo "User Added Successfully";
}else{
    echo "Error".$conn-error;
}

$conn->close();

}

?>