<?php
    include 'includes/_dbconnect.php'; 
?>
    <?php 
include 'includes/_dbconnect.php';
require 'includes/_adminheader.php';

?>
    <div class="container">
        <?php

$sql = "SELECT * FROM `contact`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
echo "<h4 class = 'pt-4 pb-0'>Total num of entries are " . $num . "</h4><br><br />";
if ($num != 0) {while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="jumbotron j-green my-5">
                    <div class="media-body">
                        <h5 class="font-weight-bold text-dark">Name: '.$row['name'].'</h5>
                        <h5 class="mt-0">Email: '.$row['email'].'</h5>
                        <p>Message: '. $row['message'] .'</p>
                    </div>
            </div>';
}     
} 
?>
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
</body>

</html>