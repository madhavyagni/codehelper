<?php
    include '_dbconnect.php'; 


    $tid = $_GET['tid'];

    if($cat = "javascript"){
        $cat = 1;
    }else if($cat = "php"){
        $cat = 2;
    }else if($cat = "HTML,CSS"){
        $cat = 3;
    }

    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_code`, `thread_catid`, `thread_userid`, `timestamp`)
    SELECT thread_title, thread_desc, thread_code, thread_catid, thread_userid, timestamp FROM approve WHERE thread_id = $tid"; 
        $result = mysqli_query($conn, $sql);
        $success = true;
        if($success){
            header("Location: /forum/includes/_del2.php?del=".$tid."");
        }else{
            header("Location: /admin.php?success=0");
        }
?>