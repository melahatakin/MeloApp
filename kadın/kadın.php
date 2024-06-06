<?php
include 'config.php';
include 'libs/function.php';
include 'includes/navbar.php';

$sql = "SELECT urunler.*, kategoriler.isim AS kategori_isim FROM urunler JOIN kategoriler ON urunler.kategori_id = kategoriler.id WHERE kategoriler.isim LIKE 'Kadın%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Kadın Kategorisi</h2><table><tr><th>Ürün İsmi</th><th>Fiyat</th><th>Kategori</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["isim"] . "</td><td>" . $row["fiyat"] . "</td><td>" . $row["kategori_isim"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Bu kategoride ürün bulunmamaktadır.";
}

$conn->close();
