<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $stmt->close();

            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $stmt->bind_param("ss", $new_password, $token);
            $stmt->execute();

            echo "Password Anda telah berhasil diubah.";
        }
    } else {
        echo "Token tidak valid atau sudah kedaluwarsa.";
    }
    $stmt->close();
} else {
    echo "Token tidak ditemukan.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <h2>Reset Password</h2>
    <form method="POST" action="">
        <label for="new_password">Password Baru:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <input type="submit" value="Ubah Password">
    </form>
</body>

</html>