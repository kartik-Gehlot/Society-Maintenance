<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include("Link.php") ?>
    </head>

    <body>
        <?php include("Navbar.php") ?>

        <h1 class="text-center">Request Items</h1>

        <?php
        if (isset($_POST['borrow'])) {
            $conn = mysqli_connect("localhost", "root", "", "societymanagement") or die("not connect");
            $qry = "select * from inventory where id='" . $_POST["id"] . "'";
            $qry2 = "select id from user where username='" . $_SESSION['username'] . "'";
            $data = mysqli_query($conn, $qry) or die("not fire");
            $data2 = mysqli_query($conn, $qry2) or die("not fire");

            $row = mysqli_fetch_array($data);
            $row2 = mysqli_fetch_array($data2);
        }
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="action.php" method="post">

                        <div class="mb-3 mt-4 ms-3 me-3">
                            <input type="number" class="form-control" placeholder="Enter id" name="id"
                                value="<?php echo $row2[0] ?>" required>
                        </div>
                        <div class="mb-3 mt-4 ms-3 me-3">
                            <input type="hidden" class="form-control" placeholder="Enter username" name="username" value="<?php
                            echo $_SESSION['username'];
                            ?>" required readonly>
                        </div>
                        <div class="mb-3 mt-4 ms-3 me-3">
                            <label for="text" class="form-label  mb-2">Title:</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="title"
                                value="<?php echo $row[1] ?>" required readonly>
                        </div>

                        <div class="mb-3 mt-4 ms-3 me-3">
                            <label for="number" class="form-label  mb-2">Items Quantity:</label>
                            <input type="text" class="form-control" placeholder="Enter item Quantity you want"
                                name="Quantity" min="1" max="10" required>
                            <p class="text-danger">Item left in inventory :-
                                <?php echo $row[3] ?>
                            </p>
                        </div>

                        <div class="mb-3 mt-4 ms-3 me-3">
                            <label for="text" class="form-label  mb-2">Borrow duration:</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="mb-3 mt-4 ms-3 me-3">
                            <label for="text" class="form-label  mb-2">Price:</label>
                            <input type="number" class="form-control" placeholder="Enter price" name="price"
                                value="<?php echo $row[4] ?>" required readonly>
                        </div>

                        <div class="mb-3 mt-4 ms-3 me-3 text-center">
                            <input type="submit" class=" btn btn-info" name="req" value="Request">
                        </div>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>

    </html>

    <?php
} else {
    header("location:Login.php");

}

?>