<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR BOOKING WEBSITE</title>
    <link rel="stylesheet" href="postlogin.css">

</head>

<body>
    <nav class="menu slideRight-animation" role='navigation'>
        <div class="logo">
            <a href="postlogin.php">Auto Z</a>
        </div>
        <ol>
            <li class="menu-item"><a href="postlogin.php">Home</a></li>
            <li class="menu-item"><a href="#section-footer">About</a></li>
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
                    <li class="menu-item"><a href="../BuyBikes/buybikes.php">Buy Bikes</a></li>
                    <li class="menu-item"><a href="../SellBikes/sellbikes.php">Sell Bikes</a></li>
                </ol>
            </li>
            <li class="menu-item"><a href="#section-footer">Contact</a></li>
            <li class="menu-item"><a href="..\logout.php">Log Out</a></li>
        </ol>
    </nav>
    <section class="home slideUp-animation">
        <div class="home-contents">
            <h2 id="T1">FIND THE RIGHT </h2>
            <h2 id="T2">VEHICLE FOR YOU...</h2>
            
            <img src="AutoZ.png"/>
        </div>
    </section>
    <section id="section-footer">
        <footer>
            <div class="Info">
                <div class="aboutus">
                    <h3>About Us</h3>
                    Discover the best place to buy and sell used cars and bikes.
                    Our intuitive platform offers a seamless experience for finding your
                    perfect vehicle or selling your current one. Browse our extensive inventory,
                    connect with sellers, and enjoy a safe and hassle-free transaction process.
                    Join our vibrant community of automotive enthusiasts today and embark on your next
                    adventure with us.
                </div>
                <div class="contact">
                    <h3>Contact Us</h3>
                    <div> <p>Emial :</p> autozhelp@gmail.com </div>
                    <div><p>Phone :</p> +91 7829946725</div>
                    <div ><p>Address : </p> BMS College Of Engineering, Bull Temple Road basvanagudi, bangalore</div>
                    <div id="BackTop">
                        <a href="#">Top</a>
                    </div>
                </div>

            </div>
        </footer>
    </section>
</body>

</html>