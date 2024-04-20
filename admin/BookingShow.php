<?php
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
$qry = "select * from taxi_booking";
$data = mysqli_query($conn, $qry) or die("not fire");
//if (isset($_SESSION['Admin']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <div class="container my-5">
            <div class="row">
                <div class="col-sm-2  text-center ">
                    <div class="row fs-4">
                     
                    </div>
                </div>
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

    </body>

    </html>

    <?php
// } else {
//     header("location:Login.php");
//     // echo "error";
// }
include './includes/shared/footer.php';
include './includes/shared/scripts.php';

?>