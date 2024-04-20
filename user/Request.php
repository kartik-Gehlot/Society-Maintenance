<?php
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
//session_start();
//if (isset($_SESSION['username']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    </head>

    <body>

        <h1 class="text-center">Request Items</h1>

        <?php
        if (isset($_POST['borrow'])) {
            $conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
            $qry = "select * from inventory where id='" . $_POST["id"] . "'";
            $flatid_sql = mysqli_query($con, "SELECT FlatID from allotments where FlatNumber='{$_SESSION['flatno']}' and BlockNumber='{$_SESSION['blockno']}'");
            $ownName_sql = mysqli_query($con, "SELECT OwnerName from allotments where FlatNumber='{$_SESSION['flatno']}' and BlockNumber='{$_SESSION['blockno']}'");
            $data = mysqli_query($conn, $qry) or die("not fire");
            //$data2 = mysqli_query($conn, $qry2) or die("not fire");

            $row = mysqli_fetch_array($data);
            $row2 = mysqli_fetch_assoc($flatid_sql);
            $flatid = $row2['FlatID'];
            $row3 = mysqli_fetch_assoc($ownName_sql);
            $ownName = $row3['OwnerName'];

        }
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form action="action.php" method="post">

                        <div class="mb-3 mt-4 ms-3 me-3">
                            <input type="number" class="form-control" placeholder="Enter id" name="id"
                                value="<?php echo $flatid ?>" required>
                        </div>
                        <div class="mb-3 mt-4 ms-3 me-3">
                            <input type="hidden" class="form-control" placeholder="Enter username" name="username" value="<?php
                            echo $ownName ;
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
//} else {
  //  header("location:Login.php");

//}

include './includes/shared/footer.php';
include './includes/shared/scripts.php'; 
?>