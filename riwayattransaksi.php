<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "untuk_user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT tanggal, nomor_transaksi, total_pembelian, pembelian, status_pembayaran FROM riwayat_transaksi");

$purchases = [];

while ($row = $result->fetch_assoc()) {
    $gameDetails = json_decode($row['pembelian'], true);

    $purchases[] = [
        'nomor_transaksi' => $row['nomor_transaksi'],
        'nama_game' => $gameDetails['nama_game'] ?? 'N/A',
        'harga' => $gameDetails['harga_game'] ?? 'N/A',
        'diskon' => $gameDetails['diskon'] ?? 'N/A',
        'biaya_admin_game' => $gameDetails['biaya_admin_game'] ?? 'N/A',
        'total_pembelian' => $row['total_pembelian'],
        'tanggal' => $row['tanggal'],
        'status_pembayaran' => $row['status_pembayaran']
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #180d3d;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #001d52;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .header a {
            font-size: 1.6rem;
            font-weight: 500;
            transition: 0.2s;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .filter-section {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .filter-section input,
        .filter-section select,
        .filter-section button {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-section button {
            background-color: #0b81ec;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filter-section button:hover {
            background-color: #797373;
        }

        .table-container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f3f 4f6;
            font-weight: bold;
            color: #11254a;
        }

        table td {
            background-color: #f9fafc;
        }

        .footer {
            background-color: #11254a;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }

        .footer span {
            color: #cfbd17;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <a href="index.php">Riwayat Transaksi</a>
        </div>

        <div class="filter-section ">
            <input type="text" placeholder="Rent ang Tanggal" value="2024-11-27 - 2024-11-27">
            <select>
                <option value="semua">Tipe</option>
                <option value="semua">Semua</option>
            </select>
            <select>
                <option value="semua">Provider</option>
                <option value="semua">Semua</option>
            </select>
            <button>Cari</button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal (WIB)</th>
                        <th>Nomor</th>
                        <th>Nama Game</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Biaya Admin</th>
                        <th>Total Pembelian</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchases as $purchase): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($purchase['tanggal']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['nomor_transaksi']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['nama_game']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['harga']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['diskon']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['biaya_admin_game']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['total_pembelian']); ?></td>
                            <td><?php echo htmlspecialchars($purchase['status_pembayaran']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <span>&copy; 2024 Riwayat Transaksi</span>
        </div>
    </div>
</body>

</html>