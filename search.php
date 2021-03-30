<?php
ob_start();
?>
<?php 
include 'includes/_dbconnect.php';
include 'includes/_header.php'; 

?>
    <div class="containerd">
        <div class="container">
<?php
$method = $_SERVER['REQUEST_METHOD'];            
if($method == 'POST'){
if(isset($_POST['submit'])){
    $strm = $_POST['str'];
    $str = mysqli_real_escape_string($conn, $_POST['str']);
    $sql = "select * from threads where thread_title like '%$str%' or thread_desc like '%$str%'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
      while($row=mysqli_fetch_assoc($res)){
        $tid = $row['thread_id'];
        $name = $row['thread_title'];
        $des = $row['thread_desc'];
        $thread_userid = $row['thread_userid'];
        $sql2 = "SELECT user_name FROM `users` WHERE user_id='$thread_userid'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        if(empty($strm)){
            header("Location: /forum/index.php");
            ob_end_flush();
        }else{
        
            echo '<div class="jumbotron j-green my-5">
            <div class="media">
                <img src="images/user.webp" width="35px" class="mr-3" alt="...">
                <div class="media-body">
                    <p class="font-weight-bold text-dark">Posted by <a class="text-dark" href="#">'.$row2['user_name'].'</a></p>
                    <h5 class="mt-0"><a class="text-dark" href="qthread.php?id='.$tid.'">'. $name .'</a></h5>
                    <p>'. $des .'</p>
                </div>
            </div>
        </div>';
        
        }
      }
    }else{echo '<h5 class="mt-0 my-5">No results found</h5>';}
  }
}

?>
        </div>
    </div>
</body>


<?php require 'includes/_footer.php' ?>
