<?php
// Veritabanı bağlantısı yapılma
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "melo_store";

// Bağlantıyı oluşturma 
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// SQL sorgusu
$sql = "SELECT * FROM products WHERE category_id = 1";

// Sorguyu çalıştırma ve sonuçları alma işlemi
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadın Aksesuar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Kadın Aksesuar</h1>
        <div class="products">
            <?php
            // Sonuçları gösterme işlemi yapılacak yer
            if ($result->num_rows > 0) {
                // Veri varsa, her bir satırı işleme işlmei yapıldı.
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
// Bağlantıyı kapatma
$conn->close();
?>