<?php
$insert = false;
session_start();

if (isset($_GET['param'])) {
    $param = $_GET['param'];
    // echo "Parameter value: $param";
    $param = trim($param, "\"'");
    $param = filter_var($param, FILTER_VALIDATE_INT);
    // echo "Parameter value: $param";

    if (isset($_POST['name'])) {
      $servername = "db";
      $username = "root";
      $password = "autoz2023";
      $port = '3306';
      $dbname = "autoz";
        $con = new mysqli($servername, $username, $password, $dbname);
        // echo "param value: $param";

        if (!$con) {
            die("Connection to this database failed due to " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $number = $_POST['number'];
        $city = $_POST['city'];
        $date_m = $_POST['date_meet'];
        // $other = $_POST['other'];

        $sql = "INSERT INTO booked_cars(`cid`,`buyer_name`, `phone`, `city`, `date_of_meet`) VALUES ('$param','$name','$number','$city','$date_m')";

        if ($con->query($sql) == true) {
            $insert = true;
        } else {
            echo "ERROR: $sql <br> $con->error";
        }

        $con->close();

        if ($insert) {
            $_SESSION['success'] = true;
        } else {
            $_SESSION['success'] = false;
        }

        header('Location: ' . $_SERVER['PHP_SELF'] . '?param=' . $param);
        exit();
    }
} else {
    echo "No 'param' value provided.";
}
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="buyform.css">
  <title>Buy Cars</title>
  <link rel="shortcut icon" href="../../AutoZ.png" type="image/x-icon">
</head>

<body>
 
     <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
       
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <form action="<?php echo $_SERVER['PHP_SELF'] . '?param=' . $param; ?>" method="post">
                <div class="field padding-bottom--24">
                  <label for="name">Name</label>
                  <input minlength="4" type="text" name="name" id="name">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="number">Phone</label>
                  </div>
                  <input type="phone" name="number">
                </div>
                <div class="field padding-bottom--24">
                    <label for="city">City</label>
                    <input type="text" name="city">
                  </div>
                  <div class="field padding-bottom--24">
                    <label for="date_meet">Date For Meet</label>
                    <input type="date" name="date_meet">
                  </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Confirm">
                </div>
                
              </form>
              <div class="cancel">
                  <a href="..\buycars.php">Cancel</a>
                </div>
            </div>
          </div>
      </div>

      
      <script>
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] === true): ?>
        alert('Booked Successfully');
        window.location.href = '../../PostLogin/postlogin.php'; 
    <?php elseif(isset($_SESSION['success']) && $_SESSION['success'] === false): ?>
        alert('Something went wrong');
        window.location.href = '#'; 
    <?php endif; ?>

    <?php unset($_SESSION['success']); ?>
    </script>
    </div>
</body>
</html>

