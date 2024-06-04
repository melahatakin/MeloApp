<?php
include "views/_header.php";
include "includes/navbar.php";
require "config.php"; // Veritabanı bağlantısı

$category_id = 1; // Kadın kategorisinin ID'si

// Kadın kategorisindeki alt kategorileri çekme
$query = "SELECT * FROM categories WHERE parent_id = $category_id";
$result = mysqli_query($conn, $query);
$subcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container mt-4">
    <h2>Kadın Kategorisi</h2>
    <div class="row">
        <?php foreach ($subcategories as $subcategory) : ?>
            <div class="col-md-3">
                <a href="kadın_<?= strtolower($subcategory['name']) ?>.php" class="btn btn-primary"><?= $subcategory['name'] ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>