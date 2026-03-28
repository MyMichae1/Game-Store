<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "untuk_user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor_transaksi = $_POST['nomor_transaksi'];
    $status = $_POST['status'];

    $updateTransaksiQuery = "UPDATE transaksi_user SET status = ? WHERE nomor_transaksi = ?";
    $stmt = $conn->prepare($updateTransaksiQuery);
    $stmt->bind_param("ss", $status, $nomor_transaksi);
    $stmt->execute();

    $updateRiwayatQuery = "UPDATE riwayat_transaksi SET status_pembayaran = ? WHERE nomor_transaksi = ?";
    $stmt = $conn->prepare($updateRiwayatQuery);
    $stmt->bind_param("ss", $status, $nomor_transaksi);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Status berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui status.";
    }

    $stmt->close();
}

$conn->close();
