<?php

include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';

?>

<?php
// session_start();
$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
$complaint_sql = mysqli_query($con, "SELECT * from allotments where FlatNumber='{$_SESSION['flatno']}' and BlockNumber='{$_SESSION['blockno']}'");
$complaint = mysqli_num_rows($complaint_sql);

// $visit_sql = mysqli_query($con, "SELECT * from visitors where FlatID='$flatid' and BlockNumber='{$_SESSION['blockno']}'");
// $visit = mysqli_num_rows($visit_sql);
// $qry = "select * from user where username='" . $_SESSION['username'] . "'";
// $data = mysqli_query($conn, $qry) or die("not fire");
// $res = mysqli_fetch_array($data);
// if (isset($_SESSION['username']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php //include ("Link.php") ?>
    </head>

    <body>
        <?php //include ("Navbar.php") ?>
        <a href="CarBook.php"><button class="btn btn-primary mt-3 ms-3">Go Back</button></a>
        <h1 class="text-center my-5">Taxi Booking</h1>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="action.php" method="post">

                        <input type="hidden" name="taxiname" value="<?php echo $_GET['taxiname'] ?>">
                        <?php
                        $qrys = "select Seats from taxi where Name='" . $_GET['taxiname'] . "'";
                        $data1 = mysqli_query($conn, $qrys) or die("not fire");
                        $res1 = mysqli_fetch_array($data1);
                        // print_r($res1[0]);
                        $seats = $res1[0];
                        ?>
                        <input type="hidden" name="uid" value="<?php echo $res[0] ?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Enter your name here..."
                                name="username" value="<?php echo $_SESSION['blockno'] . '-' . $_SESSION['flatno']; ?>
">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput"
                                placeholder="Enter your contact here..." name="contact">
                            <label for="floatingInput">Contact</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" id="floatingInput"
                                placeholder="Enter your contact here..." name="time">
                            <label for="flolatingInput">Timing</label>
                        </div>
                        <!-- <select class="form-select text-center mb-3" name="seats" id="seats">
                            <option value="">Select your Seats</option>
                        <?php
                        // for ($i = 1; $i < $seats+1; $i++) {
                        //     echo "<option value='".$i."'>" . $i . "</option>";
                        // }
                        ?>
                        </select> -->
                        <select class="form-select text-center mb-3" name="destination" id="destination">
                            <option value="">Select your Destination</option>
                            <option value="Mehrangarh fort">Mehrangarh fort</option>
                            <option value="Ummed bhawan palace">Ummed bhawan palace</option>
                            <option value="Clock tower market">Clock tower market</option>
                            <option value="Pavta">Pavta</option>
                            <option value="Railway station">Railway station</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="rent" placeholder="" name="rent" value="0"
                                readonly>
                            <label for="floatingInput">Rent</label>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Book" class="btn btn-warning btn-lg my-5" name="taxiBook">
                        </div>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>

         <?php //include ("Footer.php") ?>


        <script>
            destination.onchange = () => {
                if (destination.value == "") {
                    // alert("please select destination");
                    rent.value = 0;
                }
                if (destination.value == "Mehrangarh fort") {
                    rent.value = 300;
                }
                if (destination.value == "Ummed bhawan palace") {
                    rent.value = 200;
                }
                if (destination.value == "Clock tower market") {
                    rent.value = 250;
                }
                if (destination.value == "Pavta") {
                    rent.value = 100;
                }
                if (destination.value == "Railway station") {
                    rent.value = 100;
                }
            }
        </script>

    </body>

    </html>

    <?php
// } else {
//     header("location:Login.php");

// }
include './includes/shared/footer.php';
include './includes/shared/scripts.php';
?>