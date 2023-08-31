<?php
session_start();

// Destroy all session variables
session_unset();
session_destroy();

// Generate a random token
$random_token = bin2hex(random_bytes(32));

// Redirect to index.php with the random token
header("Location: index.php?token=$random_token");
// // Redirect to index.php
// header('Location:index.php');
unset($_SESSION['name']);
unset($_SESSION['mail']);
unset($_SESSION['city']);
unset($_SESSION['phone']);
exit();
?>
