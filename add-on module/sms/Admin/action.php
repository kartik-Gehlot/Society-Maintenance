<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "societymanagement") or die ("not connect");

if (isset ($_POST['upl'])) {
    $title = $_POST["title"];
    $img = $_FILES["img"];
    $Quantity = $_POST["Quantity"];
    $price = $_POST["price"];


    $file = explode(".", $_FILES['img']['name']);
    $filename = "Uploads/" . uniqid() . "." . $file[1];
    $img_upl = move_uploaded_file($_FILES['img']['tmp_name'], $filename);


    $qry = "insert into inventory set Title='$title',Image='$filename',Quantity='$Quantity',Price='$price'";

    mysqli_query($conn, $qry) or die ("not fire");

    header("location:Admin.php");
}
if (isset ($_POST['Taxi'])) {
    $Name = $_POST["Name"];
    $img = $_FILES["img"];
    // $seat= $_POST["seat"];


    $file = explode(".", $_FILES['img']['name']);
    $filename = "Uploads/Taxi/" . uniqid() . "." . $file[1];
    $img_upl = move_uploaded_file($_FILES['img']['tmp_name'], $filename);


    $qry = "insert into taxi set Name='$Name',Image='$filename'";

    mysqli_query($conn, $qry) or die ("not fire");

    header("location:Taxi.php");
}

if (isset ($_GET['id'])) {
    $id = $_GET['id'];

    $qry = "select * from request where id='$id'";
    $data = mysqli_query($conn, $qry) or die ("not fire");
    $row = mysqli_fetch_array($data);



    $qrys = "update inventory set Quantity=Quantity-$row[4] where Title='$row[3]'";
    mysqli_query($conn, $qrys) or die ("not fire");

    $qry2 = "insert into borrow set uid='$row[1]',username='$row[2]',Title='$row[3]',Quantity='$row[4]',Duration='$row[5]',Price='$row[6]'";
    mysqli_query($conn, $qry2) or die ("not fire");

    $qry3 = "delete from request where id='$id'";
    mysqli_query($conn, $qry3) or die ("not fire");

    $qry4 = "update wallet set balance=balance-$row[4]*$row[6] where username='$row[2]'";
    mysqli_query($conn, $qry4) or die ("not fire");
    header("location:Requests.php");



}


if (isset ($_GET['Delid'])) {
    $id = $_GET['Delid'];

    $qry = "delete from request where id='$id'";
    mysqli_query($conn, $qry) or die ("not fire");
    header("location:Requests.php");
}

if (isset ($_GET['DelId2'])) {
    $id = $_GET['DelId2'];

    $qry = "delete from inventory where id='$id'";
    mysqli_query($conn, $qry) or die ("not fire");
    header("location:Show.php");
}
if (isset ($_GET['DelId3'])) {
    $id = $_GET['DelId3'];

    $qry = "delete from taxi where id='$id'";
    mysqli_query($conn, $qry) or die ("not fire");
    header("location:TaxiShow.php");
}

if (isset ($_POST['Adminlog'])) //login
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $_SESSION['Admin'] = $username;

    $_SESSION['status'] = true;

    $qry = "select * from admin where username='$username' and password='$password'";
    mysqli_query($conn, $qry) or die ("not fire");


    if (mysqli_affected_rows($conn)) {

        header("location:Admin.php");

    } else {
        header("location:../Login.php?error=2");
    }
}



if (isset ($_GET['logouts']) == 1) {
    session_destroy();

    header("location:../Login.php");
}




?>