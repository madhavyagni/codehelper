<?php

echo '<footer class="footer bg-dark">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <img class="logo2" src="images/logo.png">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <h4 class="mt-3">Code Helper</h4>
            <ul class="flist mt-5">
                <li><a href="/index.php">home</li></a>
                <li><a href="/about.php">about</li></a>
                <li><a href="/contact.php">Contact</li></a>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h4 class="mt-3">Our mission</h4>
            <p>Our mission is to help each other learn, build and share using code. By providing a community
                that supports each other, through discussion & question-based threads, to providing resources
                that will give developers the upper hand on creating their project. We strive forward together
                by helping out each other with complex to simple questions that a new developer may come up
                with. We now live in a world where we are surrounded by technology, and with technology comes
                code.</p>
        </div>
    </div>
    <hr style="background-color: #fff;">
    <div class="cright text-center py-4">All Rights Reserved &#169; 2021</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    
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
    
echo '</body>

</html>';