<?php
// Get the cid from the AJAX request
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    // Perform the database operation to delete the row from booked_cars table
    $con = mysqli_connect("localhost", "root", "", "autoz");
    $sql = "DELETE FROM booked_cars WHERE cid = $cid";

    if (mysqli_query($con, $sql)) {
        echo "success"; // Send success response
    } else {
        echo "error"; // Send error response
    }

    mysqli_close($con);
}
?>
