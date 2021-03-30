<?php include '_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['txt'];

    if (empty($name)) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
      <strong>Enter your name</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    } else if (empty($email)) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Enter your email</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else if (empty($msg)) {
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Enter your message</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {

        $tbl = "INSERT INTO `contact` (`name`, `email`, `message`, `datetime`) VALUES ('$name', '$email', '$msg', current_timestamp())";
        $result = mysqli_query($conn, $tbl);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> hey ' . $name . ' Your entrie has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Unable to connect to server</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }

}


?>