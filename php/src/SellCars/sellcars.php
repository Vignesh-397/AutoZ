<?php
$insert = false;
session_start();
if(isset($_POST['owner_name'])){
    $servername = "db";
    $username = "root";
    $password = "your_root_password_here";
    $port = '3306';
    $dbname = "autoz";
      $con = new mysqli($servername, $username, $password, $dbname);

    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $owner_name = $_POST['owner_name'];
    $phone = $_POST['phone'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $RTO = $_POST['RTO'];
    $fuel = $_POST['fuel'];
    $kms = $_POST['kms'];
    $ownership = $_POST['Ownership'];
    $engine = $_POST['Engine'];
    $transmission = $_POST['Transmission'];
    $mileage = $_POST['Mileage'];
    $wheel = $_POST['wheel'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];

    //Image URL
    $img_url = '';
    if(isset($_FILES['img_url']) && $_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
        $img_tmp_name = $_FILES['img_url']['tmp_name'];
        $img_name = $_FILES['img_url']['name'];
        $img_path = 'uploads/' . $img_name; 
        move_uploaded_file($img_tmp_name, $img_path);
        $img_url = $img_path;
    }

    $sql = "INSERT INTO `sold_cars` (`owner_name`,  `phone`, `brand`, `model`, 
    `reg_year`, `RTO`,`fuel_type`, `kms_driven`, `ownership`, `engine`, `transmission`,
    `mileage`,`wheel_size`,`seats`, `price` ,`img_url`) 
    VALUES ('$owner_name',  '$phone', '$brand', '$model', '$year', '$RTO','$fuel','$kms',
    '$ownership', '$engine', '$transmission', '$mileage', '$wheel', '$seats','$price', '$img_url')";

    if($con->query($sql) === true){
        echo "Successfully inserted";
        $insert = true;
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
        // header('Location: ../index.php'); 
        exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sellcars.css" class="css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="menu slideRight-animation" role='navigation'>
            <div class="logo">
                <a href="../PostLogin/postlogin.php">Auto Z</a>
            </div>
            <ol>

                <li class="menu-item"><a href="../PostLogin/postlogin.php">Home</a></li>
                <!-- <li class="menu-item"><a href="#section-footer">About</a></li> -->
                <li class="menu-item" aria-haspopup="true">
                    <a href="#0">Cars</a>
                    <ol class="sub-menu" aria-label="submenu">
                        <li class="menu-item"><a href="#0">Popular Cars</a></li>
                        <li class="menu-item"><a href="../BuyCars/buycars.php">Buy Cars</a></li>
                        <li class="menu-item"><a href="#">Sell Cars</a></li>
                    </ol>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="#0">Bikes</a>
                    <ol class="sub-menu" aria-label="submenu">
                        <li class="menu-item"><a href="#0">Popular Bikes</a></li>
                        <li class="menu-item"><a href="../BuyBikes/buybikes.php">Buy Bikes</a></li>
                        <li class="menu-item"><a href="../SellBikes/sellbikes.php">Sell Bikes</a></li>
                    </ol>
                </li>
                <li class="menu-item"><a href="..\logout.php">Log Out</a></li>
                <!-- <li class="menu-item"><a href="#section-footer">Contact</a></li> -->
                <!-- <li class="menu-item"><a href="../SignIn/SignIn.php">Sign In</a></li> -->
            </ol>
        </nav>
    </header>

    <div class="container ">
        <div class="text">
            Enter Your Car Details
        </div>
        <form action="sellcars.php" method="post" enctype="multipart/form-data">

            <!--Section1-->
            <div class="section" id="section1">
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="owner_name" id="owner_name" required>
                        <div class="underline"></div>
                        <label for="">Owner's Name</label>
                    </div>
                    <div class="input-data">
                        <input type="tel" name="phone" id="phone" required>
                        <div class="underline"></div>
                        <label for="">Phone</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data" >
                        <input type="text" name="brand" id="brand" required>
                        <div class="underline"></div>
                        <label for="">Brand</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="model" id="model" required>
                        <div class="underline"></div>
                        <label for="">Model</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="year" id="year" required>
                        <div class="underline"></div>
                        <label for="">Year</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="RTO" id="RTO" required>
                        <div class="underline"></div>
                        <label for="">RTO</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data">
                        <label for="">Fuel Type</label>
                        <br/>
                        <select id="fuel" name="fuel" required>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                        <div class="underline"></div>
                    </div>
                    <div class="input-data">
                        <input type="number" name="kms" id="kms" required>
                        <div class="underline"></div>
                        <label for="">kms Driven</label>
                    </div>
                </div>

                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="button" id="nextSection1" onclick="validateSection1()" value="Next">
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="section" id="section2" style="display: none;">

                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="Ownership" id="Ownership" required>
                        <div class="underline"></div>
                        <label for="">Ownership</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="Engine" id="Engine" required>
                        <div class="underline"></div>
                        <label for="">Engine</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-data">
                        <label for="Transmission">Transmission</label>
                        <br/>
                        <select id="Transmission" name="Transmission" required>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                        <div class="underline"></div>
                    </div>
                    <div class="input-data">
                        <input type="text" name="Mileage" id="Mileage" required>
                        <div class="underline"></div>
                        <label for="">Mileage</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-data">
                        <input type="text" name="wheel" id="wheel" required>
                        <div class="underline"></div>
                        <label for="">Wheel Size</label>
                    </div>
                    <div class="input-data">
                        <input type="text" name="seats" id="seats" required>
                        <div class="underline"></div>
                        <label for="">Seats</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-data " id="img">
                        Upload Your Car Image
                        <input class="img" type="file" onchange="readURL(this)" accept="Image/*" name="img_url" id="img_url" required>
                        <br />
                        <br />
                    </div>
                    <div class="input-data">
                        <input type="number" name="price" id="price" required>
                        <div class="underline"></div>
                        <label for="">Excpected Price</label>
                    </div>
                </div>

                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="button" id="prevSection2" onclick="goToPreviousSection()" value="Previous">
                        </div>
                    </div>
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </div>

            </div>
        </form>
    </div>

    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName("section");
                for (var i = 0; i < sections.length; i++) {
                    sections[i].style.display = "none";
                }
                document.getElementById(sectionId).style.display = "block";
            }

            function validateSection1() {
                var ownerName = document.getElementById("owner_name").value;
                var phone = document.getElementById("phone").value;
                var brand = document.getElementById("brand").value;
                var model = document.getElementById("model").value;
                var year = document.getElementById("year").value;
                var RTO = document.getElementById("RTO").value;
                var fuel = document.getElementById("fuel").value;
                var kms = document.getElementById("kms").value;

                if (
                    ownerName === "" || phone === "" || brand === "" ||
                    model === "" || year === "" || RTO === "" ||
                    fuel === "" || kms === ""
                ) {
                    alert("Please fill in all fields");
                } else {
                    showSection("section2");
                }
            }
            function goToPreviousSection() {
                showSection("section1");
            }


        <?php if(isset($_SESSION['success']) && $_SESSION['success'] === true): ?>
            alert('Thanks for sharing your details. We will contact you soon');
            window.location.href = '../PostLogin/postlogin.php'; 
        <?php elseif(isset($_SESSION['success']) && $_SESSION['success'] === false): ?>
            alert('Something went wrong');
            window.location.href = '#'; 
        <?php endif; ?>

        <?php unset($_SESSION['success']); ?>
    </script>

</body>
</html>
