<?php
session_start();
require 'libs/functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = getUser($username);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION['auth'] = $user['username'];
        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger mb-0 text-center'>Yanlış Kullanıcı adı veya şifre</div>";
    }
}

include "views/_header.php";
include "includes/navbar.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <input type="submit" name="login" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>