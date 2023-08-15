<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buybikes.css">
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
                        <li class="menu-item"><a href="../SellCars/sellcars.php">Sell Cars</a></li>
                    </ol>
                </li>
                <li class="menu-item" aria-haspopup="true">
                    <a href="#0">Bikes</a>
                    <ol class="sub-menu" aria-label="submenu">
                        <li class="menu-item"><a href="#0">Popular Bikes</a></li>
                        <li class="menu-item"><a href="#">Buy Bikes</a></li>
                        <li class="menu-item"><a href="../SellBikes/sellbikes.php">Sell Bikes</a></li>
                    </ol>
                </li>
                <li class="menu-item"><a href="..\logout.php">Log Out</a></li>
                <!-- <li class="menu-item"><a href="#section-footer">Contact</a></li> -->
                <!-- <li class="menu-item"><a href="../SignIn/SignIn.php">Sign In</a></li> -->
            </ol>
        </nav>
    </header>
    <?php
$con = mysqli_connect("localhost","root","","autoz");

$sqlget="SELECT * from sold_bikes";

$sqldata=mysqli_query($con,$sqlget) or die('error getting');

echo '<div class="container">';
    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        $sqlcheck = "SELECT bid from booked_bikes where bid = $row[bid]";
        $checkResult = mysqli_query($con, $sqlcheck);

        $bikeId = $row['bid'];

        if(mysqli_num_rows($checkResult) > 0){
            echo '<div class="box-booked">';
            echo'<div class="box-booked-img">';
            echo '<img src="/WebP/SellBikes/' . $row['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$row[brand]</h2>";
                echo  "<h2>$row[model]</h2>";
                echo "<h2>Year: $row[reg_year]</h2>";
                echo "<h2>Price: $row[price]/-";
                echo '<a  href="#" class="btn" onclick="showBookedPopUp()">Booked</a>';
            echo'</div>';
            
        }else{
            echo '<div class="box">';
            echo'<div class="box-img">';
            echo '<img src="/WebP/SellBikes/' . $row['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$row[brand]</h2>";
                echo  "<h2>$row[model]</h2>";
                echo "<h2>Year: $row[reg_year]</h2>";
                echo "<h2>Price: $row[price]/-";
                echo '<br/>';
                echo '<br/>';

                //More Info Link
                echo '<a href="#' . $bikeId . '" class="more-info-link"><center>More Info</center></a>';
                //More Info
                echo '<div id="' . $bikeId . '" class="overlay">';
                    echo '<div class="popup">';
                        echo '<a class="close" href="#">&times;</a>';
                        echo "<h2>RTO:  $row[RTO] </h2>" ;    
                        echo "<h2>Fuel Type:   $row[fuel_type] </h2>";
                        echo "<h2>kms Driven:  $row[kms_driven]kms </h2>";
                        echo "<h2>Ownership:  $row[ownership] </h2>"; 
                        echo "<h2>Engine:  $row[engine] </h2>";   
                        echo "<h2>Transmission:  $row[transmission] </h2>" ;
                        echo "<h2>Mileage:  $row[mileage]kms </h2>" ;
                        echo "<h2>Wheel Size:  $row[wheel_size] </h2>"; 
                        echo "<h2>Seats:  $row[seats] </h2>" ;
                    echo '</div>';
                echo '</div>';

                echo "<a onclick='buyClickHandler(\"$row[bid]\")' class='btn' href='BuyForm/buyfrom.php?param=\"$row[bid]\"'>Buy Now</a>";
            echo'</div>';
        }
    }
echo '</div>';
?>

<script>
        function showBookedPopUp() {
            alert("Sorry... This Bike is already Booked!!!");
            window.location.href = '#';
        }
</script>
</body>
</html>
