<?php
// Get the cid from the AJAX request
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    // Perform the database operation to delete the row from booked_cars table
    $servername = "db";
      $username = "root";
      $password = "autoz2023";
      $port = '3306';
      $dbname = "autoz";
      $con = new mysqli($servername, $username, $password, $dbname);
    $sql = "DELETE FROM booked_cars WHERE cid = $cid";

    if (mysqli_query($con, $sql)) {
        echo "success"; // Send success response
    } else {
        echo "error"; // Send error response
    }

    mysqli_close($con);
}
?>
