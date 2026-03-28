<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Logout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #0f0050;
        }

        .logout-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 30px;
            text-align: center;
        }

        .logout-icon {
            width: 80px;
            height: 80px;
            background-color: #0f0050;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }

        .logout-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .logout-title {
            color: #333;
            margin-bottom: 15px;
        }

        .logout-message {
            color: #666;
            margin-bottom: 25px;
        }

        .logout-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-cancel {
            background-color: #e0e0e0;
            color: #333;
        }

        .btn-logout {
            background-color: #ff0000;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <div class="logout-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </div>
        <h2 class="logout-title">Konfirmasi Logout</h2>
        <p class="logout-message">Apakah Anda yakin ingin keluar dari akun Anda?</p>
        <div class="logout-buttons">
            <button class="btn btn-cancel" onclick="cancelLogout()">Batal</button>
            <button class="btn btn-logout" onclick="confirmLogout()">Logout</button>
        </div>
    </div>

    <script>
        function cancelLogout() {
            alert('Logout dibatalkan');
            window.location.href = 'newgame.php';
        }

        function confirmLogout() {
            sessionStorage.clear(); 

            alert('Anda berhasil logout');
            window.location.href = 'login.php';
        }
    </script>
</body>

</html>