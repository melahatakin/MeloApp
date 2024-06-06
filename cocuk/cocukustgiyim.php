<?php
include 'config.php';
include 'libs/function.php';
include 'includes/navbar.php';

$kategori_ismi = 'Çocuk Üst Giyim';
$sql = "SELECT urunler.* FROM urunler JOIN kategoriler ON urunler.kategori_id = kategoriler.id WHERE kategoriler.isim = '$kategori_ismi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>$kategori_ismi</h2><table><tr><th>Ürün İsmi</th><th>Fiyat</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["isim"] . "</td><td>" . $row["fiyat"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Bu kategoride ürün bulunmamaktadır.";
}

$conn->close();
