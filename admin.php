<?php
    include 'includes/_dbconnect.php'; 
    include 'includes/_adminlogouth.php';
?>

<?php require 'includes/_adminheader.php';
    
    if(isset($_GET['success']) && $_GET['success'] == 1){
        echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Inserted in to DB successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }     
    else if(isset($_GET['success']) && $_GET['success'] == 0){
        echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Inserted in to DB failed.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    } 
    if(isset($_GET['del']) && $_GET['del'] == 1){
        echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Deleted successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }   
    if(isset($_GET['del']) && $_GET['del'] == 0){
        echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Deletion not successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }   
    ?>


<?php    
if(isset($_SESSION['loggedinadmin']) && $_SESSION['loggedinadmin'] == true){
    ?>
<div class="container">

<?php 
        $sql = "SELECT * FROM `approve`";
        $res = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($res)){
            $noResult = false;
            $tid = $row['thread_id'];
            $name = $row['thread_title'];
            $des = $row['thread_desc'];
            $cat = $row['thread_catid'];
            if($cat == 1){
                $cat = "javascript";
            }else if($cat == 2){
                $cat = "php";
            }else if($cat == 2){
                $cat = "HTML,CSS";
            }else{
                $cat = $cat;
            }
            $thread_userid = $row['thread_userid'];
            $sql2 = "SELECT user_name FROM `users` WHERE user_id='$thread_userid'";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($res2);
        
        echo '<div class="jumbotron j-green my-5">
                <div class="media">
                    <img src="images/user.webp" width="35px" class="mr-3" alt="...">
                    <div class="media-body">
                        <p class="font-weight-bold text-dark">Posted by <a class="text-dark" href="#">'.$row2['user_name'].'</a></p>
                        <h5 class="mt-0">'. $name .'</h5>
                        <p>'. $des .'</p>
                        <p><b>'. $cat .'</b></p>
                        <a href="includes/_aprovehandle.php?tid='.$tid.'" type="button" class="btn btn-success text-light">Aprove</a>
                        <a href="includes/_deletehandle.php?tid='.$tid.'" type="button" class="btn btn-danger text-light">delete</a>
                    </div>
                </div>
            </div>';

    }

    if($noResult){
        echo '<div class="jumbotron j-green my-5">
          <h1 class="display-5">No questions</h1>
          <p class="lead">No questions found be to be approve.</p>
      </div>';
    }

    
    ?>

</div>
<?php
}else{
    header("Location: /forum/adminlogin.php");
}
?>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
    ?>
<script>
swal(
    "<?php echo $_SESSION['status'] ?>",
    "<?php echo $_SESSION['status2'] ?>",
    "<?php echo $_SESSION['status_code'] ?>"
);
</script>
<?php
    unset($_SESSION['status']);
}
?>
</body>

</html>