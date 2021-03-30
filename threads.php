
    <?php require 'includes/_header.php' ?>
    <?php include 'includes/_dbconnect.php' ?>
    <?php require 'includes/_loginmodal.php' ?>
    <?php require 'includes/_signupmodal.php' ?>

    <button style="position: absolute;right: 0;bottom: 0;z-index: 999;position: fixed;" type="button" onclick="window.location.href='#qtn'" class="btn my-3 btn-success">Ask your question</button>

    <?php 
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `categories` WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $name = $row['name'];
        $des = $row['descp'];

    }
    
    
    ?>
    <?php

    $success = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        if(isset($_POST['sub'])){
        $q_title = $_POST['qtitle'];
        $q_desc = $_POST['qdesc'];
        $q_code = $_POST['code'];
        $userid = $_POST['userid'];
        if(empty($q_title)){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>warning!</strong> Enter question title.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else if(empty($q_desc)){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>warning!</strong> Enter question description.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else{
        $sql = "INSERT INTO `approve` (`thread_title`, `thread_desc`, `thread_code`, `thread_catid`, `thread_userid`, `timestamp`) VALUES ('$q_title', '$q_desc', '<xmp>$q_code</xmp>', '$id', '$userid', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $success = true;
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your question has submited wait for aproval.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    }
}
    ?>
    <section>
        <div class="container">
            <div class="jumbotron j-black my-5">
                <h1 class="display-6"><?php echo $name ?></h1>
                <hr style="background-color: rgb(0, 0, 0);" class="my-4">
                <p>
                    <?php echo $des ?>
                </p>
            </div>
            <h2 class="display-5 ml-3">Questions</h2>

            <?php 
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `threads` WHERE thread_catid=$id";
    $res = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($res)){
        $noResult = false;
        $tid = $row['thread_id'];
        $name = $row['thread_title'];
        $des = $row['thread_desc'];
        $thread_userid = $row['thread_userid'];
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
                        <p class="font-weight-bold text-dark">Posted by '.$row2['user_name'].'</p>
                        <u><h5 class="mt-0"><a class="text-dark" href="qthread.php?id='.$tid.'">'. $name .'</a></h5></u>
                        <p>'. $des .'</p>
                        </div>
                </div>';
                if(strlen($row['thread_code']) < 12){

                }else{
                    echo '<div class="code-disp"><pre class="prettyprint codealign">'.$row['thread_code'].'</pre></div>';
                }
            echo '</div>';

    }

    if($noResult){
        echo '<div class="jumbotron j-green my-5">
          <h1 class="display-4">Be the first one to comment</h1>
          <p class="lead">No questions found be the first one to comment.</p>
      </div>';
    }

    
    ?>




            <h2 id="qtn" class="display-5 ml-3">Post your questions</h2>


            <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 
            echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="POST" class="form my-5">
            <div class="form-group">
                <label for="qtitle" class="my-3"><b>Question Title</b></label>
                <input type="text" class="form-control" id="qtitle" name="qtitle" required>

            </div>
            <div class="form-group">
                <label for="qdesc" class="my-3"><b>Enter your question</b></label>
                <textarea class="form-control" id="qdesc" name="qdesc" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="code" class="my-3"><b>Enter your code</b></label>
                <textarea class="form-control" name="code" rows="6"></textarea>
            </div>
            <input type="hidden" name="userid" value="'.$_SESSION['user_id'].'">

            <div><button type="submit" name="sub" class="btn btn-success my-3 lgnb">Submit</button></div>
        </form>';
        }else{
            echo '<p class="px-5 my-5 font-weight-bold">Login to post your question</p>';
        }

        ?>



        </div>
    </section>
    <?php require 'includes/_footer.php' ?>