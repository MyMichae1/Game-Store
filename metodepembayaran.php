<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['game']) && isset($_GET['price'])) {
    $game_name = $_GET['game'];
    $game_price = $_GET['price'];

    if (is_numeric($game_price)) {
        $_SESSION['game_name'] = $game_name;
        $_SESSION['game_price'] = (int)$game_price;
        $_SESSION['admin_fee'] = 0;

        unset($_SESSION['membership_name']);
        unset($_SESSION['membership_price']);
    } else {
        echo "<script>alert('Harga game tidak valid.'); window.location.href='index.php';</script>";
        exit();
    }
} elseif (isset($_GET['membership']) && isset($_GET['price'])) {
    $membership_name = $_GET['membership'];
    $membership_price = $_GET['price'];

    if (is_numeric($membership_price)) {
        $_SESSION['membership_name'] = $membership_name;
        $_SESSION['membership_price'] = (int)$membership_price;
        $_SESSION['admin_fee'] = 0;

        unset($_SESSION['game_name']);
        unset($_SESSION['game_price']);
    } else {
        echo "<script>alert('Harga membership tidak valid.'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Data pembelian tidak ditemukan. Silakan pilih game atau membership.'); window.location.href='index.php';</script>";
    exit();
}

$form_action = isset($_SESSION['game_name']) ? 'strukpembayaran.php' : (isset($_SESSION['membership_name']) ? 'strukpembayaran.php' : '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | Game Store</title>
    <link rel="stylesheet" href="s/a.css">
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
                    <li><a href="logout5.php">Logout</a></li>
                </div>
            </div>

            <div class="notification">
                <div class="notification-box">
                    <i class='bx bxs-check-circle'></i>
                    <p>Congratulation, Your game download successfully</p>
                </div>
                <div class="notification-box box-color">
                    <i class='bx bxs-x-circle'></i>
                    <p>Could not apply changes.</p>
                </div>
            </div>
        </div>
    </header>

    <section class="new container" id="new">
        <div class="heading">
            <div class="heading">
                <i class='bx bxs-wallet'></i>
                <h2>Metode Pembayaran</h2>
            </div>
        </div>
        <div class="hero-section">
            <div class="content">
                <p>Discover Games You Will Love</p>
                <h1>Read About New Games That You Enjoy</h1>
                <button>Start Exploring</button>
            </div>
        </div>

        <section id="metode-pembayaran">
            <div class="container">
                <form action="<?php echo $form_action; ?>" method="GET">
                    <div class="row">
                        <div class="column">
                            <h3 class="title">Informasi Pembeli</h3>
                            <div class="input-box">
                                <span>Full Name :</span>
                                <input type="text" name="full_name" placeholder="Michael Sam" required>
                            </div>
                            <div class="input-box">
                                <span>Email :</span>
                                <input type="email" name="email" placeholder="example@example.com" required>
                            </div>
                            <div class="input-box">
                                <span>Address :</span>
                                <input type="text" name="address" placeholder="Jl. Dr. O. Notohamidjojo No.1 - 10, Blotongan, Kec. Sidorejo, Kota Salatiga," required>
                            </div>
                            <div class="input-box">
                                <span>City :</span>
                                <input type="text" name="city" placeholder="Salatiga" required>
                            </div>

                            <div class="flex">
                                <div class="input-box">
                                    <span>State :</span>
                                    <input type="text" name="state" placeholder="Indonesia" required>
                                </div>
                                <div class="input-box">
                                    <span>Zip Code :</span>
                                    <input type="number" name="zip_code" placeholder="0857-7821-7532" required>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <h3 class="title">Payment</h3>
                            <div class="input-box">
                                <span>Cards Accepted :</span>
                                <img src="img/imgcards.png" alt="">
                            </div>
                            <div class="input-box">
                                <span>Name On Card :</span>
                                <input type="text" name="card_name" placeholder="Mr. Michael Sam" required>
                            </div>
                            <div class="input-box">
                                <span>Credit Card Number :</span>
                                <input type="number" name="card_number" placeholder="1111 2222 3333 4444" required>
                            </div>
                            <div class="input-box">
                                <span>Exp. Month :</span>
                                <input type="text" name="exp_month" placeholder="Desember" required>
                            </div>

                            <div class="flex">
                                <div class="input-box">
                                    <span>Exp. Year :</span>
                                    <input type="number" name="exp_year" placeholder="2025" required>
                                </div>
                                <div class="input-box">
                                    <span>CVV :</span>
                                    <input type="number" name="cvv" placeholder="123" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </section>
    </section>

    <script src="m/main5.js"></script>
</body>

</html>