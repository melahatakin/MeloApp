<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = ""; // Şifrenizi buraya girin
$dbname = "melo_store";

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// SQL sorgusu
$sql = "SELECT * FROM products WHERE category_id = 1"; // category_id'yi kendi veri tabanınıza göre güncelleyin

// Sorguyu çalıştır ve sonuçları al
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadın Alt Giyim</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Kadın Alt Giyim</h1>
        <div class="products">
            <?php
            // Sonuçları göster
            if ($result->num_rows > 0) {
                // Veri varsa, her bir satırı işleyin
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="product">
                        <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"]; ?>">
                        <h2><?php echo $row["name"]; ?></h2>
                        <p><?php echo $row["description"]; ?></p>
                        <p>Fiyat: <?php echo $row["price"]; ?> TL</p>
                    </div>
            <?php
                }
            } else {
                echo "Üzgünüz, henüz yeni ürün bulunamadı.";
            }
            ?>
        </div>
    </div>
</body>

</html>

<?php
// Bağlantıyı kapat
$conn->close();
?>