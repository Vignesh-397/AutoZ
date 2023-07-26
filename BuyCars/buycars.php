<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buycars.css">
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
                        <li class="menu-item"><a href="#">Buy Cars</a></li>
                        <li class="menu-item"><a href="../SellCars/sellcars.php">Sell Cars</a></li>
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
<?php
$con = mysqli_connect("localhost","root","","autoz");

$sqlget="SELECT * from sold_cars";

$sqldata=mysqli_query($con,$sqlget) or die('error getting');

echo '<div class="container">';
    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        $sqlcheck = "SELECT cid from booked_cars where cid = $row[cid]";
        $checkResult = mysqli_query($con, $sqlcheck);

        if(mysqli_num_rows($checkResult) > 0){
            echo '<div class="box-booked">';
            echo'<div class="box-booked-img">';
            echo '<img src="/WebP/SellCars/' . $row['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$row[brand]</h2>";
                echo  "<h2>$row[model]</h2>";
                echo "<h2>Year: $row[year]</h2>";
                echo "<h2>Price: $row[price]";
                echo '<a  href="#" class="btn" onclick="showBookedPopUp()">Booked</a>';
                
            echo'</div>';
        }else{
            echo '<div class="box">';
            echo'<div class="box-img">';
            echo '<img src="/WebP/SellCars/' . $row['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$row[brand]</h2>";
                echo  "<h2>$row[model]</h2>";
                echo "<h2>Year: $row[year]</h2>";
                echo "<h2>Price: $row[price]";
                echo "<a onclick='buyClickHandler(\"$row[cid]\")' class='btn' href='BuyForm/buyfrom.php?param=\"$row[cid]\"'>Buy Now</a>";
            echo'</div>';
        }
    }
echo '</div>';
?>

<script>
        function showBookedPopUp() {
            alert("Sorry... This Car is already Booked!!!");
            window.location.href = '#';
        }
</script>
</body>
</html>
