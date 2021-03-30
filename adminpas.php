<?php
 include 'includes/_dbconnect.php';

 $encryptedPwd = "";
 $mySalt = "";

 $pas = 9494453302;

 $encryptedpas = passwordEncrypt($pas);
 $sql = "UPDATE `adminlogin` SET `pas` = '$encryptedpas' WHERE `adminlogin`.`admin_id` = 1";

 $res = mysqli_query($conn, $sql);

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