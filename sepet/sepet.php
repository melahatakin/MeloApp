<?php
session_start();
include 'config.php';
include 'views/_header.php';
include 'includes/navbar.php';
?>

<div class="container mt-4">
    <h2>Sepetim</h2>
    <div class="row">
        <?php if (isset($_SESSION['sepet']) && !empty($_SESSION['sepet'])) : ?>
            <?php foreach ($_SESSION['sepet'] as $urun_id) : ?>
                <?php
                $sql = "SELECT * FROM urunler WHERE id = $urun_id";
                $result = $conn->query($sql);
                $urun = $result->fetch_assoc();
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $urun['resim']; ?>" class="card-img-top" alt="<?php echo $urun['isim']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $urun['isim']; ?></h5>
                            <p class="card-text"><?php echo $urun['fiyat']; ?> TL</p>
                            <a href="sepet_cikar.php?id=<?php echo $urun['id']; ?>" class="btn btn-danger">Sepetten Çıkar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Sepetiniz boş.</p>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>