<?php
session_start();
$method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        if(isset($_POST['lgsub'])){

        include '_dbconnect.php';

        $email = $_POST['email'];
        $pas = $_POST['password'];

        $chksql = "SELECT * FROM `users` WHERE user_email='$email'";
        $res = mysqli_query($conn, $chksql);
        $numRows = mysqli_num_rows($res);

        if($numRows == 1){
            $row = mysqli_fetch_assoc($res);
            if(password_verify($pas, $row['user_pas'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['status'] = "Loged in successfully";
                $_SESSION['status2'] = "Welcome to codehelper";
                $_SESSION['status_code'] = "success";
                header("Location: " . $_GET["c"]);
                
                exit();
               
            }
            else{
                $_SESSION['status'] = "Wrong password";
                $_SESSION['status_code'] = "error";
                $_SESSION['status2'] = "Check the password you entered";
                header("Location: " . $_GET["c"]);
            }
        }else{
            $_SESSION['status'] = "Email dose not exist";
            $_SESSION['status_code'] = "error";
            $_SESSION['status2'] = "Check the email you entered";
            header("Location: " . $_GET["c"]);
        }
    }
}
