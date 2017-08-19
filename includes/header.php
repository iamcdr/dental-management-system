<?php
ob_start();
session_start();
include("includes/db.php");
include("includes/functions.php");
if(!isset($_SESSION['adramoneda_dms_user_role'])){
    header("Location: login.php");
}
?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>A.D. Ramoneda Dental Clinic - Dental Management System</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">
        <link rel="stylesheet" href="./assets/bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/datatables/dataTables.bootstrap.css">

    </head>
