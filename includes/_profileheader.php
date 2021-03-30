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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>      
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
		<title>Cooding forum</title>
		<style>

		.image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
		
		</style>
    
</head>

<body>   
<header>
<div class="navmain bg-dark">
    <div class="container dflex">
        <div class="logo"><img src="images/logo.png"></div>
        <div class="srcd">
            <form action="/forum/search.php" class="form-inline my-4" method="post">
                <input class="form-control mr-sm-2 srbar" type="search" name="str" placeholder="Search"
                    aria-label="Search" />
                <button class="btn srch btn-success my-2 my-sm-0" type="submit" name="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
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
                    <a class="nav-link" href="/forum/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/forum/threads.php?id=1">JavaScript</a>
                        <a class="dropdown-item" href="/forum/threads.php?id=2">php</a>
                        <a class="dropdown-item" href="/forum/threads.php?id=3">HTML, CSS</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/forum/about.php">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/forum/contact.php">Contact</a>
                </li>
                <div class="srcm">
                    <form action="/forum/search.php" class="form-inline my-4" method="post">
                        <input class="form-control mr-sm-2 srbar" type="search" name="str" placeholder="Search"
                            aria-label="Search" />
                        <button class="btn srch btn-success my-2 my-sm-0" type="submit" name="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

            $userid = $_SESSION['user_id'];
            $sql3 = "SELECT user_img FROM `users` WHERE user_id='$userid'";
            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($res3);
            $userimg = $row3['user_img'];
            if($userimg == ''){
                echo '<img type="button" onclick="document.location=\'profile.php\'" src="images/profile.png" width="3.2%">';
            }else{
                echo '<img type="button" onclick="document.location=\'profile.php\'" style="border-radius: 50%; border:1px solid #fff;" src="'.$row3['user_img'].'" width="3.2%">';
            }
            echo '
            <button type="button" class="btn lgnb ml-2 btn-outline-success" data-toggle="modal" data-target="#logoutModal">Logout</button>';
        }else{
            echo '
            <button type="button" class="btn lgnb ml-2 btn-outline-success" data-toggle="modal" data-target="#loginModal">Login</button>
        <button type="button" class="btn lgnb ml-2 btn-outline-success" data-toggle="modal" data-target="#signupModal">Signup</button>';
        }
        
    echo '</div>
    </div>
</nav>
</header>';


require '_loginmodal.php';
require '_signupmodal.php';
require '_logoutmodal.php';
