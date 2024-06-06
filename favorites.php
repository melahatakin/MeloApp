<?php
include 'libs/function.php';
include 'includes/navbar.php';

$user_id = 1;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['favorilerden_cikar'])) {
        $urun_id = $_POST['urun_id'];
        $kategori = $_POST['kategori'];
        favorilerdenCikar($user_id, $urun_id, $kategori);
        header("Location: favorites.php");
        exit();
    }
}

$sql = "SELECT * FROM favorites WHERE user_id = ?";
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
    <title>Favorilerim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1>Favorilerim</h1>
        <?php if ($result->num_rows > 0) : ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <?php
                    $urun = getUrunById($row['category'], $row['product_id']);
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo $urun['image']; ?>" class="card-img-top" alt="<?php echo $urun['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $urun['name']; ?></h5>
                                <p class="card-text"><?php echo $urun['description']; ?></p>
                                <p><strong>Fiyat: <?php echo $urun['price']; ?> TL</strong></p>
                                <form method="post">
                                    <input type="hidden" name="urun_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="kategori" value="<?php echo $row['category']; ?>">
                                    <button type="submit" name="favorilerden_cikar" class="btn btn-danger">Favorilerden Çıkar</button>
                                </form>
                                <a href="urun_detay.php?kategori=<?php echo $row['category']; ?>&urun_id=<?php echo $row['product_id']; ?>" class="btn btn-primary">Ürünü Gör</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>Favorilerinizde ürün bulunmamaktadır.</p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>