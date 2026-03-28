<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname_user = "untuk_user";
$dbname_admin = "untuk_admin";

$conn_user = new mysqli($servername, $username, $password, $dbname_user);

if ($conn_user->connect_error) {
    die("Connection failed: " . $conn_user->connect_error);
}

$conn_admin = new mysqli($servername, $username, $password, $dbname_admin);

if ($conn_admin->connect_error) {
    die("Connection failed: " . $conn_admin->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn_user->prepare("SELECT password FROM informasi_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        if ($password === $db_password) {
            $_SESSION['user_email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $stmt->close();
        $stmt = $conn_admin->prepare("SELECT password FROM akun_admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_password);
            $stmt->fetch();

            if ($password === $db_password) {
                $_SESSION['admin_email'] = $email;
                header("Location: admin.php");
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "Email not found.";
        }
    }

    $stmt->close();
}

if (isset($conn_user) && $conn_user) {
    $conn_user->close();
}

if (isset($conn_admin) && $conn_admin) {
    $conn_admin->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            text-align: center;
            margin-top: 10px;
        }

        .left h4 {
            font-size: 18px;
            text-align: center;
            margin-top: 10px;
        }

        .right {
            background: white;
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: -10px;
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

        .right .or {
            text-align: center;
            margin: 20px 0;
            color: #ccc;
        }

        .right .social-buttons button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            text-decoration: none;
            color: #1b182b;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
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
            <h1>Login Now</h1>
            <h4>Share your artwork and Get projects!</h4>
        </div>
        <div class="right">
            <h2>Login</h2>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message"><?php echo htmlspecialchars($_SESSION['error_message']); ?></div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container" style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                </div>
                <label>
                    <input type="checkbox" id="termsCheckbox" required> Accept Terms & Conditions
                </label>
                <button type="submit">Login</button>
            </form>
            <div class="forgot-password">
                <a href="resetpass.php">Forgot your password?</a>
            </div>
        </div>
    </div>
    <script>
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