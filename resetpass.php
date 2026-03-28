<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
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
            margin-top: 10px;
        }

        .left h4 {
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

        .right input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: -12px;
        }

        .right button {
            width: 100%;
            padding: 10px;
            background: #1b182b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #1b182b;
        }

        .right .or {
            position: relative;
            top: -10px;
            text-align: center;
            margin: 20px 0;
            color: #ccc;
        }
        .right .tomboll{
            margin-top: 20px;
        }

        .right .social-buttons{
            position: relative;
            top: -30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>Reset Your Password</h1>
            <h4>Enter your email to receive a reset link!</h4>
        </div>
        <div class="right">
            <h2>Reset Password</h2>
            <form method="POST" action="request-reset.php" onsubmit="showLoading()">
                <input type="email" name="email" placeholder="Email address" required>
                <button class="tomboll" type="submit">Send Reset Link</button>
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
    </script>
</body>

</html>