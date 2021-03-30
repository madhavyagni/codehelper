<?php require 'includes/_header.php';
include 'includes/_formhandle.php'; ?>
<section id="bgc">
    <div class="chead">
        <h1 class="cmainhead"><b>Get in touch</b></h1>
        <p>Want to get in touch? we’d love to here from you. Here is how you can reach us...</p>
    </div>
</section>

<section class="c-desk">
    <div class="container">
        <div class="bg-box">
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
            <div class="container">
                <h2 class="text-center text-white py-3">Contact</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 box my-3">
                        <div class="ctron my-5 mx-3">
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
            </div>
        </section>
    
    <?php require 'includes/_footer.php' ?>