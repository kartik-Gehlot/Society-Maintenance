<?php

//  UNCOMMENT THIS AFTER LOGIN MODULE IS IMPLEMENTED

include '../config.php';
// $_SESSION['flatno'] = '801'; //comment later
// $_SESSION['blockno'] = 'A'; //comment later
// $_SESSION['login_role'] = 'owner'; //comment later
//if (isset($_SESSION['flatno']) && isset($_SESSION['role'])) {
   // $flat = $_SESSION['flatno'];
 //   $role = $_SESSION['login_role'];
//} else {
    // header("Location: ../index.html");
//}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gokul Dham Society</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/css/shoutbox.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
    <link href="../vendor/css/fonts.css" rel="stylesheet">
    <link href="../vendor/css/loader.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top">
    <div id="loading-container">
        <div class="cube" id="cube1"></div>
        <div class="cube" id="cube2"></div>
        <div class="cube" id="cube3"></div>
        <div class="cube" id="cube4"></div>
        <h4 class="text-center font-weight-bold py-4">Loading...</h4>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">