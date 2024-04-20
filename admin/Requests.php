<?php
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
//session_start();
$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
$qry = "select * from request";
$data = mysqli_query($conn, $qry) or die("not fire");
// if (isset($_SESSION['Admin']) and $_SESSION['status'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

   

    <body>

        <div class="container my-5">
            <div class="row">
                
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>User id</th>
                                    <th>Username</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Accept</th>
                                    <th>Decline</th>

                                </tr>
                                <?php
                                while ($item = $data->fetch_assoc()) {
                                    ?>
                                <tr>
                                    <td><?php echo $item['id'] ?></td>
                                    <td><?php echo $item['uid'] ?></td>
                                    <td><?php echo $item['username'] ?></td>
                                    <td><?php echo $item['Title'] ?></td>
                                    <td><?php echo $item['Quantity'] ?></td>
                                    <td><?php echo $item['Duration'] ?></td>
                                    <td><?php echo $item['Price'] ?></td>
                                    <td><a href="action.php?id=<?= $item['id'] ?>"><button class="btn btn-success">Accept</button></a></td>
                                    <td><a href="action.php?Delid=<?= $item['id'] ?>"><button class="btn btn-danger">Decline</button></a></td>
                                </tr>
                                <?php } ?>
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
// }

include './includes/shared/footer.php';
include './includes/shared/scripts.php';

?>