<?php
include "views/_header.php";
include "includes/navbar.php";
require "configphp"; // Veritabanı bağlantısı

$subcategory_id = 2; // Kadın Alt Giyim kategorisinin ID'si

// Alt Giyim kategorisindeki ürünleri çekme
$query = "SELECT * FROM products WHERE category_id = $subcategory_id";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container mt-4">
    <h2>Kadın Alt Giyim</h2>

    <div class="row mt-4">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <p class="card-text">₺<?= $product['price'] ?></p>
                        <a href="product_detail.php?id=<?= $product['id'] ?>" class="btn btn-primary">Ürüne Git</a>
                        <button class="btn btn-warning" onclick="addToFavorites(<?= $product['id'] ?>)">Favorilere Ekle</button>
                        <button class="btn btn-success" onclick="addToCart(<?= $product['id'] ?>)">Sepete Ekle</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function addToFavorites(productId) {
        // Favorilere ekleme işlemi
        // Burada favorilere ekleme işlemi için AJAX veya başka bir yöntem kullanılabilir.
    }

    function addToCart(productId) {
        // Sepete ekleme işlemi
        // Burada sepete ekleme işlemi için AJAX veya başka bir yöntem kullanılabilir.
    }
</script>

<?php include "views/_footer.php"; ?>