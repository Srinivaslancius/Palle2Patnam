<?php 
ob_start();
session_start();
include_once('includes/config.php');
include_once('includes/functions.php');

if(!isset($_SESSION['admin_user_id'])) {
    header("Location: logout.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- Title -->
        <title>Palle2Patnam Admin </title>
        <meta http-equiv="refresh" content="800;url=logout.php" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">      
        <link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">  
        <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>        
    </head>
    <body>
        
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <?php include_once'header.php';?>
            </header>