<?php
require "libs/vars.php";
require "libs/function.php";


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //burada getuser'dan gelen username bilgisini çekiyoruz.
    //fonksiyona parametre gönderecek ve gelen parametreye gre doğru mu yanlış mı kontrol edecek.   
    $user = getUser($username);

    if (!is_null($user) and $username == $user["username"] and $password == $user["password"]) {

        setcookie("auth[username]", $username, time() + (60 * 60));
        setcookie("auth[name]", $username, time() + (60 * 60));

        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger mb-0 text-center'>Yanlış Kullanıcı adı veya şifre</div>";
    }
}


?>
<?php include "views/_header.php" ?>
<?php include "includes/navbar.php" ?>

<div class="container my-5">

    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">passsword</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <input type="submit" name="login" value="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>