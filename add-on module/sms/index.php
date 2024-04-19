<?php

$conn = mysqli_connect("localhost", "root", "", "societymanagement") or die("not connect");
mysqli_query($conn, "DELETE FROM taxi_booking WHERE Booking_Time < (NOW() - INTERVAL 1 HOUR )");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("Link.php") ?>
</head>

<body>
    <?php include ("Navbar.php") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-6">
                <div class="row my-5"></div>
                <div class="row my-5"></div>
                <div class="row my-5"></div>
                <h2 class="h1 text-center">ONE STOP DESTINATION FOR EFFECTIVE MANAGEMENT OF A SOCIETY</h2>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <img src="Images/back2.jpg" alt="" style="height:400px;">
            </div>
        </div>
    </div>
    <?php include ("Footer.php") ?>

</body>

</html>