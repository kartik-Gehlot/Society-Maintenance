<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "societymanagement") or die ("not connect");
mysqli_query($conn,"DELETE FROM taxi_booking WHERE Booking_Time < (NOW() - INTERVAL 1 HOUR )");
$qry = "select * from inventory";
$data = mysqli_query($conn, $qry) or die ("not fire");

$qry1 = "select balance from wallet where username='" . $_SESSION['username'] . "'";
$balance=mysqli_query($conn, $qry1) or die ("not fire");
$bal=mysqli_fetch_array($balance);

if (isset ($_SESSION['username']) and $_SESSION['status'] == true) {
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
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                <h1 class="text-center">Welcome :-
                    <?php echo $_SESSION['username'] ?>
                </h1>
                </div>
                <div class="col-sm-4">
                    <a href="Balance.php"><button class="btn btn-warning mt-2 fw-bold btn-lg">Balance :- <span class="badge bg-danger"><?php echo $bal[0]?> ₹</span></button></a>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-sm-2  text-center mt-4 ">
                    <div class="row fs-4">

                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="User.php" class="text-dark" style="text-decoration:none;">Inventory<i
                                    class="fa-solid fa-plus text-primary ms-1"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="UserBorrow.php" class="text-dark" style="text-decoration:none;">Borrowed Items<i
                                    class="fa-solid fa-eye text-info ms-2"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="Balance.php" class="text-dark" style="text-decoration:none;">Balance<i
                                    class="fa-solid fa-coins ms-2 text-warning"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a href="CarBook.php" class="text-dark" style="text-decoration:none;">Car booking<i
                                    class="fa-solid fa-car-side ms-2 text-danger"></i></a>
                        </div>
                        <div class="col-sm-12 mt-5 mb-5">
                            <a class="nav-link text-dark fw-bold" href="action.php?logout=1">
                                <i class="fa-solid fa-right-from-bracket text-danger"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <?php while ($item = $data->fetch_assoc()) { ?>
                            <div class="col-sm-4">
                                <div class="card text-center my-3">
                                    <img class="card-img-top" src="./Admin/<?php echo $item['Image'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <?php echo $item['Title'] ?>
                                        </h4>
                                        <p class="card-text h3 my-3">Price :-
                                            <?php echo $item['Price'] ?> ₹
                                        <p>
                                        <p class="card-text h6 text-danger my-3">Quantity in inventory :-
                                            <?php echo $item['Quantity'] ?>
                                        <p>
                                        <form action="Request.php" method="post">
                                            <input type="hidden" value="<?php echo $item['id'] ?>" name="id">
                                            <input type="submit" value="Borrow" class="btn btn-warning" name="borrow">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include ("Footer.php") ?>

    </body>

    </html>

    <?php
} else {
    header("location:Login.php");

}

?>