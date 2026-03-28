<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "untuk_admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$transactionId = $data['transactionId'];
$status = $data['status'];

$sql = "UPDATE transaksi_user SET status = ? WHERE nomor_transaksi = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $status, $transactionId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status']);
}

$stmt->close();
$conn->close();
