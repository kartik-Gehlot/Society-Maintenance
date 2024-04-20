<?php
<<<<<<< HEAD
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
$qry = "select * from taxi_booking";
$data = mysqli_query($conn, $qry) or die("not fire");
//if (isset($_SESSION['Admin']) and $_SESSION['status'] == true) {
=======

include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
// session_start();
$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
$qry = "select * from taxi_booking";
$data = mysqli_query($conn, $qry) or die("not fire");
// if (isset($_SESSION['Admin']) and $_SESSION['status'] == true) {
>>>>>>> 9e53f521b7e32c1a0aa28d5020b8bb9375fcd627
    ?>
    <!DOCTYPE html>
    <html lang="en">

<<<<<<< HEAD
    <body>

        <div class="container my-5">
            <div class="row">
                <div class="col-sm-2  text-center ">
                    <div class="row fs-4">
                     
                    </div>
                </div>
=======
    <head>
        <?php //include("../Link.php") ?>
    </head>

    <body>
        <?php //include("../Navbar.php") ?>

        <div class="container my-5">
            <div class="row">
                <!-- <div class="col-sm-2  text-center ">
                    <div class="row fs-4">

                        <div class="col-sm-12 mb-5">
                            <a href="Admin.php" class="text-dark" style="text-decoration:none;">Upload Items <i
                                    class="fa-solid fa-plus text-primary ms-1"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="Show.php" class="text-dark" style="text-decoration:none;">View Items<i
                                    class="fa-solid fa-eye text-info ms-2"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                        <a href="Requests.php" class="text-dark" style="text-decoration:none;">Requests<i class="fa-solid fa-bell text-warning ms-2"></i></a>
                    </div>
                    <div class="col-sm-12 mt-5 mb-5">
                        <a href="Taxi.php" class="text-dark" style="text-decoration:none;">Taxi<i
                                    class="fa-solid fa-car-side ms-2 text-danger"></i></a>
                    </div>
                    <div class="col-sm-12 mt-5 mb-5">
                        <a href="TaxiShow.php" class="text-dark" style="text-decoration:none;">View Taxi<i
                                    class="fa-solid fa-car-side ms-2 text-primary"></i></a>
                    </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a class="nav-link text-dark fw-bold" href="../action.php?logout=1">
                                <i class="fa-solid fa-right-from-bracket text-danger"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div> -->
>>>>>>> 9e53f521b7e32c1a0aa28d5020b8bb9375fcd627
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>User id</th>
                                    <th>Taxi Name</th>
                                    <th>Username</th>
                                    <th>Contact</th>
                                    <th>Destination</th>
                                    <th>Rent</th>
                                    <th>Booking Time</th>
                                </tr>
                                <?php
                                while ($item = $data->fetch_assoc()) {
                                    if ($_GET['taxiname'] == $item['taxiName']) {
                                        ?>
                                <tr>
                                    <td><?php echo $item['id'] ?></td>
                                    <td><?php echo $item['uid'] ?></td>
                                    <td><?php echo $item['taxiName'] ?></td>
                                    <td><?php echo $item['username'] ?></td>
                                    <td><?php echo $item['contact'] ?></td>
                                    <td><?php echo $item['destination'] ?></td>
                                    <td><?php echo $item['rent'] ?> ₹</td>
                                    <td><?php echo $item['Booking_Time'] ?></td>
                                </tr>
                                <?php }else{} } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
=======
        <?php //include("../Footer.php") ?>
>>>>>>> 9e53f521b7e32c1a0aa28d5020b8bb9375fcd627

    </body>

    </html>

    <?php
// } else {
//     header("location:Login.php");
<<<<<<< HEAD
//     // echo "error";
// }
include './includes/shared/footer.php';
include './includes/shared/scripts.php';

=======
    // echo "error";
// }
include './includes/shared/footer.php';
include './includes/shared/scripts.php';
>>>>>>> 9e53f521b7e32c1a0aa28d5020b8bb9375fcd627
?>