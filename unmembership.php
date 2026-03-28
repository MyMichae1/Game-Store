<?php
session_start();
include 'koneksiakun.php';

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];

    $stmt = $conn_user->prepare("SELECT membership FROM informasi_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($is_member);
    $stmt->fetch();
    $stmt->close();

    if ($is_member == 1) {
        header("Location: membership.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn_user->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership | Game Store</title>
    <link rel="stylesheet" href="s/membership.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

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
        </div>

        <div class="menu">
            <img src="img/menu.png" alt="">
            <div class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="trending.php">Trending</a></li>
                <li><a href="newgame.php">New Game</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="unmembership.php">Membership</a></li>
                <li><a href="daftargame.php">Daftar Game</a></li>
                <li><a href="metodepembayaran.php">Metode Pembayaran</a></li>
                <li><a href="strukpembayaran.php">Struk Pembayaran</a></li>
                <li><a href="riwayattransaksi.php">Riwayat Transaksi</a></li>
                <li><a href="logout3.php">Logout</a></li>
            </div>
        </div>
    </header>

    <section class="membership container" id="membership">
        <h2 class="heading">
            <i class="bx bx-diamond"></i>
            Membership Package.
        </h2>
        <div class="pricing-table">
            <div class="pricing-card">
                <h2>Starter</h2>
                <p>Basic Membership</p>
                <div class="price">
                    Rp.100 .000<sup>99</sup>
                    <span>Setahun</span>
                </div>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Akses Game Dasar</li>
                    <li><i class="fas fa-check-circle"></i> Konsultasi Pengaturan Akun</li>
                    <li><i class="fas fa-check-circle"></i> Kursus Online Gaming</li>
                    <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                    <li><i class="fas fa-check-circle"></i> 2 Hari/Minggu</li>
                </ul>
                <a href="metodepembayaran.php?membership=Starter&price=100000" style="text-decoration: none; color: inherit;" class="btn">BERGABUNG SEKARANG</a>
                <p class="trial">Gratis Uji Coba 7 Hari</p>
            </div>
            <div class="pricing-card">
                <div class="popular">POPULAR</div>
                <h2>Premium</h2>
                <p>Master Membership</p>
                <div class="price">
                    Rp.2.399.000<sup>99</sup>
                    <span>Setahun</span>
                </div>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Akses Game Eksklusif</li>
                    <li><i class="fas fa-check-circle"></i> Konsultasi Strategi Gaming</li>
                    <li><i class="fas fa-check-circle"></i> Kursus Online Gaming Profesional</li>
                    <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                    <li><i class="fas fa-check-circle"></i> 4 Hari/Minggu</li>
                </ul>
                <a href="metodepembayaran.php?membership=Premium&price=2399000" style="text-decoration: none; color: inherit;" class="btn">BERGABUNG SEKARANG</a>
                <p class="trial">Gratis Uji Coba 7 Hari</p>
            </div>
            <div class="pricing-card">
                <h2>VVIP</h2>
                <p>VVIP Membership</p>
                <div class="price">
                    Rp.2.999.000<sup>99</sup>
                    <span>Setahun</span>
                </div>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Akses Semua Game Premium</li>
                    <li><i class="fas fa-check-circle"></i> Konsultasi Gaming Profesional</li>
                    <li><i class="fas fa-check-circle"></i> Kursus Online Gaming Lanjutan</li>
                    <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                    <li><i class="fas fa-check-circle"></i> 7 Hari/Minggu</li>
                </ul>
                <a href="metodepembayaran.php?membership=VVIP&price=2999000" style="text-decoration: none; color: inherit;" class="btn">BERGABUNG SEKARANG</a>
                <p class="trial">Gratis Uji Coba 7 Hari</p>
            </div>
        </div>

        <h2 class="heading">
            <i class='bx bx-user-circle'></i>
            Membership Benefits
        </h2>
        <div class="membership-content">
            <div class="membership-box">
                <img src="img/dis.jpg" alt="Gambar Icon" style="max-width: 1070px; margin-right: 100px;">
                <div class="membership-text">
                    <h3> Ayo Bergabung dan Rasakan Pengalaman Gaming Terbaik! </h3>
                    <p>- Akses Premium: Mainkan game favorit Anda tanpa batas.</p>
                    <p>- Konten Eksklusif: Dapatkan karakter, item, dan fitur yang tidak tersedia untuk pengguna reguler.</p>
                    <p>- Promo & Diskon Khusus: Hemat lebih banyak dengan penawaran spesial hanya untuk pelanggan setia.</p>
                    <p>- Komunitas Aktif: Terhubung dengan gamer lain dan tingkatkan level permainan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&

            <script src="m/swiper-bundle.min.js"></script>
            <script src="m/mainmember.js"></script>
            <script src="m/scriptmember.js"></script>
</body>

</html>