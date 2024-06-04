<?php
session_start();

include '../config.php';

$query = $conn->prepare("SELECT * FROM urunler WHERE kategori = 'kadın_yenigelenler'");
$query->execute();
$urunler = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadın Yeni Gelenler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Kadın Yeni Gelenler</h1>
        <div class="row mt-4">
            <?php foreach ($urunler as $urun) : ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="../<?php echo $urun['resim']; ?>" class="card-img-top" alt="<?php echo $urun['isim']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $urun['isim']; ?></h5>
                            <p class="card-text"><?php echo $urun['fiyat']; ?> TL</p>
                            <a href="../sepet_ekle.php?id=<?php echo $urun['id']; ?>" class="btn btn-primary">Sepete Ekle</a>
                            <a href="../favori_ekle.php?id=<?php echo $urun['id']; ?>" class="btn btn-secondary">Favorilere Ekle</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>