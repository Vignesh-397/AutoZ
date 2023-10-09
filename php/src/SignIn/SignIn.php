<?php
session_start();

$insert = false;

$servername = "db";
$username = "root";
$password = "autoz2023";
$port = '3306';
$dbname = "autoz";
  $con = mysqli_connect($servername, $username, $password, $dbname);

//Register
if(isset($_POST['name'])){
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $city = $_POST['city'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $userpassword = $_POST['userpassword'];
    $userpassword_confirm = $_POST['user-password-confirm'];

    //Pasword match --> Done using JavaScript

    // if ($userpassword !== $userpassword_confirm) {
    //     $_SESSION['registration_error'] = true;
    //     header('Location: ' . $_SERVER['HTTP_REFERER']);
    //     exit();
    // }

    // Check if the email is already registered
    $email_check_query = "SELECT * FROM signininfo WHERE Email='$mail' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['registration_error2'] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    

    //Valid Info ---> Push to databse

    //Password hashing 
    $hashed_pasword = password_hash($userpassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `autoz`.`signininfo` (`Name`,  `City`, `Email`, `Phone`, `Password`, `dt`) VALUES ('$name',  '$city', '$mail', '$phone', '$hashed_pasword',current_timestamp());";

    if($con->query($sql) == true){
        $insert = true;

        //future use
        // $_SESSION['name'] = $name;
        // $_SESSION['city'] = $city;
        // $_SESSION['mail'] = $mail;
        // $_SESSION['phone'] = $phone;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();

    if ($insert) {
        $_SESSION['success'] = true;
    
    } else {
        $_SESSION['success'] = false;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}


// Login
if (isset($_POST['login'])) {

    $mail = $_POST['mail'];
    $password = $_POST['userpassword'];

    $query = "SELECT Password FROM signininfo WHERE Email='$mail' LIMIT 1";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['Password']) ) {
        $_SESSION['logged_in'] = true;

        //future use
        $_SESSION['name'] = $user['Name'];
        $_SESSION['city'] = $user['City'];
        $_SESSION['mail'] = $user['Email'];
        $_SESSION['phone'] = $user['Phone'];
        header('Location: ../PostLogin/postlogin.php');
    } else {
        $_SESSION['logged_in'] = false;
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
    <title>Sign In</title>
    <link rel="shortcut icon" href="./AutoZ.png" type="image/x-icon">
    <link rel="stylesheet" href="./SignIn.css">
    <script src="./assets/js/script.js" defer></script>
</head>

<body>
    <main class="card-container slideUp-animation">
        <div class="image-container">
            <img src="SignInlogo.jpg">
        </div>

        <!-- Sign In Form -->
        <form action="signin.php" method="post" id="signup-form" onsubmit="return validateForm();">
            <div class="home-btm">
                <button type="button" onclick="window.location.href = '../index.php';">Home</button>
            </div>
            <div class="form-container slideRight-animation">
                <h1 class="form-header">
                    Get started
                </h1>
                
                <div class="input-container">
                    <label for="name"></label>
                    <input type="text" name="name" id="name" required>
                    <span>
                        Name
                    </span>
                    <div class="error"></div>
                </div>

                <div class="input-container">
                    <label for="city"></label>
                    <input type="text" name="city" id="city" required>
                    <span>
                        City
                    </span>
                    <div class="error"></div>
                </div>

                <div class="input-container">
                    <label for="mail">
                    </label>
                    <input type="email" name="mail" id="mail" required>
                    <span>
                        E-mail
                    </span>
                    <div class="error"></div>
                </div>

                <div class="input-container">
                    <label for="phone">
                    </label>
                    <input type="tel" name="phone" id="phone" required>
                    <span>Phone</span>
                    <div class="error"></div>
                </div>

                <div class="input-container">
                    <label for="userpassword"></label>
                    <input type="password" name="userpassword" id="userpassword" class="user-password" required>
                    <span>Password</span>
                    <div class="error"></div>
                </div>

                <div class="input-container">
                    <label for="user-password-confirm"></label>
                    <input type="password" name="user-password-confirm" id="user-password-confirm"
                        class="password-confirmation" required>
                    <span>
                        Confirm Password
                    </span>
                    <div class="error"></div>
                </div>

                <div id="btm">
                    <button type="submit"  name="register" class="submit-btn">Create Account</button>
                    <p class="btm-text">
                        Already have an account..? <a class="btm-text-highlighted" href="#" onClick="showLoginForm()">Log in</a> 
                    </p>
                </div>
            </div>
        </form>


        <!-- Log In Form -->
        <form action="signin.php" method="post" id="login-form" style="display: none; ">
            <div class="home-btm">
                <button type="button" onclick="window.location.href = '../index.php';">Home</button>
            </div>
            <div class="form-container-login slideUp-animation">
                <div class="input-container">
                    <label for="mail"></label>
                    <input type="email" name="mail" id="mail" required>
                    <span>
                        E-mail
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
                <p class="btm-text">
                    New user..? <a class="btm-text-highlighted" href="#" onClick="showSignUpForm()">register</a> 
                </p>
                </div>
            </div>
        </form>
    </main>

    <script>
        function showLoginForm() {
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
        }

        function showSignUpForm(){
            document.getElementById("signup-form").style.display = "block";
            document.getElementById("login-form").style.display = "none";
        }

        function validateForm() {
            var name = document.getElementById("name").value;
    var city = document.getElementById("city").value;
    var email = document.getElementById("mail").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("userpassword").value;
    var confirmPassword = document.getElementById("user-password-confirm").value;

    if (!/^[A-Za-z\s]+$/.test(name)) {
        alert("Please enter a valid Name containing only letters.");
        return false;
    }

    if (!/^[A-Za-z\s]+$/.test(city)) {
        alert("Please enter a valid City containing only letters.");
        return false;
    }
    
    if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (!phone.match(/^\d{10}$/)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
        }
        
        //Successfull registration 
        <?php if(isset($_SESSION['success']) && $_SESSION['success'] === true): ?>{
            alert('Account Created Successfully');
            window.location.href = '../PostLogin/postlogin.php'; 
        }

        //Password mismatch
        <?php elseif(isset($_SESSION['registration_error']) && $_SESSION['registration_error'] === true): ?>
            window.onload = function() {
                alert('Password does not match');
                window.location.href = '#';
        };
        <?php unset($_SESSION['registration_error']); ?>

        //Email already exist in database
        <?php elseif(isset($_SESSION['registration_error2']) && $_SESSION['registration_error2'] === true): ?>
            window.onload = function() {
                alert('Email already exists');
                showLoginForm();
                window.location.href = '#';
        };
        <?php unset($_SESSION['registration_error2']); ?>
        <?php endif; ?>

        //Login successfull 
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            alert('Logged In Successfully');
            window.location.href = '../PostLogin/postlogin.php'; 
            <?php unset($_SESSION['logged_in']); ?>

        //Login failed 
        <?php elseif(isset($_SESSION['login_error']) && $_SESSION['login_error'] === true): ?>
            alert('Invalid username or password');
            showLoginForm();
            window.location.href = '#'; 
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <?php unset($_SESSION['success']); ?>
    </script>

</body>

</html>
