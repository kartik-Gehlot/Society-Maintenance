<?php

include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';

?>
<?php
// session_start();
$conn = mysqli_connect("localhost", "root", "", "sms") or die ("not connect");
$qry = "select * from taxi";
$data = mysqli_query($conn, $qry) or die ("not fire");
//$qry1 = "select balance from wallet where username='" . $_SESSION['username'] . "'";
//$balance = mysqli_query($conn, $qry1) or die ("not fire");
//$bal = mysqli_fetch_array($balance);

// if (isset ($_SESSION['username']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    

    <body>

       
        <div class="container my-5">
            <div class="row">
                <div class="col-sm-10">
                    <div class="row">
                        <?php while ($item = $data->fetch_assoc()) { ?>
                            <div class="col-sm-4">
                                <div class="card text-center my-3">
                                    <img class="card-img-top" src="../Images/<?php echo $item['Image'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title my-3">
                                            <?php echo $item['Name'] ?>
                                        </h4>
                                        <!-- <p class="text-danger fw-bold"><?php echo $item['Seats'] ?> Seater</p> -->
                                        <a href="BookingPage.php?taxiname=<?php echo $item['Name'] ?>"  class="btn btn-warning">Book now</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

    <?php
// } else {
//    // header("location:Login.php");

// }
include './includes/shared/footer.php';
include './includes/shared/scripts.php';
?>