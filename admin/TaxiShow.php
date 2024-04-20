<?php
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
<<<<<<< HEAD
$conn = mysqli_connect("localhost", "root", "", "sms") or die ("not connect");
$qry = "select * from taxi";
$data = mysqli_query($conn, $qry) or die ("not fire");
//if (isset ($_SESSION['Admin']) and $_SESSION['status'] == true) {
=======
// session_start();
$conn = mysqli_connect("localhost", "root", "", "sms") or die ("not connect");
$qry = "select * from taxi";
$data = mysqli_query($conn, $qry) or die ("not fire");
// if (isset ($_SESSION['Admin']) and $_SESSION['status'] == true) {
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
        <?php// include ("../Link.php") ?>
    </head>

    <body>
        <?php// include ("../Navbar.php") ?>

        <div class="container my-5">
            <div class="row">
                <!-- <div class="col-sm-2  text-center ">
                    <div class="row fs-4">

                        <div class="col-sm-12  mb-5">
                            <a href="Admin.php" class="text-dark" style="text-decoration:none;">Upload Items <i
                                    class="fa-solid fa-plus text-primary ms-1"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="Show.php" class="text-dark" style="text-decoration:none;">View Items<i
                                    class="fa-solid fa-eye text-info ms-2"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="Requests.php" class="text-dark" style="text-decoration:none;">Requests<i
                                    class="fa-solid fa-bell text-warning ms-2"></i></a>
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <!-- <th>Update</th> -->
                                    <th>Delete</th>
                                    <th>Booking</th>
                                </tr>
                                <?php
                                while ($item = $data->fetch_assoc()) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $item['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['Name'] ?>
                                        </td>
                                        <td><img src="<?php echo $item['Image'] ?>" alt="" width="50px"></td>
                                        <!-- <td><button class="btn btn-warning">Update</button></td> -->
                                        <td><a href="action.php?DelId3=<?= $item['id'] ?>"><button
                                                    class="btn btn-danger">Delete</button></a></td>
                                        <td><a href="BookingShow.php?taxiname=<?php echo $item['Name'] ?>"><button
                                                    class="btn btn-primary">View</button></a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
=======
        <?php //include ("../Footer.php") ?>
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