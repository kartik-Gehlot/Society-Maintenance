<?php
include 'includes/shared/header.php';
include 'includes/shared/sidebar.php';
include 'includes/shared/topbar.php';
session_start();
$complaint_sql = mysqli_query($con, "SELECT * from complaints where FlatNumber='{$_SESSION['flatno']}' and BlockNumber='{$_SESSION['blockno']}'");
$complaint = mysqli_num_rows($complaint_sql);

$visit_sql = mysqli_query($con, "SELECT * from visitors where FlatID='$flatid' and BlockNumber='{$_SESSION['blockno']}'");
$visit = mysqli_num_rows($visit_sql);

$conn = mysqli_connect("localhost", "root", "", "sms") or die("not connect");
//mysqli_query($conn, "DELETE FROM taxi_booking WHERE Booking_Time < (NOW() - INTERVAL 1 HOUR )");

if (isset($_POST['reg'])) //reg data
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $flatNo = $_POST["flatNo"];
    $mobileNo = $_POST["mobileNo"];


    $qry = "insert into user set username='$username',password='$password',flatNo='$flatNo',mobileNo='$mobileNo'";
    mysqli_query($conn, $qry) or die("not fire");

    $qry1 = "select * from user where username='$username'";
    $data = mysqli_query($conn, $qry1) or die("not fire");
    $row = mysqli_fetch_array($data);
    print_r($row);

    // $qry2 = "insert into wallet set uid='$row[0]',username='$row[1]',balance=0";
    // mysqli_query($conn, $qry2) or die("not fire");
    // header("location:Login.php");
}

if (isset($_POST['log'])) //login
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $_SESSION['username'] = $username;

    $_SESSION['status'] = true;

    $qry = "select * from user where username='$username' and password='$password'";
    mysqli_query($conn, $qry) or die("not fire");


    if (mysqli_affected_rows($conn)) {

        header("location:User.php");

    } else {
        header("location:Login.php?error=1");
    }
}



if (isset($_GET['logout']) == 1) {
    session_destroy();
    header("location:Login.php");
}




if (isset($_POST['req'])) //reg data
{
    $id = $_POST["id"];
    $username = $_POST["username"];
    $title = $_POST["title"];
    $Quantity = $_POST["Quantity"];
    $date = $_POST["date"];
    $price = $_POST["price"];

    $qry = "insert into request set uid='$id',username='$username',Title='$title',Quantity='$Quantity',Duration='$date',Price='$price'";
    mysqli_query($conn, $qry) or die("not fire");
    // $rmqry = "UPDATE inventory SET Quantity = Quantity-$Quantity WHERE Title = $title";
    // mysqli_query($conn,$rmqry) or die("not fire");
    header("location:User.php");
}


if (isset($_GET['return'])) {
    $id = $_GET['return'];

    $qry = "select * from borrow where id='$id'";
    $data = mysqli_query($conn, $qry) or die("not fire");
    $row = mysqli_fetch_array($data);

    $qry1 = "update inventory set Quantity=Quantity+$row[4] where Title='$row[3]'";
    mysqli_query($conn, $qry1) or die("not fire");

    $qry2 = "delete from borrow where id=$id";
    mysqli_query($conn, $qry2) or die("not fire");


    header("location:UserBorrow.php");
}

if (isset($_POST['taxiBook'])) //reg data
{

    $test = false;
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $destination = $_POST['destination'];
    $taxiname = $_POST['taxiname'];
    $rent = $_POST['rent'];
    $time = $_POST['time'];

    $timestamp = strtotime($time) + 60 * 60;

    $times = date('H:i', $timestamp);


    $qryy = "select * from taxi_booking where taxiName='$taxiname'";

    $timing = mysqli_query($conn, $qryy) or die("not fire");

    while ($res1 = mysqli_fetch_array($timing)) {

        if ($res1[7] == $time . ":00") {
            $test = true;
        }

    }
    if ($test) {
        $timeqry = "select username from taxi_booking where Booking_Time='$time'";
        $timeData = mysqli_query($conn, $timeqry) or die("not fire");
        $timeDatas = mysqli_fetch_array($timeData);

        $payqry = "select rent from taxi_booking where username='$timeDatas[0]'";
        $payqry1 = mysqli_query($conn, $payqry) or die("not fire");
        $payData = mysqli_fetch_array($payqry1);
        $rent1 = $payData[0] / 2;

        $qryy = "insert into taxi_booking set uid='$uid',username='$username',contact='$contact',destination='$destination',taxiName='$taxiname',rent='$rent1',Booking_Time='$time'";
        mysqli_query($conn, $qryy) or die("not fire");
        $qryy1 = "update taxi_booking set rent=rent-$rent1 where username='$timeDatas[0]'";
        mysqli_query($conn, $qryy1) or die("not fire");
        $qry41 = "update wallet set balance=balance-$rent1 where username='$username'";
        mysqli_query($conn, $qry41) or die("not fire");
        $qry42 = "update wallet set balance=balance+$rent1 where username='$timeDatas[0]'";
        mysqli_query($conn, $qry42) or die("not fire");
        header("location:CarBook.php");

    } else {
        $qry = "insert into taxi_booking set uid='$uid',username='$username',contact='$contact',destination='$destination',taxiName='$taxiname',rent='$rent',Booking_Time='$time'";
        mysqli_query($conn, $qry) or die("not fire");
        $qry4 = "update wallet set balance=balance-$rent where username='$username'";
        mysqli_query($conn, $qry4) or die("not fire");
        header("location:CarBook.php");
    }



}

if (isset($_POST['bal'])) //update balance
{
    $balance = $_POST["balance"];
    $username = $_POST["username"];


    $qry = "update wallet set balance=balance+$balance where username='$username'";
    mysqli_query($conn, $qry) or die("not fire");

    header("location:User.php");
}


?>