<?php
if ($_SESSION['UserID'] == "") {
    echo '<script> alert("Please Login!")</script>';
    header('Refresh:0 url=../login.php');
    exit();
}

if ($_SESSION['Status'] != "ADMIN") {
    echo '<script> alert("This page for ADMIN only!")</script>';
    header('Refresh:0 url=../index.php');
    exit();
}
?>