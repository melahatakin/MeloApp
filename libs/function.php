<?php
function getData()
{
    $myfile = fopen("db.json", "r");
    $size = filesize("db.json");

    $result = json_decode(fread($myfile, $size), true);
    fclose($myfile);

    return $result;
}
// gelen veri eşleşip eşleşmediğini kontrol ediyoruz.
// function getUser(string $username)
// {
//     $users = getData()["users"];
//     foreach ($users as $user) {
//         if ($user["username"] == $username) {
//             return $user;
//         }
//     }
//     return null;
// }

require 'config.php';

// Kullanıcıyı veritabanından alır
function getUser($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Ürünleri kategorisine göre alır
function getProductsByCategory($category)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM urunler WHERE kategori = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Sepetten ürün çıkarma
function removeFromCart($id)
{
    if (($key = array_search($id, $_SESSION['sepet'])) !== false) {
        unset($_SESSION['sepet'][$key]);
    }
}

// Sepete ürün ekleme
function addToCart($id)
{
    if (!isset($_SESSION['sepet'])) {
        $_SESSION['sepet'] = array();
    }
    if (!in_array($id, $_SESSION['sepet'])) {
        $_SESSION['sepet'][] = $id;
    }
}

// İndirimdeki ürünleri alır
function getDiscountedProducts()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM urunler WHERE indirim = 1");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
