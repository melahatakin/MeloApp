<?php
include 'libs/function.php';

$user_id = 1; // Örnek kullanıcı ID'si, oturum açma sistemi kullanıyorsanız bunu dinamik yapmalısınız.

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepetim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1>Sepetim</h1>
        <?php if ($result->num_rows > 0) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ürün</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <?php
                        $urun = getUrunById($row['category'], $row['product_id']);
                        ?>
                        <tr>
                            <td><?php echo $urun['name']; ?></td>
                            <td><?php echo $urun['price']; ?> TL</td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $urun['price'] * $row['quantity']; ?> TL</td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Sepetinizde ürün bulunmamaktadır.</p>
        <?php endif; ?>
    </div>
</body>

</html>