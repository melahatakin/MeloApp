<?php
// Veritabanı bağlantısı
$conn = new mysqli('localhost', 'kullanici_adi', 'sifre', 'veritabani_adi');

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}
