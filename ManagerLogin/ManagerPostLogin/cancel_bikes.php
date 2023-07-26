<?php
// Get the bid from the AJAX request
if (isset($_POST['bid'])) {
    $bid = $_POST['bid'];

    // Perform the database operation to delete the row from booked_cars table
    $con = mysqli_connect("localhost", "root", "", "autoz");
    $sql = "DELETE FROM booked_bikes WHERE bid = $bid";

    if (mysqli_query($con, $sql)) {
        echo "success"; // Send success response
    } else {
        echo "error"; // Send error response
    }

    mysqli_close($con);
}
?>