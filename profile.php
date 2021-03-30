<?php
 include 'includes/_dbconnect.php';
 require 'includes/_profileheader.php';



 $method = $_SERVER['REQUEST_METHOD'];
 if($method == 'POST'){
 if(isset($_POST['submit'])){

    $newname = $_POST['name'];
    $userid = $_SESSION['user_id'];

    if(empty($newname)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>warning!</strong> Name field canot be empty.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
        $sql = "UPDATE `users` SET `user_name` = '$newname' WHERE `users`.`user_id` = $userid";

        $res = mysqli_query($conn, $sql);
        $userid = $_SESSION['username'] = $newname;
        $success = true;
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Name has changed successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
}

if(isset($_POST['submit2'])){

    $pas = $_POST['pas1'];
    $cpas = $_POST['pas2'];
    $uppercase = preg_match('@[A-Z]@', $pas);
    $lowercase = preg_match('@[a-z]@', $pas);
    $number    = preg_match('@[0-9]@', $pas);
    $encryptedPwd = "";
    $mySalt = "";
    $userid = $_SESSION['user_id'];

    if(empty($pas)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>warning!</strong> Password canot be empty.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else if(!$uppercase || !$lowercase || !$number) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>warning!</strong> Passwor must contain 1 uppercase 1 lowercase.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }else if(strlen($pas) < 8){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>warning!</strong> Passwor length must be atleast 8.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      else if($pas == $cpas){
        $encryptedpas = passwordEncrypt($pas);
        $sql = "UPDATE `users` SET `user_pas` = '$encryptedpas' WHERE `users`.`user_id` = $userid";

        $res = mysqli_query($conn, $sql);
        if($res){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong> Passwor has changed successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            exit();
        }
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

<?php    
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    ?>
    <div class="p-back">
<div style="min-height: 800px;" class="container" align="center">
    <br />
    <h4 class="my-5" align="center">Hello! <?php echo $_SESSION['username']; ?></h4>
    <br />
    <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <div class="image_area">
                <form method="post">
                    <label for="upload_image">
                        <?php
                            $userid = $_SESSION['user_id'];
                            $sql3 = "SELECT user_img FROM `users` WHERE user_id='$userid'";
                            $res3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_assoc($res3);
                            $userimg = $row3['user_img'];

                            if($userimg == ''){
                                echo '<img src="images/user.webp" style="border-radius: 50%;" id="uploaded_image"
                                class="img-responsive img-circle" />';
                            }else{
                                echo '<img src="'.$row3['user_img'].'" style="border-radius: 50%;" id="uploaded_image"
                                class="img-responsive img-circle" />';
                            }
                            
                            ?>
                        <div class="overlay">
                            <div class="text">Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                    </label>
                </form>
            </div>
            <div class="edit my-5">
                <div style="align-items: center;justify-content: center;" class="row d-flex ml-4">
                    <h5 class="my-1 mr-4">Edit Username</h5><img type="button" data-toggle="modal"
                        data-target="#editname" src="images/edit.png" width="10%">
                </div>
                <div style="align-items: center;justify-content: center;" class="row d-flex ml-4">
                    <h5 class="my-1 mr-4">Change password</h5><img type="button" data-toggle="modal"
                        data-target="#changepass" src="images/edit.png" width="10%">
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="sample_image" />
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crop" class="btn btn-success">Crop</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
}else{
    ?>
<div style="min-height: 600px;" class="container">
    <h3 class="my-5">Login to view this page</h3>
</div>
<?php
}
?>


<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <img class="logo2" src="images/logo.png">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h4 class="mt-3">Code Helper</h4>
                <ul class="flist mt-5">
                    <li>Catogories</li>
                    <li>Catogories</li>
                    <li>Catogories</li>
                    <li>Catogories</li>
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


<!-- Modal editname -->
<div class="modal fade" id="editname" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="form-group">

                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal changepass -->
<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=<?php echo $_SERVER['REQUEST_URI'] ?> method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" name="pas1" id="pas1">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pas2" id="pas2">
                    </div>
                    <button type="submit" name="submit2" class="btn btn-success">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
</body>

</html>

<script>
$(document).ready(function() {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function(event) {
        var files = event.target.files;

        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                    }
                });
            };
        });
    });

});
</script>