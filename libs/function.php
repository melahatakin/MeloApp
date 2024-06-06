<?php
include 'config.php';
function getUrunById($kategori, $urun_id)
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $kategori WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $urun_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $urun = $result->fetch_assoc();

    $conn->close();

    return $urun;
}

function sepeteEkle($user_id, $urun_id, $kategori)
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    $sql = "INSERT INTO cart (user_id, product_id, category, quantity) VALUES (?, ?, ?, 1) ON DUPLICATE KEY UPDATE quantity = quantity + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();

    $conn->close();
}

function favorilereEkle($user_id, $urun_id, $kategori)
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    $sql = "INSERT INTO favorites (user_id, product_id, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();

    $conn->close();
}
