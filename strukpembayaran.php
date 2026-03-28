<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$nomor_transaksi = uniqid('TRX-');

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran | Game Store</title>
    <link rel="stylesheet" href="s/pembayaran.css">
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
                    <li><a href="logout6.php">Logout</a></li>
                </div>
            </div>
        </div>
    </header>

    <section id="struk-pembayaran">
        <div class="container">
            <h2>Struk Pembayaran</h2>
            <p>Berikut adalah detail pembayaran Anda:</p>

            <div class="struk-container">
                <div class="struk-header">
                    <h3>Game Store</h3>
                    <p>Jl. Contoh Alamat, Kota XYZ</p>
                    <p>No. Transaksi: <?php echo htmlspecialchars($nomor_transaksi); ?></p>
                </div>

                <div class="struk-items">
                    <?php
                    $total_harga = 0;
                    $biaya_admin = 0;

                    if (isset($_SESSION['membership_name'])) {
                        $total_harga += $_SESSION['membership_price'];
                    ?>
                        <div class="item">
                            <p id="membership-name"><?php echo htmlspecialchars($_SESSION['membership_name']); ?></p>
                            <p class="item-price" id="membership-price">Rp <?php echo number_format($_SESSION['membership_price'], 0, ',', '.'); ?></p>
                        </div>
                        <div class="item">
                            <p>Diskon </p>
                            <p class="item-price">-Rp 0</p>
                        </div>
                        <div class="item">
                            <p>Biaya Admin</p>
                            <p class="item-price">Rp 0</p>
                        </div>
                    <?php
                    } elseif (isset($_SESSION['game_name'])) {
                        $total_harga += $_SESSION['game_price'];
                        $biaya_admin += 5000;
                    ?>
                        <div class="item">
                            <p id="game-name"><?php echo htmlspecialchars($_SESSION['game_name']); ?></p>
                            <p class="item-price" id="game-price">Rp <?php echo number_format($_SESSION['game_price'], 0, ',', '.'); ?></p>
                        </div>
                        <div class="item">
                            <p>Diskon</p>
                            <p class="item-price">-Rp 0</p>
                        </div>
                        <div class="item">
                            <p>Biaya Admin</p>
                            <p class="item-price">Rp <?php echo number_format($biaya_admin, 0, ',', '.'); ?></p>
                        </div>
                    <?php
                    } else {
                        echo "<p>Tidak ada pembelian yang ditemukan.</p>";
                    }

                    $total_pembayaran = $total_harga + $biaya_admin;
                    ?>
                </div>

                <div class="struk-total">
                    <div class="total-item">
                        <p>Total Pembayaran</p>
                        <p class="total-price" id="total-price">Rp <?php echo number_format($total_pembayaran, 0, ',', '.'); ?></p>
                    </div>
                </div>

                <div class="struk-footer">
                    <p>Terima kasih telah berbelanja di Game Store</p>
                    <p>Harap simpan struk ini untuk referensi.</p>
                    <button id="download-btn" onclick="window.print();">Cetak Struk</button>

                    <form id="save-form" action="simpan_struk.php" method="POST" style="display:inline;">
                        <input type="hidden" name="nomor_transaksi" value="<?php echo $nomor_transaksi; ?>">
                        <input type="hidden" name="pembelian" value='<?php echo json_encode([
                                                                            'nama_game' => isset($_SESSION['game_name']) ? $_SESSION['game_name'] : null,
                                                                            'harga_game' => isset($_SESSION['game_price']) ? $_SESSION['game_price'] : null,
                                                                            'nama_membership' => isset($_SESSION['membership_name']) ? $_SESSION['membership_name'] : null,
                                                                            'harga_membership' => isset($_SESSION['membership_price']) ? $_SESSION['membership_price'] : null,
                                                                            'diskon' => 0,
                                                                            'biaya_admin_game' => $biaya_admin,
                                                                            'biaya_admin_membership' => 0
                                                                        ]); ?>'>
                        <input type="hidden" name="total_pembelian" value="<?php echo $total_pembayaran; ?>">
                        <button type="submit" id="download-btn">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="m/main4.js"></script>

    <?php


    if ($status === 'sukses') {
        echo "<script>alert('Transaksi berhasil disimpan!'); setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
    } elseif ($status === 'gagal') {
        echo "<script>alert('Gagal menyimpan transaksi. Silakan coba lagi.'); setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
    }

    ?>
</body>

</html>