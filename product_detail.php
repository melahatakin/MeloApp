<?php
include 'config.php';

$category = $_GET['category'];
$id = intval($_GET['id']);
$product = null;

switch ($category) {
    case 'women':
        $table = 'women_products';
        break;
    case 'men':
        $table = 'men_products';
        break;
    case 'children':
        $table = 'children_products';
        break;
    default:
        die("Geçersiz kategori.");
}

$sql = "SELECT * FROM $table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Ürün bulunamadı.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Ürün Detayı</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="product-detail">
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <h1><?php echo $product['name']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <p><?php echo $product['price']; ?> TL</p>
        <a href="index.php">Geri Dön</a>
    </div>
</body>

</html>