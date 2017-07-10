<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- Title -->
        <title>Palle2Patnam </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Palle2Patnam" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
            
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
<nav class="cyan darken-1">
    <div class="nav-wrapper row">
        <section class="material-design-hamburger navigation-toggle">
            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                <span class="material-design-hamburger__layer"></span>
            </a>
        </section>
        <div class="header-title col s3 m3">      
            <span class="chapter-title"><a href="dashboard.php">Palle2Patnam</a></span>
        </div>       
    </div>
</nav>
<?php 
ob_start();
session_start();
include_once('includes/config.php');
include_once('includes/functions.php');
?>
<?php include_once 'side_navigation.php';?>