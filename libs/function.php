<?php
include 'config.php';


// Veritabanı bağlantısı yapılan kısım
function dbConnect()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }
    return $conn;
}

// Ürün bilgilerini getirme işl.
function getUrunById($kategori, $urun_id)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM $kategori WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $urun_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $urun = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $urun;
}

// Favorilere ekleme işl.
function favorilereEkle($user_id, $urun_id, $kategori)
{
    $conn = dbConnect();
    $sql = "INSERT INTO favorites (user_id, product_id, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Favorilerden çıkarma işl.
function favorilerdenCikar($user_id, $urun_id, $kategori)
{
    $conn = dbConnect();
    $sql = "DELETE FROM favorites WHERE user_id = ? AND product_id = ? AND category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Sepete ekleme işl.
function sepeteEkle($user_id, $urun_id, $kategori)
{
    $conn = dbConnect();
    $sql = "INSERT INTO cart (user_id, product_id, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Sepetten çıkarma işl.
function sepettenCikar($user_id, $urun_id, $kategori)
{
    $conn = dbConnect();
    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ? AND category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $urun_id, $kategori);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Sepeti satın alma işlemi
function satinAl($user_id)
{
    $conn = dbConnect();
    // Sipariş özetini almak için kull fonk.
    $sql = "SELECT * FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $urun_id = $row['product_id'];
        $kategori = $row['category'];

        // Siparişi siparişler tablosuna ekleme işlmei
        $sqlInsert = "INSERT INTO orders (user_id, product_id, category) VALUES (?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("iis", $user_id, $urun_id, $kategori);
        $stmtInsert->execute();
        $stmtInsert->close();
    }

    // Sepeti temizleme işlemi
    $sqlDelete = "DELETE FROM cart WHERE user_id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $user_id);
    $stmtDelete->execute();
    $stmtDelete->close();

    $stmt->close();
    $conn->close();
}

// Kullanıcı siparişini kaydetme işlemi
function siparisiKaydet($user_id, $adres, $kart_numarasi, $kart_son_kullanma, $kart_cvv)
{
    $conn = dbConnect();
    $sql = "INSERT INTO orders (user_id, address, card_number, card_expiry, card_cvv) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $adres, $kart_numarasi, $kart_son_kullanma, $kart_cvv);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
