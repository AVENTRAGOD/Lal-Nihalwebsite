<?php
include 'dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * from reachout where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
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
</head>

<body>
    <?php include('sidebar_navigation.php'); ?>

    <section class="home">
        <div class="container mt-5">

            <h1>Edit Review</h1>
            <form id="form1" action="edit_user_review_function.php" method="post">
                <input type="hidden" id="custId" name="custId" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?php echo $row['name']; ?>" type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input value="<?php echo $row['address']; ?>" type="text" class="form-control" name="address" id="address" aria-describedby="address" placeholder="Enter Address">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="<?php echo $row['email']; ?>" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <input value="<?php echo $row['message']; ?>" type="text" class="form-control" name="message" id="message" aria-describedby="message" placeholder="Enter Message">
                </div>
                <br />
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // function validateForm() {

        //     let email = document.forms["form1"]["email"].value;

        //     let error = "";

        //     if (email.trim() === "") {
        //         error += "Email is required.\n";
        //     } else if (!email.match(/^\S+@\S+\.\S+$/)) {
        //         error += "Invalid email format.\n";
        //     }            

        //     if (error) {
        //         alert(error);
        //         return false; // Prevent form submission
        //     }
        //     return true; // Allow form submission
        // }
    </script>
</body>

</html>