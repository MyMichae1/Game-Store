<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>download Page</title>
    <link rel="shortcut" href="img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="s/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="s/swiper-bundle.min.css">
</head>

<body>
    <div class="progress">
        <div class="progress-bar" id="scroll-bar"></div>
    </div>

    <header>
        <div class="nav container">
            <a href="index.php" class="logo">Game<span>Store</span></a>
            <div class="nav-icons">
                <i class='bx bx-bell bx-tada' id="bell-icon"></i>
                <i class='bx bxs-search'></i>
                <div class="menu-icon">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>

            <div class="menu">
                <img src="img/menu.png" alt="">
                <div class="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="trending.php">Trending</a></li>
                    <li><a href="newgame.php">New Game</a></l>
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="membership.php">Membership</a></li>
                    <li><a href="daftargame.php">Daftar Game</a></li>
                    <li><a href="metodepembayaran.php">Metode Pembayaran</a></li>
                    <li><a href="strukpembayaran.php">Struk Pembayaran</a></li>
                    <li><a href="riwayattransaksi.php">Riwayat Transaksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </div>
            </div>

            <div class="notification">
                <div class="notification-box">
                    <i class='bx bxs-check-circle'></i>
                    <p>Congratulation, Your game download successfully.</p>
                </div>
                <div class="notification-box box-color">
                    <i class='bx bxs-x-circle'></i>
                    <p>Could not apply changes.</p>
                </div>
            </div>

        </div>
    </header>

    <div class="video-container container">
        <video src="download-files/Subway Surfers Official.mp4" muted autoplay></video>
    </div>

    <div class="about container">
        <h2>Abount Game</h2>
        <p>There are plenty of exmples of this kind of game on mobile devices, being some Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>


    <div class="screenshots container">
        <h2>screenShots</h2>
        <div class="screenshots-content">
            <img src="img/screenshots1.jpg" alt="">
            <img src="img/screenshots2.jpg" alt="">
            <img src="img/screenshots3.jpg" alt="">
        </div>
    </div>


    <div class="download">
        <h2>Download Links</h2>
        <div class="download-link">
            <a href="download-files/Subway Surface.apk" download="">For Android</a>
            <a href="#">For Ios</a>
            <a href="#">For Windows</a>
        </div>
    </div>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&#169;MichDev All Right Reserveds</p>
    </div>




    <script src="m/swiper-bundle.min.js"></script>
    <script src="m/main6.js"></script>
</body>

</html>