<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "untuk_user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT email FROM informasi_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: gantipass.php?email=" . urlencode($email));
        exit();
    } else {
        echo "Email not found.";
    }

    $stmt->close();
}

$conn->close();
