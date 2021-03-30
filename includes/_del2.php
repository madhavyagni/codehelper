<?php 
include '_dbconnect.php';
$del = $_GET['del'];

$sql = "DELETE FROM `approve` WHERE `approve`.`thread_id` = '$del'";
    $result = mysqli_query($conn, $sql);
        $success = true;
        if($success){
            header("Location: /forum/admin.php?success=1");
        }else{
            header("Location: /forum/admin.php?success=0");
        }   
?>