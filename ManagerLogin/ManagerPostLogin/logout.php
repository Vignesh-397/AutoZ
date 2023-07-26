<?php
session_start();

// Destroy all session variables
session_unset();
session_destroy();


// Redirect to index.php
header('Location: ../../index.php');
unset($_SESSION['mgr_logged_in']);
exit();
?>
