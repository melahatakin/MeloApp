<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO kullanicilar (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Kayıt başarılı. Giriş yapmak için <a href='login.php'>tıklayın</a>.";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
</head>

<body>
    <h2>Kayıt Ol</h2>
    <form method="post" action="">
        Kullanıcı Adı: <input type="text" name="username" required><br>
        Şifre: <input type="password" name="password" required><br>
        <input type="submit" value="Kayıt Ol">
    </form>
</body>

</html>