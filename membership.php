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
    <title>Membership | Game Store</title>
    <link rel="stylesheet" href="s/membership.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header></header>


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
                <li><a href="newgame.php">New Game</a></l>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="membership.php">Membership</a></li>
                <li><a href="daftargame.php">Daftar Game</a></li>
                <li><a href="metodepembayaran.php">Metode Pembayaran</a></li>
                <li><a href="strukpembayaran.php">Struk Pembayaran</a></li>
                <li><a href="riwayattransaksi.php">Riwayat Transaksi</a></li>
                <li><a href="logout7.php">Logout</a></li>
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



    <!-- <section class="membership container" id="membership">
    <h2 class="heading">
        <i class="bx bx-diamond"></i>
        Membership Package.
    </h2>
    <div class="pricing-table">
        <div class="pricing-card">
            <h2>Starter</h2>
            <p>Basic Membership</p>
            <div class="price">
                Rp.100.000<sup>99</sup>
                <span>Setahun</span>
            </div>
            <ul>
                <li><i class="fas fa-check-circle"></i> Akses Game Dasar</li>
                <li><i class="fas fa-check-circle"></i> Konsultasi Pengaturan Akun</li>
                <li><i class="fas fa-check-circle"></i> Kursus Online Gaming</li>
                <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                <li><i class="fas fa-check-circle"></i> 2 Hari/Minggu</li>
            </ul>
            <a href="#" class="btn">BERGABUNG SEKARANG</a>
            <p class="trial">Gratis Uji Coba 7 Hari</p>
        </div>
        <div class="pricing-card">
            <div class="popular">POPULAR</div>
            <h2>Premium</h2>
            <p>Master Membership</p>
            <div class="price">
                Rp2.399.000<sup>99</sup>
                <span>Setahun</span>
            </div>
            <ul>
                <li><i class="fas fa-check-circle"></i> Akses Game Eksklusif</li>
                <li><i class="fas fa-check-circle"></i> Konsultasi Strategi Gaming</li>
                <li><i class="fas fa-check-circle"></i> Kursus Online Gaming Profesional</li>
                <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                <li><i class="fas fa-check-circle"></i> 4 Hari/Minggu</li>
            </ul>
            <a href="#" class="btn">BERGABUNG SEKARANG</a>
            <p class="trial">Gratis Uji Coba 7 Hari</p>
        </div>
        <div class="pricing-card">
            <h2>VVIP</h2>
            <p>VVIP Membership</p>
            <div class="price">
                Rp2.999.000<sup>99</sup>
                <span>Setahun</span>
            </div>
            <ul>
                <li><i class="fas fa-check-circle"></i> Akses Semua Game Premium</li>
                <li><i class="fas fa-check-circle"></i> Konsultasi Gaming Profesional</li>
                <li><i class="fas fa-check-circle"></i> Kursus Online Gaming Lanjutan</li>
                <li><i class="fas fa-check-circle"></i> 2 Jam Bermain/Hari</li>
                <li><i class="fas fa-check-circle"></i> 7 Hari/Minggu</li>
            </ul>
            <a href="#" class="btn">BERGABUNG SEKARANG</a>
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
                <pre>
                <h3> Ayo Bergabung dan Rasakan Pengalaman Gaming Terbaik! </h3></pre>
                <pre>- Akses Premium: Mainkan game favorit Anda tanpa batas.</pre>
                <pre>- Konten Eksklusif: Dapatkan karakter, item, dan fitur yang tidak tersedia untuk pengguna reguler.</pre>
                <pre>- Promo & Diskon Khusus: Hemat lebih banyak dengan penawaran spesial hanya untuk pelanggan setia.</pre>
                <pre>- Komunitas Aktif: Terhubung dengan gamer lain dan tingkatkan level permainan Anda.</pre>
                <pre>
            </div>
        </div>
        <div class="new-contant">
            <div class="box">
                <img src="https://i.pinimg.com/originals/e6/a2/6f/e6a26ff803c9f2504a69b15a6190335b.gif">
                <div class="box-text">
                    </div>
                </div>
            </div>
</section> -->


    <section id="membership">
        <div class="container">
            <h2 class="heading">
                <i class="bx bx-gift"></i>
                Membership Features
            </h2>

            <div class="new-contant">
                <div class="box">
                    <img src="img/new1.jpg" alt="Subway Surfers">
                    <div class="box-text">
                        <h2>Subway Surfers</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <a href="#" class="bx bxs-star"></a>
                                <span>Rp.180.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                            <!-- <a href="download.html" class="box-btn">
                            <i class="bx bx-down-arrow-alt"></i>
                        </a> -->
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="img/new7.png" alt="Angry Birds">
                    <div class="box-text">
                        <h2>Angry Birds</h2>
                        <h3>Casual</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <a href="#" class="bx bxs-star"></a>
                                <span>Rp.200.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="img/new8a.jpg" alt="Clash Royale">
                    <div class="box-text">
                        <h2>Clash Royale</h2>
                        <h3>Strategy</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <span>Rp.170.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="img/new9.jpeg" alt="Subway Surfers">
                    <div class="box-text">
                        <h2>Free Fire</h2>
                        <h3>Action</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <span>Rp.110.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="img/new10.png" alt="Angry Birds">
                    <div class="box-text">
                        <h2>Downhill Dominator</h2>
                        <h3>Casual</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <a href="#" class="bx bxs-star"></a>
                                <span>Rp.140.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <img src="img/new10.jpeg" alt="Clash Royale">
                    <div class="box-text">
                        <h2>ARK</h2>
                        <h3>Strategy</h3>
                        <div class="rating-download">
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <span>Rp.150.00,-</span>
                            </div>
                            <div class="rating">
                                <a href="#" class="bx bxs-cart"></a>
                                <span>BERLANGGANAN</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright container">
        <a href="#" class="logo">Game<span>Store</span></a>
        <p>&#169; MichDev All Right Reserved</p>
    </div>

    <script src="m/swiper-bundle.min.js"></script>
    <script src="m/mainmember.js"></script>
    <script src="m/scriptmember.js"></script>
</body>

</html>