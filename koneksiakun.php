<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "untuk_user";

$conn_user = new mysqli($host, $user, $password, $database);

if ($conn_user->connect_error) {
    die("Connection failed: " . $conn_user->connect_error);
}
