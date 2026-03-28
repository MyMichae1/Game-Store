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
    <title>Game Store</title>
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
                    <li><a href="unmembership.php">Membership</a></li>
                    <li><a href="daftargame.php">Daftar Game</a></li>
                    <li><a href="metodepembayaran.php">Metode Pembayaran</a></li>
                    <li><a href="strukpembayaran.php">Struk Pembayaran</a></li>
                    <li><a href="riwayattransaksi.php">Riwayat Transaksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
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

    <section class="home container" id="home">
        <img src="img/home.png" alt="">
        <div class="home-text">
            <h1>CITY OF THE <br> FUTURE</h1>
            <a href="https://www.cyberpunk.net/us/en/" class="btn">Available Now</a>
        </div>
    </section>


    <section class="trending container" id="trending">
        <div class="heading">
            <i class='bx bxs-flame'></i>
            <h2>Trending Game</h2>
        </div>

        <div class="trending-content swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending1.webp" alt="">
                        <div class="box-text">
                            <h2>Cyberpunk 2077</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Cyberpunk%202077&price=150000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.150.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending2.jpg" alt="">
                        <div class="box-text">
                            <h2>Battlefilled 2042</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Battlefilled%202042&price=180000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.180.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending4.jpg" alt="">
                        <div class="box-text">
                            <h2>Ghost of Tsushima</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Ghost%20of%20Tsushima&price=250000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.250.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending5.png" alt="">
                        <div class="box-text">
                            <h2>GTA V</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=GTA%20V&price=300000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.300.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending6.jpg" alt="">
                        <div class="box-text">
                            <h2>Dying Light 2</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Dying%20Light%202&price=400000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.400.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending7.png" alt="">
                        <div class="box-text">
                            <h2>Halo Infinite</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Halo%20Infinite&price=500000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.500.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending8.png" alt="">
                        <div class="box-text">
                            <h2>Resident Evil Village</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <a href="metodepembayaran.php?game=Resident%20Evil%20Village&price=300000" style="text-decoration: none; color: inherit;">
                                        <span>4.7 | Rp.300.000,-</span>
                                    </a>
                                </div>
                                <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="new container" id="new">
        <div class="heading">
            <i class='bx bx-game'></i>
            <h2>New Game</h2>
        </div>

        <div class="new-contant">
            <div class="box">
                <img src="img/new1.jpg" alt="">
                <div class="box-text">
                    <h2>Subway Surfers</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Subway%20Surfers&price=150000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.150.000,-</span>
                            </a>
                        </div>
                        <a href="download.php" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/new2.jpg" alt="">
                <div class="box-text">
                    <h2>Call of Duty: Mobile</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Call%20of%20Duty:%20Mobile&price=160000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.160.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/new3.jpg" alt="">
                <div class="box-text">
                    <h2>Free Guy</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Free%20Guy&price=170000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.170.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/new4.jpg" alt="">
                <div class="box-text">
                    <h2>Clash Royale</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Clash%20Royale&price=180000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.180.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>


            <div class="box">
                <img src="img/new5.png" alt="">
                <div class="box-text">
                    <h2>Minecraf</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Minecraft&price=180000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.180.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/new6.png" alt="">
                <div class="box-text">
                    <h2>PUBG</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=PUBG&price=190000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.190.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/2d1038da-032c-48a5-9403-e0c241973846.jpg" alt="">
                <div class="box-text">
                    <h2>Fortnite</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Fortnite&price=200000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.200.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/new8 (1).jpg" alt="">
                <div class="box-text">
                    <h2>Marvel of Champions</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Marvel%20of%20Champion&price=210000" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.210.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="next-page">
            <a href="#">Next Page</a>
        </div>
    </section>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&#169;MichDev All Right Reserved</p>
    </div>
    <script src="m/swiper-bundle.min.js"></script>
    <script src="m/main1.js"></script>
</body>

</html>