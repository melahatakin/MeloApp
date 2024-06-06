<?php include "views/_header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include 'config.php'; ?>
<?php include 'libs/function.php'; ?>
<?php // Ürünleri rastgele seçmek için query'leri oluşturma 
$women_products_query = "SELECT * FROM women_products ORDER BY RAND() LIMIT 1";
$men_products_query = "SELECT * FROM men_products ORDER BY RAND() LIMIT 1";
$children_products_query = "SELECT * FROM children_products ORDER BY RAND() LIMIT 1";

// Kadın ürünlerinden rastgele bir ürünü çekme
$women_result = $conn->query($women_products_query);
$women_product = $women_result->fetch_assoc();

// Erkek ürünlerinden rastgele bir ürünü çekme
$men_result = $conn->query($men_products_query);
$men_product = $men_result->fetch_assoc();

// Çocuk ürünlerinden rastgele bir ürünü çekme
$children_result = $conn->query($children_products_query);
$children_product = $children_result->fetch_assoc();
?>


<!-- Ana İçerik Başlangıç -->
<div class="container mt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="kadın/kadınyenigelenler.php">
                    <img src="image/ban1.png" class="d-block w-100" alt="Banner 1">
                </a>
            </div>
            <div class="carousel-item">
                <a href="kadın/kadinustgiyim.php">
                    <img src="image/ban2.png" class="d-block w-100" alt="Banner 2">
                </a>
            </div>
            <div class="carousel-item">
                <a href="kadın/kadinaltgiyim.php">
                    <img src="image/ban3.png" class="d-block w-100" alt="Banner 3">
                </a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Önceki</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sonraki</span>
        </button>
    </div>

    <!-- Yeni Gelenler Bölümü -->
    <section class="new-arrivals mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <img src="image/yeni.png" class="img-fluid" alt="Yeni Gelenler">
                    <h2 class="my-4">Yeni Gelenler</h2>
                    <a href="kadın/kadınyenigelenler.php" class="btn btn-primary">Alışverişe Başla</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ürünler Kısmı -->
    <div class="container my-5">
        <h2 class="text-center">Ürünler</h2>
        <div class="row">
            <!-- Örnek Ürün Kartları -->
            <div class="col-md-3">
                <div class="card">
                    <img src="image/urun1.png" class="card-img-top" alt="Ürün 1">
                    <div class="card-body">
                        <h5 class="card-title">Ürün 1</h5>
                        <p class="card-text">Kısa açıklama</p>
                        <a href="urun_detay.php?kategori=kadin&urun_id=1" class="btn btn-primary">Ürüne Git</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="image/urun2.png" class="card-img-top" alt="Ürün 2">
                    <div class="card-body">
                        <h5 class="card-title">Ürün 2</h5>
                        <p class="card-text">Kısa açıklama</p>
                        <a href="urun_detay.php?kategori=erkek&urun_id=1" class="btn btn-primary">Ürüne Git</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="image/urun3.png" class="card-img-top" alt="Ürün 3">
                    <div class="card-body">
                        <h5 class="card-title">Ürün 3</h5>
                        <p class="card-text">Kısa açıklama</p>
                        <a href="urun_detay.php?kategori=kadin&urun_id=3" class="btn btn-primary">Ürüne Git</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="image/urun4.png" class="card-img-top" alt="Ürün 4">
                    <div class="card-body">
                        <h5 class="card-title">Ürün 4</h5>
                        <p class="card-text">Kısa açıklama</p>
                        <a href="urun_detay.php?kategori=kadin&urun_id=4" class="btn btn-primary">Ürüne Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ürünler Kısmı Bitiş -->

    <!-- Multi Banner Başlangıç -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <a href="views/_coksatanlar.php">
                    <img src="image/coksat.png" class="img-fluid" alt="Banner 1">
                </a>
            </div>
            <div class="col-md-6">
                <a href="views/_enucuz.php">
                    <img src="image/ikiyuzelli.png" class="img-fluid" alt="Banner 2">
                </a>
            </div>
        </div>
    </div>
    <!-- Ana İçerik Bitiş -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>