<?php
session_start();
require 'libs/functions.php';
include 'views/_header.php';
include 'includes/navbar.php';

$urunler = getDiscountedProducts();
?>

<div class="container mt-4">
    <h2>İndirimdeki Ürünler</h2>
    <div class="row">
        <?php foreach ($urunler as $urun) : ?>
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="<?php echo $urun['resim']; ?>" class="card-img-top" alt="<?php echo $urun['isim']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $urun['isim']; ?></h5>
                        <p class="card-text"><?php echo $urun['fiyat']; ?> TL</p>
                        <a href="sepet_ekle.php?id=<?php echo $urun['id']; ?>" class="btn btn-primary">Sepete Ekle</a>
                        <a href="favori_ekle.php?id=<?php echo $urun['id']; ?>" class="btn btn-secondary">Favorilere Ekle</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>