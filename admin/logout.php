<?php 
session_start();
//for admin

    //unset session;
    session_unset();
    //destroy session
    session_destroy();
    //redirect to login page.
    header("Location: ../index.html");


?>