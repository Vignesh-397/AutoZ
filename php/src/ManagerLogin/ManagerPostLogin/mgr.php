<?php
session_start();

//To display manager details
if ( isset($_SESSION['mgr_name']) && isset($_SESSION['mgr_id'])) {
    $mgr_name = $_SESSION['mgr_name'];
    $mgr_id = $_SESSION['mgr_id'];
}else{
    header('Location: ../../index.php');
    exit();
}

echo '
<header>
    <nav class="menu slideRight-animation" role="navigation">
        <div class="mgr-portal">Manager Portal</div>
        <div class="menu-item"><a href="logout.php">Log Out</a></div>
    </nav>
    <div class="mgr-details">
    </div>
</header>
';

$servername = "db";
      $username = "root";
      $password = "autoz2023";
      $port = '3306';
      $dbname = "autoz";
        $con = new mysqli($servername, $username, $password, $dbname);

//Displaying Cars under reviews
$sqlget="SELECT * from sold_cars";

$sqldata=mysqli_query($con,$sqlget) or die('error getting');
echo '<div class="mgr-portal-text">Cars Under Review</div>';
echo '<div class="container">';
    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        $sqlcheck = "SELECT cid from booked_cars where cid = $row[cid]";
        $checkResult = mysqli_query($con, $sqlcheck);

        if(mysqli_num_rows($checkResult) > 0){
            echo '<div class="box">';
            echo'<div class="box-img">';
            echo '<img src="/SellCars/' . $row['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$row[brand]</h2>";
                echo  "<h2>$row[model]</h2>";
                echo "<h2>Year: $row[reg_year]</h2>";
                echo "<h2>Price: $row[price]";
                echo "<a onclick='buyClickHandlerCars(\"$row[cid]\")' class='btn' href='#?param=\"$row[cid]\"'>User Confirmed</a>";
                echo "<a onclick='cancelClickHandlerCars(\"$row[cid]\")' class='btn-cancel' href='#?param=\"$row[cid]\"'>User Cancelled</a>";
            echo'</div>';
        }
    }
echo '</div>';

echo '<div class="space"> </div>';

//Displaying bikes under reviews
$sqlgetbikes="SELECT * from sold_bikes";

$sqldatabikes=mysqli_query($con,$sqlgetbikes) or die('error getting');
echo '<div class="mgr-portal-text">Bikes Under Review</div>';
echo '<div class="container">';
    while($rowbikes = mysqli_fetch_array($sqldatabikes, MYSQLI_ASSOC)){
        $sqlcheckB = "SELECT bid from booked_bikes where bid = $rowbikes[bid]";
        $checkResultB = mysqli_query($con, $sqlcheckB);

        if(mysqli_num_rows($checkResultB) > 0){
            echo '<div class="box">';
            echo'<div class="box-img">';
            echo '<img src="/SellBikes/' . $rowbikes['img_url'] . '" alt="">';
            echo '</div>';
                echo  "<h2>$rowbikes[brand]</h2>";
                echo  "<h2>$rowbikes[model]</h2>";
                echo "<h2>Year: $rowbikes[reg_year]</h2>";
                echo "<h2>Price: $rowbikes[price]";
                echo "<a onclick='buyClickHandlerBikes(\"$rowbikes[bid]\")' class='btn' href='#?param=\"$rowbikes[bid]\"'>User Confirmed</a>";
                echo "<a onclick='cancelClickHandlerBikes(\"$rowbikes[bid]\")' class='btn-cancel' href='#?param=\"$rowbikes[bid]\"'>User Cancelled</a>";
            echo'</div>';
        }
    }
echo '</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mgr.css">
    <title>Manager Portal</title>
    <link rel="shortcut icon" href="../AutoZ.png" type="image/x-icon">
</head>
<body>

<script>

        
        //Accessing parameters through url
        const urlParams = new URLSearchParams(window.location.search);
        const mgr_id = urlParams.get('mgr_id');
        const mgr_name = urlParams.get('mgr_name');

        // Display mgr_id and mgr_name on the page
        const mgrDetailsDiv = document.querySelector('.mgr-details');
        mgrDetailsDiv.innerHTML = `
            <h3> Manager Id: ${mgr_id}</h3>
            <h3> Manager Name: ${mgr_name} </h3> 

        `;

        
    // Cars click handlers
    function cancelClickHandlerCars(cid) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cancel_cars.php', true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Successfully Cancelled!");
                } else {
                    alert("Deletion failed. Please try again later.");
                }
                location.reload();
            }
        };
        xhr.send('cid=' + encodeURIComponent(cid));
    }
    function buyClickHandlerCars(cid) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'buy_cars.php', true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Successfully Booked!");
                } else {
                    alert("Deletion failed. Please try again later.");
                }
                location.reload();
            }
        };
        xhr.send('cid=' + encodeURIComponent(cid));
    }


    //Bikes clickHandlers
    function cancelClickHandlerBikes(bid) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cancel_bikes.php', true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Successfully Cancelled!");
                } else {
                    alert("Deletion failed. Please try again later.");
                }
                
                location.reload();
            }
        };
        xhr.send('bid=' + encodeURIComponent(bid));
    }

    function buyClickHandlerBikes(bid) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'buy_bikes.php', true); 
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    alert("Successfully Booked!");
                } else {
                    alert("Deletion failed. Please try again later.");
                }   
                location.reload();
            }
        };
        xhr.send('bid=' + encodeURIComponent(bid));
    }
    <?php unset($_SESSION['mgr_logged_in']); ?>
</script>

</body>
</html>
