<?php include 'includes/_dbconnect.php'; 
?>
<?php require 'includes/_header.php';
        include 'includes/_formhandle.php'; 

?>

<section id="bg">
    <div class="mainsrch">
        <h1 class="mainhead">Welcome to the forum</h1>
        <p>Search any question for your problem</p>
        <div class="src">
            <form action="/forum/search.php" class="form-inline smov" method="post">
                <input class="form-control mr-sm-2 srbar2" type="search" name="str"
                    placeholder="Enter the Search term.." aria-label="Search" />
                <button class="btn srch smove btn-success my-2 my-sm-0" type="submit" name="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</section>
<div class="container">
    <section class="cat-desk">
        <div class="bg-box">
            <h2 class="text-center py-3">Categories</h2>
            <div class="row">
                <?php
        
        $sql = 'SELECT * FROM `categories`';
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($res)){
            echo '<div class="col-lg-4 col-md-4 col-sm-12 box my-3">
            <div class="card" style="width: 25rem;">
                <img src="'. $row['img'] .'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'. $row['name'] .'</h5>
                    <p class="card-text">'. substr($row['descp'], 0, 130) .' .....</p>
                    <a href="threads.php?id='. $row['id'] .'" class="btn btn-success">Open thread</a>
                </div>
            </div>
        </div>';
        }
        
        ?>
            </div>
        </div>
    </section>
    <section class="cat-mob">
        <div class="bg-boxm">
            <h2 class="text-center py-3">Categories</h2>
            <div class="row">
                <?php
        
        $sql = 'SELECT * FROM `categories`';
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($res)){
            echo '<div class="col-lg-4 col-md-4 col-sm-12 box my-3">
            <div class="card" style="width: 25rem;">
                <img src="'. $row['img'] .'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'. $row['name'] .'</h5>
                    <p class="card-text">'. substr($row['descp'], 0, 130) .' .....</p>
                    <a href="threads.php?id='. $row['id'] .'" class="btn btn-success">Open thread</a>
                </div>
            </div>
        </div>';
        }
        
        ?>
            </div>
        </div>
    </section>
</div>
<?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            echo '<div class="bg2">
    <h3 class="text-center bg2-txt">Find answers for all your questions<br> in our well responding community<br> now for free</h3>
</div>';
        }else{
            echo '<div class="bg2">
    <h3 class="text-center bg2-txt">Find answers for all your questions Join now for free</h3>
    <button type="button" class="btn lgnb ml-2 btn-success mt-2" style="border: none;" data-toggle="modal"
        data-target="#signupModal">
        Signup
    </button>
</div>';
        }
    ?>

<section class="sec3">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-4 col-md-4 col-sm-12 box my-3">
                <div class="afs">
                    <img class="icons" src="images/1.png">
                    <h4>Knowledge Base</h4>
                    <p>Get all the knowledge you want from here get all your quaries answered here related to the
                        cooding.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 box my-3">
                <div class="afs">
                    <img class="icons" src="images/2.png" width="110rem">
                    <h4>Community</h4>
                    <p>Get answers for your questions as fast as possible use the advantage of our huge community.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 box my-3">
                <div class="afs">
                    <img class="icons" src="images/3.png" width="110rem">
                    <h4>Contact</h4>
                    <p>We are happy to help you all the time we are available 24/7
                        if you wont find answers you can ask us directly</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="c-desk">
    <div class="container">
        <div class="c-box mb-5">
            <h2 class="text-center py-3">Contact</h2>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 box my-3">
                    <div class="ctron my-5">
                        <div class="info d-flex my-3">
                            <img src="images/call.png">
                            <h4 class="mx-3">+91 9119XXXX36</h4>
                        </div>
                        <div class="info d-flex my-3">
                            <img src="images/mail.png">
                            <h4 class="mx-3">help@codehelper.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 cbox my-3">
                    <div class="ctronf my-5">
                        <form action="/forum/contact.php" class="form" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                                    placeholder="Enter your Name" required>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"></label>
                                <textarea class="form-control" name="txt" id="exampleFormControlTextarea1" rows="6"
                                    placeholder="Enter your Message"></textarea required>
                                </div>
        
                                <div><button type="submit" class="btn btn-success lgnb">Submit</button></div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
        </section>
    
    <section class="c-mob">
           
                <h2 class="text-center text-white py-3">Contact</h2>
                <div class="row mx-0">
                    <div class="col-lg-6 col-md-6 col-sm-12 box my-3">
                        <div class="ctron">
                            <div class="info d-flex my-3">
                                <img src="images/call.png">
                                <h4>+91 9119XXXX36</h4>
                            </div>
                            <div class="info d-flex my-3">
                                <img src="images/mail.png">
                                <h4>help@codehelper.com</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 box my-3">
                        <div class="ctronf my-5 mx-2">
                            <form action="/forum/contact.php" class="form" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"></label>
                                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                                        placeholder="Enter your Name" required>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                        placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"></label>
                                    <textarea class="form-control" name="txt" id="exampleFormControlTextarea1"
                                        rows="6" placeholder="Enter your Message"></textarea required>
                                </div>
        
                                <div><button type="submit" class="btn btn-success lgnb">Submit</button></div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            
        </section>
    <?php require 'includes/_footer.php' ?>

    