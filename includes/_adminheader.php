<?php

include '_dbconnect.php';
session_start();

$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

echo ' <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="style.css?v=<?php echo time();  ?>" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=ruby&amp;skin=desert"></script>
    <title>Cooding forum</title>
    <style>
    .swal-button{
        background-color: #00C851 !important;
    }
    </style>
</head>

<body>   
<header>
<div class="navmain bg-dark">
    <div class="container dflex">
        <div class="logo"><img src="images/logo.png"></div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/forum/admin.php">Home <span class="sr-only">(current)</span></a>
                </li>
    
                <li class="nav-item active">
                    <a class="nav-link" href="/forum/messages.php">Messages</a>
                </li>
            </ul>';
            if(isset($_SESSION['loggedinadmin']) && $_SESSION['loggedinadmin'] == true){
                echo '
                <button type="button" class="btn lgnb ml-2 btn-outline-success" data-toggle="modal" data-target="#logoutModaladmin">Logout</button>';
            }
            
    echo '</div>
    </div>
</nav>
</header>';



