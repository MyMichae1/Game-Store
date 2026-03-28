<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname_user = "untuk_user";
$dbname_admin = "untuk_admin";

$conn_user = new mysqli($servername, $username, $password, $dbname_user);
$conn_admin = new mysqli($servername, $username, $password, $dbname_admin);

if ($conn_user->connect_error || $conn_admin->connect_error) {
    die("Connection failed: " . ($conn_user->connect_error ?: $conn_admin->connect_error));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_depan = $_POST['first_name'];
    $nama_belakang = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strpos($username, '.gameadminstr') !== false) {
        $username_admin = str_replace('.gameadminstr', '', $username);

        $stmt = $conn_admin->prepare("INSERT INTO akun_admin (nama_depan, nama_belakang, username, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama_depan, $nama_belakang, $username_admin, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful as admin!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        $stmt = $conn_user->prepare("INSERT INTO informasi_user (nama_depan, nama_belakang, username, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama_depan, $nama_belakang, $username, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful as user!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conn_user->close();
$conn_admin->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #1b182b;
            background-image: url(https://i.pinimg.com/originals/90/70/32/9070324cdfc07c68d60eed0c39e77573.gif);
            background-size: cover;
        }

        .container {
            display: flex;
            width: 800px;
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .left {
            background: url('https://media.giphy.com/media/TqDGMpZ0DN0m4/giphy.gif') no-repeat center center/cover;
            width: 50%;
            padding: 40px;
            color: white;
        }

        .left h1 {
            font-size: 40px;
            margin-top: 10px;
        }

        .left p {
            font-size: 18px;
            margin: 0;
        }

        .right {
            background: white;
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            font-size: 24px;
            margin-bottom: 20px;
            margin-left: -12px;
        }

        .right input[type="text"],
        .right input[type="email"],
        .right input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            margin-left: -12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .right input[type="checkbox"] {
            margin-right: 10px;
        }

        .right label {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .right button {
            width: 100%;
            padding: 10px;
            background: #1b182b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .right button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .right .or {
            position: relative;
            top: -5px;
            text-align: center;
            margin: 20px 0;
            color: #ccc;
        }

        .right .social-buttons button {
            position: relative;
            top: -17px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #1b182b;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .right .social-buttons button i {
            margin-right: 10px;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #1b182b;
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            width: calc(100% - 40px);
        }

        .password-container i {
            position: absolute;
            right: -2px;
            top: 18px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>Create your Account</h1>
            <h4>Share your artwork and Get projects!</h4>
        </div>
        <div class="right">
            <h2>Sign Up</h2>
            <form method="POST" action="" onsubmit="showLoading()">
                <input type="text" name="first_name" placeholder="First name" required>
                <input type="text" name="last_name" placeholder="Last name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email address" required>

                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                </div>

                <label>
                    <input type="checkbox" name="terms" required> Accept Terms & Conditions
                </label>
                <button type="submit">Sign up</button>
                <div class="loading" id="loading">Processing...</div>
            </form>
            <div class="or">or</div>
            <div class="social-buttons">
                <a href="login.php"><button><i class="fab fa-google"></i>Login</button></a>
            </div>
        </div>
    </div>

    <script>
        function showLoading() {
            document.getElementById('loading').style.display = 'block';
            document.querySelector('button[type="submit"]').disabled = true;
        }

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>