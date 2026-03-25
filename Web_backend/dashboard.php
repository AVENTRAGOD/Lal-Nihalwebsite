<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Lal & Nihal AutoWorks</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php include('sidebar_navigation.php'); ?>

    <section class="home">
        <div class="nameHeader">
            <div class="Cname">Lal & Nihal AUTOWORKS</div>
        </div>

        <section class="mainNav">

            <div id="card0" class="card0" style="cursor: pointer;">
                <div class="BGimage"></div>
                <div class="Cardtext">REACHOUTS</div>
            </div>


            <div id="card1" class="card1" style="cursor: pointer;">
                <div class="BGimage"></div>
                <div class="Cardtext">BOOKINGS</div>
            </div>

            <div id="card2" class="card2" style="cursor: pointer;">
                <div class="BGimage"></div>
                <div class="Cardtext">STATUS</div>
            </div>
        </section>
    </section>

    <script>
        document.getElementById('card0').addEventListener('click', function() {
            window.location.href = './dashboard_view_user.php';
        });
        document.getElementById('card1').addEventListener('click', function() {
            window.location.href = './bookings.php';
        });
        document.getElementById('card2').addEventListener('click', function() {
            window.location.href = './status.php';
        });
    </script>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>