<?php
include 'config.php';
include 'libs/function.php';
include 'includes/navbar.php';

$sql = "SELECT * FROM indirimler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Ürün ID</th><th>İndirim Oranı</th><th>Başlangıç Tarihi</th><th>Bitiş Tarihi</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["urun_id"] . "</td><td>" . $row["indirim_orani"] . "</td><td>" . $row["baslangic_tarihi"] . "</td><td>" . $row["bitis_tarihi"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No discounts found.";
}

$conn->close();
