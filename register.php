<?php
session_start();
include 'config.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kullanıcı adının kullanılıp kullanılmadığını kontrol et
    $check_username_sql = "SELECT id FROM kullanicilar WHERE username = ?";
    $check_stmt = $conn->prepare($check_username_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $error_message = "Bu kullanıcı adı zaten kullanılıyor.";
    } else {
        // Kullanıcı adı kullanılmıyorsa, kullanıcıyı kaydet
        $insert_sql = "INSERT INTO kullanicilar (username, password) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $username, $hashed_password);

        if ($insert_stmt->execute()) {
            $_SESSION['user_id'] = $insert_stmt->insert_id;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Kayıt olunurken bir hata oluştu. Lütfen tekrar deneyin.";
        }
    }

    $check_stmt->close();
    $insert_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Kayıt Ol</h2>
        <?php if ($error_message !== '') : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
        </form>
    </div>
</body>

</html>