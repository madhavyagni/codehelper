<?php 
session_start();

header("Location: " . $_GET["c"]);

session_destroy();
?>