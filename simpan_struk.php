<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomor_transaksi = $_POST['nomor_transaksi'];
    $pembelian = $_POST['pembelian'];
    $total_pembelian = floatval($_POST['total_pembelian']);

    if (empty($nomor_transaksi) || empty($pembelian) || $total_pembelian <= 0) {
        echo "<script>
                alert('Data pembelian tidak valid. Pastikan semua data terisi dengan benar.');
                window.location.href = 'index.php';
              </script>";
        exit();
    }

    if (!isset($_SESSION['user_email']) && !isset($_SESSION['admin_email'])) {
        echo "<script>
                alert('Anda harus login terlebih dahulu.');
                window.location.href = 'login.php';
              </script>";
        exit();
    }

    $email = $_SESSION['user_email'] ?? $_SESSION['admin_email'];

    try {
        $sql = "INSERT INTO riwayat_transaksi (nomor_transaksi, pembelian, total_pembelian, tanggal, status_pembayaran) VALUES (:nomor_transaksi, :pembelian, :total_pembelian, NOW(), 'Pending')";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nomor_transaksi', $nomor_transaksi);
        $stmt->bindParam(':pembelian', $pembelian);
        $stmt->bindParam(':total_pembelian', $total_pembelian);

        if ($stmt->execute()) {
            $pembelian_data = json_decode($pembelian, true);

            $is_game = !empty($pembelian_data['nama_game']);
            $is_membership = !empty($pembelian_data['nama_membership']);

            $servername_admin = "localhost";
            $username_admin = "root";
            $password_admin = "";
            $dbname_admin = "untuk_admin";

            $conn_admin = new PDO("mysql:host=$servername_admin;dbname=$dbname_admin", $username_admin, $password_admin);
            $conn_admin->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($is_game) {
                $sql_game = "INSERT INTO transaksi_user (nomor_transaksi, nama_game, harga, total_harga, diskon) VALUES (:nomor_transaksi, :nama_game, :harga, :total_harga, :diskon)";
                $stmt_game = $conn_admin->prepare($sql_game);

                $stmt_game->bindParam(':nomor_transaksi', $nomor_transaksi);
                $stmt_game->bindParam(':nama_game', $pembelian_data['nama_game']);
                $stmt_game->bindParam(':harga', $pembelian_data['harga_game']);
                $stmt_game->bindParam(':total_harga', $total_pembelian);
                $stmt_game->bindParam(':diskon', $pembelian_data['diskon']);

                if ($stmt_game->execute()) {
                    header("Location: strukpembayaran.php?status=sukses&nomor_transaksi=$nomor_transaksi");
                    exit();
                } else {
                    header("Location: strukpembayaran.php?status=gagal");
                    exit();
                }
            }


            if ($is_membership) {
                $sql_update_user = "UPDATE informasi_user SET membership = 1 WHERE email = :email";
                $stmt_update_user = $conn->prepare($sql_update_user);
                $stmt_update_user->bindParam(':email', $email);

                if ($stmt_update_user->execute()) {
                    header("Location: strukpembayaran.php?status=sukses&nomor_transaksi=$nomor_transaksi");
                    exit();
                } else {
                    header("Location: strukpembayaran.php?status=gagal");
                    exit();
                }
            }

            $conn_admin = null;
        } else {
            header("Location: strukpembayaran.php?status=gagal");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        header("Location: strukpembayaran.php?status=gagal");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
