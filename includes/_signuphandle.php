<?php
session_start();
$method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){

        include '_dbconnect.php';

        $email = $_POST['email'];
        $username = $_POST['username'];
        $pas = $_POST['password1'];
        $cpas = $_POST['password2'];
        $uppercase = preg_match('@[A-Z]@', $pas);
        $lowercase = preg_match('@[a-z]@', $pas);
        $number    = preg_match('@[0-9]@', $pas);
        $encryptedPwd = "";
        $mySalt = "";

        $chksql = "SELECT * FROM `users` WHERE user_email='$email'";
        $res = mysqli_query($conn, $chksql);
        $numRows = mysqli_num_rows($res);

        if($numRows>0){

            $_SESSION['status'] = "Email already exists";
            $_SESSION['status2'] = "Login to continue";
            $_SESSION['status_code'] = "warning";
            header("Location: " . $_GET["c"]);
        }
        else{
            if(strlen($pas) < 8){
                $_SESSION['status'] = "Weak password";
                $_SESSION['status2'] = "Password length must be atleast 8 ";
                $_SESSION['status_code'] = "warning";
                header("Location: " . $_GET["c"]);
            }else if(!$uppercase || !$lowercase || !$number) {
                $_SESSION['status'] = "Check formate";
                $_SESSION['status2'] = "Passwor must contain 1 uppercase 1 lowercase.";
                $_SESSION['status_code'] = "warning";
                header("Location: " . $_GET["c"]);
            }
            else if(empty($username)){
                $_SESSION['status'] = "Username empty";
                $_SESSION['status2'] = "enter your username";
                $_SESSION['status_code'] = "warning";
                header("Location: " . $_GET["c"]);
            }
            else if($pas == $cpas){
                $encryptedpas = passwordEncrypt($pas);
                $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pas`, `datetime`) VALUES ('$username', '$email', '$encryptedpas', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    $_SESSION['status'] = "Acount created successfully";
                    $_SESSION['status2'] = "Now you can login";
                    $_SESSION['status_code'] = "success";
                    header("Location: " . $_GET["c"]);
                    exit();
                }
            }
            else{
                $_SESSION['status'] = "Password dos not match";
                $_SESSION['status2'] = "Check your password";
                $_SESSION['status_code'] = "warning";
                header("Location: " . $_GET["c"]);
            }
        }
        

    }

    function passwordEncrypt($pwd)
{
    $hashFormat = '$2y$10$';
    $GLOBALS['mySalt'] = generateSalt();
    $mixture = $hashFormat . $GLOBALS['mySalt'];
    $encryptedPwd = crypt($pwd, $mixture);
    return ($encryptedPwd);
}

function generateSalt()
{
    $uniqueString = md5(uniqid(mt_rand(), true));
    $base64encoded = base64_encode($uniqueString);
    $modifiedString = str_replace("+", ".", $base64encoded);
    $actualSalt = substr($modifiedString, 0, 22);
    return $actualSalt;
}

?>