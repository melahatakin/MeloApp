-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Haz 2024, 13:59:46
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `melo_store`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Kadın', NULL),
(2, 'Erkek', NULL),
(3, 'Çocuk', NULL),
(4, 'Aksesuar', NULL),
(5, 'Yeni Gelenler', 1),
(6, 'Üst Giyim', 1),
(7, 'Alt Giyim', 1),
(8, 'Aksesuar', 1),
(9, 'Yeni Gelenler', 2),
(10, 'Üst Giyim', 2),
(11, 'Alt Giyim', 2),
(12, 'Aksesuar', 2),
(13, 'Yeni Gelenler', 3),
(14, 'Üst Giyim', 3),
(15, 'Alt Giyim', 3),
(16, 'Aksesuar', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `children_products`
--

CREATE TABLE `children_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cocuk`
--

CREATE TABLE `cocuk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cocuk`
--

INSERT INTO `cocuk` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Çocuk Ürün 1', 'Çocuk Ürün 1 Açıklaması', 90.00, 'image/urun1.png'),
(2, 'Çocuk Ürün 2', 'Çocuk Ürün 2 Açıklaması', 140.00, 'image/urun2.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `erkek`
--

CREATE TABLE `erkek` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `erkek`
--

INSERT INTO `erkek` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Erkek Ürün 1', 'Erkek Ürün 1 Açıklaması', 120.00, 'image/urun1.png'),
(2, 'Erkek Ürün 2', 'Erkek Ürün 2 Açıklaması', 170.00, 'image/urun2.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `category`) VALUES
(2, 1, 1, 'kadin'),
(3, 1, 3, 'kadin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `indirimler`
--

CREATE TABLE `indirimler` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `indirim_orani` decimal(5,2) NOT NULL,
  `baslangic_tarihi` date NOT NULL,
  `bitis_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kadin`
--

CREATE TABLE `kadin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kadin`
--

INSERT INTO `kadin` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Kadın Ürün 1', 'Kadın Ürün 1 Açıklaması', 100.00, 'image/urun1.png'),
(2, 'Kadın Ürün 2', 'Kadın Ürün 2 Açıklaması', 150.00, 'image/urun2.png'),
(3, 'Kadın Ürün 1', 'Kadın Ürün 1 Açıklaması', 100.00, 'image/urun3.png'),
(4, 'Kadın Ürün 2', 'Kadın Ürün 2 Açıklaması', 150.00, 'image/urun4.png'),
(5, 'Kadın Ürün 3', 'Kadın Ürün 3 Açıklaması', 200.00, NULL),
(6, 'Kadın Ürün 4', 'Kadın Ürün 4 Açıklaması', 250.00, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `isim`) VALUES
(1, 'Kadın Yeni Gelenler'),
(2, 'Kadın Aksesuar'),
(3, 'Kadın Alt Giyim'),
(4, 'Kadın Üst Giyim'),
(5, 'Erkek Yeni Gelenler'),
(6, 'Erkek Aksesuar'),
(7, 'Erkek Alt Giyim'),
(8, 'Erkek Üst Giyim'),
(9, 'Çocuk Yeni Gelenler'),
(10, 'Çocuk Aksesuar'),
(11, 'Çocuk Alt Giyim'),
(12, 'Çocuk Üst Giyim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `password`) VALUES
(1, 'meloakin', '$2y$10$XtEyITuGEVNm2k.ZpXofsOG.etAjMgCX0k7IpVOatXmoASkfh7kOi'),
(2, 'melo', '$2y$10$rxH9x8oZfD7sALZO//Y9s.iNczeNJtNLNaJu9HBfsFtJTckKNMLR2'),
(3, 'sfsdfs', '$2y$10$6JzW9Hql91n0Pi0DM5cS2.UaKjp3BoZB9EWf79N0ADkXLNg50f4wi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `men_products`
--

CREATE TABLE `men_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_expiry` varchar(255) DEFAULT NULL,
  `card_cvv` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `category`, `address`, `card_number`, `card_expiry`, `card_cvv`, `created_at`) VALUES
(1, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:49:13'),
(2, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:49:13'),
(3, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:49:13'),
(4, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:49:13'),
(5, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:49:13'),
(6, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:51:51'),
(7, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 21:53:35'),
(8, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 23:01:18'),
(9, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 23:09:02'),
(10, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-06 23:11:17'),
(11, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00'),
(12, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00'),
(13, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00'),
(14, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00'),
(15, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00'),
(16, 1, 1, 'kadin', NULL, NULL, NULL, NULL, '2024-06-07 11:24:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subcategory_id` int(11) DEFAULT NULL,
  `image_urL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created_at`, `subcategory_id`, `image_urL`) VALUES
(1, 'Kadın Ürün 1', 'Kadın Ürün 1 Açıklaması', 99.99, 2, 'image/urun1.png', '2024-05-30 23:49:10', NULL, NULL),
(2, 'Kadın Ürün 2', 'Kadın Ürün 2 Açıklaması', 79.99, 3, 'image/urun2.png', '2024-05-30 23:49:10', NULL, NULL),
(3, 'Erkek Ürün 1', 'Erkek Ürün 1 Açıklaması', 89.99, 6, 'image/urun3.png', '2024-05-30 23:49:10', NULL, NULL),
(4, 'Çocuk Ürün 1', 'Çocuk Ürün 1 Açıklaması', 69.99, 10, 'image/urun4.png', '2024-05-30 23:49:10', NULL, NULL),
(10, 'Kadın Ürün 1', 'Kadın Ürün 1 Açıklaması', 49.99, 1, 'image/urun1.png', '2024-06-06 21:40:55', NULL, NULL),
(11, 'Kadın Ürün 2', 'Kadın Ürün 2 Açıklaması', 59.99, 1, 'image/urun2.png', '2024-06-06 21:40:55', NULL, NULL),
(12, 'Kadın Ürün 3', 'Kadın Ürün 3 Açıklaması', 69.99, 1, 'image/urun3.png', '2024-06-06 21:40:55', NULL, NULL),
(13, 'Kadın Ürün 4', 'Kadın Ürün 4 Açıklaması', 79.99, 1, 'image/urun4.png', '2024-06-06 21:40:55', NULL, NULL),
(14, 'Kadın Ürün 5', 'Kadın Ürün 5 Açıklaması', 89.99, 1, 'image/kadınust.png', '2024-06-06 21:40:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `miktar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'user1', 'user1@example.com', 'hashed_password1', '2024-05-30 23:49:30'),
(2, 'user2', 'user2@example.com', 'hashed_password2', '2024-05-30 23:49:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `women_products`
--

CREATE TABLE `women_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Tablo için indeksler `children_products`
--
ALTER TABLE `children_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cocuk`
--
ALTER TABLE `cocuk`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `erkek`
--
ALTER TABLE `erkek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `indirimler`
--
ALTER TABLE `indirimler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `kadin`
--
ALTER TABLE `kadin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `men_products`
--
ALTER TABLE `men_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_id` (`kullanici_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `women_products`
--
ALTER TABLE `women_products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `children_products`
--
ALTER TABLE `children_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `cocuk`
--
ALTER TABLE `cocuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `erkek`
--
ALTER TABLE `erkek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `indirimler`
--
ALTER TABLE `indirimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kadin`
--
ALTER TABLE `kadin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `men_products`
--
ALTER TABLE `men_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `women_products`
--
ALTER TABLE `women_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Tablo kısıtlamaları `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `indirimler`
--
ALTER TABLE `indirimler`
  ADD CONSTRAINT `indirimler_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`id`);

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Tablo kısıtlamaları `sepet`
--
ALTER TABLE `sepet`
  ADD CONSTRAINT `sepet_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`id`),
  ADD CONSTRAINT `sepet_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`id`);

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
