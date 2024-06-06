<?php
include 'libs/function.php';
include 'includes/navbar.php';

$user_id = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adres = $_POST['adres'];
    $kart_numarasi = $_POST['kart_numarasi'];
    $kart_son_kullanma = $_POST['kart_son_kullanma'];
    $kart_cvv = $_POST['kart_cvv'];

    // Sipariş özetini kaydet ve işlemi tamamlama
    //burada siparişi veritabanına kaydedebilir ve stok güncellemesi yapabilirim.UNUTMAAAA!!!!

    // Sepeti temizle
    satinAl($user_id);
    header("Location: siparis_tamamlandi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1>Ödeme Bilgileri</h1>
        <form method="post">
            <div class="form-group">
                <label for="adres">Adres</label>
                <textarea class="form-control" id="adres" name="adres" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="kart_numarasi">Kart Numarası</label>
                <input type="text" class="form-control" id="kart_numarasi" name="kart_numarasi" required>
            </div>
            <div class="form-group">
                <label for="kart_son_kullanma">Son Kullanma Tarihi</label>
                <input type="text" class="form-control" id="kart_son_kullanma" name="kart_son_kullanma" placeholder="AA/YY" required>
            </div>
            <div class="form-group">
                <label for="kart_cvv">CVV</label>
                <input type="text" class="form-control" id="kart_cvv" name="kart_cvv" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Ödeme Yap</button>
        </form>
    </div>
</body>

</html>