<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "societymanagement") or die("not connect");
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
                <div class="col-sm-2  text-center mt-4">
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
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <form action="action.php" method="POST" >
                                <h3 class="text-center ">Add Balance</h3>

                                <div class="mb-3 mt-4 ms-3 me-3">
                                    <input type="hidden" class="form-control form-control-lg" name="username" value="<?php echo $_SESSION['username'] ?>" required>
                                </div>
                                <div class="mb-3 mt-4 ms-3 me-3">
                                    <label for="text" class="form-label  mb-2 fw-bold">Add Balance:</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="Enter amount here... " name="balance" required>
                                </div>

                                <div class="mb-3 mt-4 ms-3 me-3 text-center">
                                    <input type="submit" class=" btn btn-warning" name="bal" value="Add Balance">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-3"></div>
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