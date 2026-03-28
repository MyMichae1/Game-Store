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
    <title>Daftar Game - Game Store</title>
    <link rel="shortcut" href="img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="s/atyle2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <li><a href="logout2.php">Logout</a></li>
                </div>
            </div>
        </div>
    </header>

    <section class="new container" id="new">
        <div class="heading">
            <i class='bx bx-game'></i>
            <h2>New Game</h2>
        </div>

        <div class="hero-section">
            <div class="content">
                <p>
                    Discover Games You Will Love
                </p>
                <h1>
                    Read About New Games That You Enjoy
                </h1>
                <button>
                    Start Exploring
                </button>
            </div>
        </div>
    </section>

    <section class="new container" id="new">

        <div class="content">
            <div class="new-contant">
                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/76c3297dd7c5b2f301cd440ea372e1ae-1024x576.jpg" alt="">
                    <div class="box-text">
                        <h2>Digimon: New Generation</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/gran-saga-blom-global-1024x576.jpg" alt="">
                    <div class="box-text">
                        <h2>Gran Saga</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/64fad2134db4fb09ca00b094f0c33904-1024x576.jpg" alt="">
                    <div class="box-text">
                        <h2>Devil May Cry: Peak of Combat</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://cdn.gamerwk.com/2022/12/Tos-M-Beta.jpg" alt="">
                    <div class="box-text">
                        <h2>Battlefilled 2042</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://cdn.gamerwk.com/2022/12/OPM-Justice-1024x683.jpg" alt="">
                    <div class="box-text">
                        <h2>One Punch Man Justice Is Served</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/72dd0d64910226a48d51c0316953e550-1024x576.jpg" alt="">
                    <div class="box-text">
                        <h2>Sword Art Online Black Swordsman: Ace</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://cdn.gamerwk.com/2022/12/Quantum-Maki.jpg" alt="">
                    <div class="box-text">
                        <h2>Quantum Maki</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://cdn.gamerwk.com/2022/12/ETE-Chronicle-1024x608.jpg" alt="">
                    <div class="box-text">
                        <h2>ETE Chronicle</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://cdn.gamerwk.com/2022/12/Archeland-1024x473.jpg" alt="">
                    <div class="box-text">
                        <h2>Archeland</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="https://dorangadget.com/wp-content/uploads/2024/01/Baldurs-Gate-3.jpg" alt="">
                    <div class="box-text">
                        <h2>Baldur’s Gate 3</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/Uma-Musume-blom-global.png" alt="">
                    <div class="box-text">
                        <h2>Uma Musume: Pretty Derby</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="https://gamerwk.sgp1.cdn.digitaloceanspaces.com/2021/12/blade-and-soul-scaled-1-1024x473.jpg" alt="">
                    <div class="box-text">
                        <h2>Blade & Soul 2</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-shopping-bag'></i>
                                <span>Free Order</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&#169; CarpoolVenom All Right Reserved</p>
    </div>

    <script src="m/main3.js"></script>
</body>

</html>