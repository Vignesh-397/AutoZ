<?php
session_start();
$servername = "db";
$username = "root";
$password = "your_root_password_here";
$port = '3306';
$dbname = "autoz";
  $con = new mysqli($servername, $username, $password, $dbname);

//Manager Login
if (isset($_POST['login'])) {

    $mgr_id = $_POST['name'];
    $password = $_POST['userpassword'];

    $query = "SELECT Password, mgr_name FROM manager_info WHERE mgr_id='$mgr_id' LIMIT 1";

    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['Password']) ) {
        $_SESSION['mgr_logged_in'] = true;
        $_SESSION['mgr_id'] = $mgr_id;
        $_SESSION['mgr_name'] = $user['mgr_name'];
        // header('Location: ../PostLogin/postlogin.php');
    } else {
        $_SESSION['mgr_logged_in'] = false;
        $_SESSION['login_error'] = true;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();

}

// mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#06aa5e">
    <meta name="msapplication-navbutton-color" content="#06aa5e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Manager Log In </title>
    <link rel="shortcut icon" href="./AutoZ.png" type="image/x-icon">
    <link rel="stylesheet" href="./SignIn.css">
</head>

<body>
    <main class="card-container slideUp-animation">
        <div class="image-container">
            <img src="SignInlogo.jpg">
        </div>

        <!-- Log In Form -->
        <form action="signin.php" method="post" id="login-form" >
            <div class="home-btm">
                <button type="button" onclick="window.location.href = '../index.php';">Home</button>
            </div>
            <div class="form-container-login slideUp-animation">
                <div class="input-container">
                    <label for="name"></label>
                    <input type="text" name="name" id="name" required>
                    <span>
                        Manager Id
                    </span>
                    <div class="error"></div>
                </div>
                <div class="input-container">
                    <label for="userpassword"></label>
                    <input type="password" name="userpassword" id="userpassword" class="user-password" required>
                    <span>Password</span>
                    <div class="error"></div>
                </div>
                <div id="btm">
                    <button type="submit"  name="login">Login</button>
                </div>
            </div>
        </form>
    </main>

    <script>

        //Login successfull 
        <?php if(isset($_SESSION['mgr_logged_in']) && $_SESSION['mgr_logged_in'] === true): ?>
            alert('Logged In Successfully');
            // window.location.href = 'ManagerPostLogin/mgr.php'; 
            var mgrId = <?php echo json_encode($_SESSION['mgr_id']); ?>;
            var mgrName = <?php echo json_encode($_SESSION['mgr_name']); ?>;
            window.location.href = 'ManagerPostLogin/mgr.php?mgr_id=' + mgrId + '&mgr_name=' + mgrName;
           
        //Login failed 
        <?php elseif(isset($_SESSION['login_error']) && $_SESSION['login_error'] === true): ?>
            alert('Invalid username or password');
            showLoginForm();
            window.location.href = '#'; 
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

    </script>

</body>

</html>