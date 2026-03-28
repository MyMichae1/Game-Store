<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname_admin = "untuk_admin";
$dbname_user = "untuk_user";

$conn_admin = new mysqli($servername, $username, $password, $dbname_admin);
if ($conn_admin->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection to admin database failed: ' . $conn_admin->connect_error]));
}

$conn_user = new mysqli($servername, $username, $password, $dbname_user);
if ($conn_user->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection to user database failed: ' . $conn_user->connect_error]));
}

$nomor_transaksi = $_POST['nomor_transaksi'];
$nama_game = $_POST['nama_game'];
$harga = $_POST['harga'];
$total_harga = $_POST['total_harga'];
$tanggal_beli = $_POST['tanggal_beli'];
$diskon = $_POST['diskon'];
$status = $_POST['status'];

$sql = "INSERT INTO pembayaran_verifikasi (nomor_transaksi, nama_game, harga, total_harga, tanggal_beli, diskon) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn_admin->prepare($sql);
$stmt->bind_param("ssddss", $nomor_transaksi, $nama_game, $harga, $total_harga, $tanggal_beli, $diskon);

if ($stmt->execute()) {
    $updateTransaksiQuery = "UPDATE transaksi_user SET status = ? WHERE nomor_transaksi = ?";
    $stmt = $conn_admin->prepare($updateTransaksiQuery);
    $stmt->bind_param("ss", $status, $nomor_transaksi);
    $stmt->execute();

    $updateRiwayatQuery = "UPDATE riwayat_transaksi SET status_pembayaran = ? WHERE nomor_transaksi = ?";
    $stmt = $conn_user->prepare($updateRiwayatQuery);
    $stmt->bind_param("ss", $status, $nomor_transaksi);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Pembayaran diterima dan status diperbarui.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Pembayaran diterima tetapi tidak ada status yang diperbarui.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
}

$stmt->close();
$conn_admin->close();
$conn_user->close();
