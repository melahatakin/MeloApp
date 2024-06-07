<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "melo_store";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}
