<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "untuk_admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_game'])) {
    $id = $_POST['game_id'];
    $name = $_POST['game_name'];
    $genre = $_POST['game_genre'];
    $rating = $_POST['game_rating'];
    $price = $_POST['game_price'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["game_image"]["name"]);
    move_uploaded_file($_FILES["game_image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO tambah_game (id, nama, genre, rating, harga, image) VALUES ('$id', '$name', '$genre', '$rating', '$price', '$target_file')";
    $conn->query($sql);
}

if (isset($_POST['delete_game'])) {
    $id = $_POST['game_id'];
    $conn->query("DELETE FROM tambah_game WHERE id='$id'");
}

if (isset($_POST['update_game'])) {
    $id = $_POST['game_id'];
    $name = $_POST['game_name'];
    $genre = $_POST['game_genre'];
    $rating = $_POST['game_rating'];
    $price = $_POST['game_price'];

    $target_dir = "img/";
    if ($_FILES["game_image"]["name"]) {
        $target_file = $target_dir . basename($_FILES["game_image"]["name"]);
        move_uploaded_file($_FILES["game_image"]["tmp_name"], $target_file);
        $sql = "UPDATE tambah_game SET nama='$name', genre='$genre', rating='$rating', harga='$price', image='$target_file' WHERE id='$id'";
    } else {
        $sql = "UPDATE tambah_game SET nama='$name', genre='$genre', rating='$rating', harga='$price' WHERE id='$id'";
    }
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM tambah_game");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #1b182b;
            --white: #fff;
            --gray: #363434;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            position: relative;
            width: 100%;
        }

        .navigation {
            position: fixed;
            width: 300px;
            height: 100%;
            background: var(--blue);
            border-left: 10px solid var(--blue);
            transition: 0.5s;
            overflow: hidden;
        }

        .navigation.active {
            width: 80px;
        }

        .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .navigation ul li:hover,
        .navigation ul li.hovered {
            background-color: var(--white);
        }

        .navigation ul li:nth-child(1) {
            margin-bottom: 40px;
            pointer-events: none;
        }

        .navigation ul li a {
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
        }

        .navigation ul li:hover a,
        .navigation ul li.hovered a {
            color: var(--blue);
        }

        .navigation ul li a .icon {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 75px;
            text-align: center;
        }

        .navigation ul li a .icon ion-icon {
            font-size: 1.75rem;
        }

        .navigation ul li a .title {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }

        .navigation ul li:hover a::before,
        .navigation ul li.hovered a::before {
            content: "";
            position: absolute;
            right: 0;
            top: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px 35px 0 10px var(--white);
            pointer-events: none;
        }

        .navigation ul li:hover a::after,
        .navigation ul li.hovered a::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px -35px 0 10px var(--white);
            pointer-events: none;
        }

        .main {
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--white);
            transition: 0.5s;
        }

        .main.active {
            width: calc(100% - 80px);
            left: 80px;
        }

        .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
        }

        .search {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .search label {
            position: relative;
            width: 100%;
        }

        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: 1px solid var(--black2);
        }

        .search label ion-icon {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gameManagement {
            padding: 20px;
        }

        .gameManagement h2 {
            font-weight: 600;
            color: var(--blue);
            margin-bottom: 20px;
        }

        .gameForm label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .gameForm input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--black2);
            border-radius: 5px;
        }

        .gameForm button {
            padding: 10px 20px;
            background: var(--blue);
            color: var(--white);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .gameTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .gameTable th,
        .gameTable td {
            padding: 10px;
            border: 1px solid var(--black2);
            text-align: left;
        }

        .gameTable th {
            background: var(--blue);
            color: var(--white);
        }

        .gameTable tr:hover {
            background: var(--white);
        }

        .gameTable .editBtn,
        html .gameTable .deleteBtn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .gameTable .editBtn {
            background: #ffc107;
            color: var(--white);
        }

        .gameTable .deleteBtn {
            background: #dc3545;
            color: var(--white);
        }

        @media (max-width: 991px) {
            .navigation {
                left: -300px;
            }

            .navigation.active {
                width: 300px;
                left: 0;
            }

            .main {
                width: 100%;
                left: 0;
            }

            .main.active {
                left: 300px;
            }
        }

        @media (max-width: 768px) {
            .details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .user {
                min-width: 40px;
            }

            .navigation {
                width: 100%;
                left: -100%;
                z-index: 1000;
            }

            .navigation.active {
                width: 100%;
                left: 0;
            }

            .toggle {
                z-index: 10001;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple-ar"></ion-icon>
                        </span>
                        <span class="title">Game Store Admin</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="crudgame.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">CRUD</span>
                    </a>
                </li>
                <li>
                    <a href="membershipadmin.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Membership Feature</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                </div>
            </div>

            <div class="gameManagement">
                <h2>Manage Games</h2>
                <form method="POST" enctype="multipart/form-data" class="gameForm">
                    <label for="game_id">Game ID:</label>
                    <input type="number" name="game_id" id="game_id" placeholder="Game ID" required>

                    <label for="game_name">Game Name:</label>
                    <input type="text" name="game_name" id="game_name" placeholder="Game Name" required>

                    <label for="game_genre">Game Genre:</label>
                    <input type="text" name="game_genre" id="game_genre" placeholder="Game Genre" required>

                    <label for="game_rating">Game Rating:</label>
                    <input type="number" step="0.1" name="game_rating" id="game_rating" placeholder="Game Rating (1.0 - 10.0)" required>

                    <label for="game_price">Game Price:</label>
                    <input type="number" step="0.01" name="game_price" id="game_price" placeholder="Game Price" required>

                    <label for="game_image">Game Image:</label>
                    <input type="file" name="game_image" id="game_image" accept="image/*" required>

                    <button type="submit" name="add_game">Add Game</button>
                </form>

                <table class="gameTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Game Name</th>
                            <th>Genre</th>
                            <th>Rating</th>
                            <th>Harga</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                <td><?php echo htmlspecialchars($row['genre']); ?></td>
                                <td><?php echo htmlspecialchars($row['rating']); ?></td>
                                <td><?php echo htmlspecialchars($row['harga']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>" style="width: 100px; height: auto;"></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_game" class="deleteBtn">Delete</button>
                                    </form>
                                    <button class="editBtn" onclick="editGame(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['nama']); ?>', '<?php echo htmlspecialchars($row['genre']); ?>', <?php echo $row['rating']; ?>, <?php echo $row['harga']; ?>)">Edit</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div id="editGameModal" style="display:none;">
                    <h2>Edit Game</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="game_id" id="edit_game_id">
                        <label for="edit_game_name">Game Name:</label>
                        <input type="text" name="game_name" id="edit_game_name" placeholder="Game Name" required><br>

                        <label for="edit_game_genre">Game Genre:</label>
                        <input type="text" name="game_genre" id="edit_game_genre" placeholder="Game Genre" required><br>

                        <label for="edit_game_rating">Game Rating:</label>
                        <input type="number" step="0.1" name="game_rating" id="edit_game_rating" placeholder="Game Rating (1.0 - 10.0)" required><br>

                        <label for="edit_game_price">Game Price:</label>
                        <input type="number" step="0.01" name="game_price" id="edit_game_price" placeholder="Game Price" required><br>

                        <label for="edit_game_image">Game Image:</label>
                        <input type="file" name="game_image" id="edit_game_image" accept="image/*"><br>

                        <button type="submit" name="update_game">Update Game</button><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editGame(id, name, genre, rating, price) {
            document.getElementById('edit_game_id').value = id;
            document.getElementById('edit_game_name').value = name;
            document.getElementById('edit_game_genre').value = genre;
            document.getElementById('edit_game_rating').value = rating;
            document.getElementById('edit_game_price').value = price;
            document.getElementById('editGameModal').style.display = 'block';
        }

        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function() {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        };
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>