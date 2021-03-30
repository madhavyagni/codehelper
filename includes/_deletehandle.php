<?php 
include '_dbconnect.php';
    $tid = $_GET['tid'];
    

    
    $sql = "DELETE FROM `approve` WHERE `thread_id` = '$tid'";
    $result = mysqli_query($conn, $sql);
        $success = true;
        if($success){
            header("Location: /forum/admin.php?del=1");
        }else{
            header("Location: /forum/admin.php?del=0");
        }
        