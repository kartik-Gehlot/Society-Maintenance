<?php
session_start();

if (isset($_SESSION['Admin']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include("../Link.php") ?>
    </head>

    <body>
        <?php include("../Navbar.php") ?>

        <div class="container my-5">
        <div class="row">
            <div class="col-sm-2  text-center">
                <!-- <div class="row fs-4">

                    <div class="col-sm-12 mb-5">
                        <a href="Admin.php" class="text-dark" style="text-decoration:none;">Upload Items <i class="fa-solid fa-plus text-primary ms-1"></i></a>
                    </div>
                    <div class="col-sm-12 mt-5 mb-5">
                        <a href="Show.php" class="text-dark" style="text-decoration:none;">View Items<i class="fa-solid fa-eye text-info ms-2"></i></a>
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
                        <a class="nav-link text-dark fw-bold" href="action.php?logouts=1">
                            <i class="fa-solid fa-right-from-bracket text-danger"></i>
                            Logout
                        </a>
                    </div>
                </div> -->
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form action="action.php" method="POST"  enctype="multipart/form-data">
                            <h3 class="text-center ">Add item</h3>

                            <div class="mb-3 mt-4 ms-3 me-3">
                                <label for="text" class="form-label  mb-2">Title:</label>
                                <input type="text" class="form-control" placeholder="Enter title" name="title" required>
                            </div>

                            <div class="mb-3 mt-4 ms-3 me-3">
                                <label for="image" class="mb-2">Add image:</label>
                                <input type="file" class="form-control" name="img" required>
                            </div>

                            <div class="mb-3 mt-4 ms-3 me-3">
                                <label for="number" class="form-label  mb-2" >Items Quantity:</label>
                                <input type="text" class="form-control" placeholder="Enter item Quantity" name="Quantity" required>
                            </div>

                            <div class="mb-3 mt-4 ms-3 me-3">
                                <label for="text" class="form-label  mb-2">Price:</label>
                                <input type="number" class="form-control" placeholder="Enter price" name="price" required>
                            </div>

                            <div class="mb-3 mt-4 ms-3 me-3 text-center">
                                <input type="submit" class=" btn btn-info" name="upl" value="Upload">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    </div>
        <?php include("../Footer.php") ?>

    </body>

    </html>

    <?php
}
else{
    header("location:Login.php");
    // echo "error";
}

?>