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
                    <li><a href="newgame.php">New Game</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="membership.php">Membership</a></li>
                    <li><a href="daftargame.php">Daftar Game</a></li>
                    <li><a href="metodepembayaran.php">Metode Pembayaran</a></li>
                    <li><a href="strukpembayaran.php">Struk Pembayaran</a></li>
                    <li><a href="riwayattransaksi.php">Riwayat Transaksi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </div>
            </div>
        </div>
    </header>

    <section class="new container" id="new">
        <div class="heading">
            <i class='bx bx-game'></i>
            <h2>Daftar Game</h2>
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
                            <a href="metodepembayaran.php?game=Subway%20Surfers&price=150000" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.150.000,-</span>
                            </a>
                        </div>
                        <a href="download.html" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/trending1.webp" alt="">
                <div class="box-text">
                    <h2>Cyberpunk 2077</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="metodepembayaran.php?game=Cyberpunk%202077&price=150000" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.150.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
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
                <img src="img/trending2.jpg" alt="">
                <div class="box-text">
                    <h2>Battlefield 2042</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="#" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.180.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/trending3.jpg" alt="">
                <div class="box-text">
                    <h2>Assassin's Creed</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="#" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.200.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/trending4.jpg" alt="">
                <div class="box-text">
                    <h2>Ghost of Tsushima</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="#" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.250.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/trending5.png" alt="">
                <div class="box-text">
                    <h2>GTA V</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="https://www.rockstargames.com/gta-v" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.300.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <div class="box">
                <img src="img/trending6.jpg" alt="">
                <div class="box-text">
                    <h2>Dying Light 2</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <a href="#" class="box-btn" style="text-decoration: none; color: inherit;">
                                <span>4.7 | Rp.400.000,-</span>
                            </a>
                        </div>
                        <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                    </div>
                </div>
            </div>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "untuk_admin";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM tambah_game");

            while ($row = $result->fetch_assoc()) {
                $game_name = htmlspecialchars($row['nama']);
                $game_genre = htmlspecialchars($row['genre']);
                $game_rating = htmlspecialchars($row['rating']);
                $game_price = htmlspecialchars($row['harga']);
                $game_image = htmlspecialchars($row['image']);
            ?>
                <div class="box">
                    <img src="<?php echo $game_image; ?>" alt="<?php echo $game_name; ?>">
                    <div class="box-text">
                        <h2><?php echo $game_name; ?></h2>
                        <h3><?php echo $game_genre; ?></h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <a href="metodepembayaran.php?game=<?php echo urlencode($game_name); ?>&price=<?php echo $game_price; ?>" class="box-btn" style="text-decoration: none; color: inherit;">
                                    <span><?php echo $game_rating; ?> | Rp.<?php echo number_format($game_price, 0, ',', '.'); ?>,-</span>
                                </a>
                            </div>
                            <a href="#" class="box-btn"><i class='bx bx-down-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            <?php
            }

            $conn->close();
            ?>
        </div>
    </section>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&#169; MichDev All Right Reserved</p>
    </div>

    <script src="m/main7.js"></script>
</body>

</html>