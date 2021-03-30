<?php
  
    include 'includes/_dbconnect.php'; 
    require 'includes/_adminheader.php';
    $_SESSION['loggedinadmin'] = false;
    if(isset($_SESSION['loggedinadmin']) && $_SESSION['loggedinadmin'] == false){
        session_destroy();
    }
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pas = $_POST['password'];

        $chksql = "SELECT * FROM `adminlogin` WHERE admin_email='$email'";
        $res = mysqli_query($conn, $chksql);
        $numRows = mysqli_num_rows($res);

        if($numRows == 1){
            $row = mysqli_fetch_assoc($res);
            if(password_verify($pas, $row['pas'])){
                session_start();
                $_SESSION['loggedinadmin'] = true;
                $_SESSION['status'] = "Loged in successfully";
                $_SESSION['status2'] = "";
                $_SESSION['status_code'] = "success";
                header("Location: /forum/admin.php");
                
                exit();
               
            }
            else{
              
                $_SESSION['loggedinadmin1'] = true;
                header("Location: /forum/adminlogin.php");
            }
        }else{
            
            header("Location: /forum/adminlogin.php");
        }
    }
}
?>
<div class="container">

    <div class="modal fade" id="adminModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="successmsg">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Admin login</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                        <div class="form-group">
                            <label for="Email1">Email address</label>
                            <input type="email" class="form-control" id="Email" name="email"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <label for="Password1">Password</label>
                            <input type="password" class="form-control" name="password" id="Password">
                        </div>

                        <button type="submit" name="submit" class="btn mb-4 lgnb btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.js"></script>
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
<script>
$(document).ready(function() {
    $("#adminModal").modal('show');
});
</script>
</body>

</html>