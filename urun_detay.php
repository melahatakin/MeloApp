<?php
include 'libs/function.php';

$kategori = $_GET['kategori'];
$urun_id = $_GET['urun_id'];
$user_id = 1;

$urun = getUrunById($kategori, $urun_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sepete_ekle'])) {
        sepeteEkle($user_id, $urun_id, $kategori);
        header("Location: cart.php");
        exit();
    } elseif (isset($_POST['favorilere_ekle'])) {
        favorilereEkle($user_id, $urun_id, $kategori);
        header("Location: favorites.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Detay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1>Ürün Detay</h1>
        <?php if ($urun) : ?>
            <img src="<?php echo $urun['image']; ?>" class="img-fluid" alt="<?php echo $urun['name']; ?>">
            <h2><?php echo $urun['name']; ?></h2>
            <p><?php echo $urun['description']; ?></p>
            <p><strong>Fiyat: <?php echo $urun['price']; ?> TL</strong></p>
            <form method="post">
                <button type="submit" name="sepete_ekle" class="btn btn-success">Sepete Ekle</button>
                <button type="submit" name="favorilere_ekle" class="btn btn-warning">Favorilere Ekle</button>
            </form>
        <?php else : ?>
            <p>Ürün bulunamadı.</p>
        <?php endif; ?>
    </div>
</body>

</html>