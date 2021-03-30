<?php 
session_start();

header("Location: /forum/adminlogin.php");

session_destroy();
?>