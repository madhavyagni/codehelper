

<?php require 'includes/_header.php' ?>
    <?php include 'includes/_dbconnect.php' ?>
    <?php require 'includes/_loginmodal.php' ?>
    <?php require 'includes/_signupmodal.php' ?>
    <?php
    $id = $_GET['id'];
    $success = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        $c_desc = $_POST['cdesc'];
        $userid = $_POST['userid'];
        $ccode = $_POST['ccode'];
        if(empty($c_desc)){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>warning!</strong> Enter somthing.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else{
        $sql = "INSERT INTO `comments` (`comment_id`, `comment_desc`, `comment_code`, `thcomment_id`, `user_name_id`, `comment_time`) VALUES (NULL, '$c_desc', '<xmp>$ccode</xmp>', '$id', '$userid', current_timestamp())
        ";
        $result = mysqli_query($conn, $sql);
        $success = true;
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has be posted successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    }

     ?>
    <section>
        <div class="container">
        <?php 
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $res = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($res)){
        $noResult = false;
        $name = $row['thread_title'];
        $des = $row['thread_desc'];
        $code = $row['thread_code'];
        $thread_userid = $row['thread_userid'];
        $sql2 = "SELECT user_name FROM `users` WHERE user_id='$thread_userid'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        echo '<div class="jumbotron j-black my-5">
    <h1 class="display-6">'.$name.'</h1>
    <hr style="background-color: rgb(0, 0, 0);" class="my-4">
    <p>
    '.$des.'
    </p>';
    if(strlen($code) < 12){

    }else{
        echo '<div class="code-disp"><pre class="prettyprint codealign">'.$row['thread_code'].'</pre></div>';
    }
    
    echo '<p class="font-weight-bold my-3">Posted by '.$row2['user_name'].'</p>
</div>';

    }

    ?>
            <h2 class="display-5 ml-3">Answers</h2>
            <?php
    
    $sql = "SELECT * FROM `comments` WHERE thcomment_id=$id";
    $res = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($res)){
        $noResult = false;
        $com_desc = $row['comment_desc'];
        $com_code = $row['comment_code'];
        $thread_userid = $row['user_name_id'];
        $sql2 = "SELECT user_name FROM `users` WHERE user_id='$thread_userid'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $sql3 = "SELECT user_img FROM `users` WHERE user_id='$thread_userid'";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);
        $userimg = $row3['user_img'];
        echo '<div class="jumbotron j-green my-5">
    <div class="media">
    <div class="circle">';
    if($userimg == ''){
        echo '<img src="images/user.webp" style="border-radius: 50%;" width="35px" class="mr-3" alt="..."></div>';
    }else{
        echo '<img src="'.$row3['user_img'].'" style="border-radius: 50%;" width="35px" class="mr-3" alt="..."></div>';
    }
        echo '<div class="media-body">
            <p class="font-weight-bold text-dark">'.$row2['user_name'].'</p>
            <p>'. $com_desc .'</p>
            
        </div>
    </div>';
    if(strlen($com_code) < 12){
                
    }else{
        echo '<div class="code-disp"><pre class="prettyprint codealign">'.$com_code.'</pre></div>';
    }
echo '</div>';

    }

    if($noResult){
        echo '<div class="jumbotron j-red my-5">
        <div class="container">
          <h1 class="display-4">No result</h1>
          <p class="lead">No one answered this question yet.</p>
        </div>
      </div>';
    }
    
    ?>
            <h2 class="display-5 ml-3">Post your Answer</h2>
            <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="POST" class="form my-5">
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="my-3"><b>Enter your answer</b></label>
                <textarea class="form-control" id="cdesc" name="cdesc" rows="3" required></textarea>
                <input type="hidden" name="userid" value="'.$_SESSION['user_id'].'">
            </div>
            <div class="form-group">
                <label for="ccode" class="my-3"><b>Enter code here</b></label>
                <textarea class="form-control" id="ccode" name="ccode" rows="6"></textarea>
            </div>
        
            <div><button type="submit" class="btn btn-success my-3 lgnb">Submit</button></div>
        </form>'; 
        }else{
            echo '<p class="px-5 my-5 font-weight-bold">Login to post your comment</p>';
        }
        ?>
        </div>
    </section>
    <?php require 'includes/_footer.php' ?>
