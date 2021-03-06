<?php

require 'function.php';

if (isset($_POST["login"])) {
    login();
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style-login.css">
    <title>User Login</title>
</head>

<body>
    <div class="container">
        <div class="title-box">
            <h1>Login</h1>
        </div>
        <form id="login-form" method="post">
            <?php if (isset($error)) : ?>
                <p class="error-text">Username atau password salah</p>
            <?php endif; ?>
            <input type="username" name="username-login" id="username-login" placeholder="Username" required>
            <input type="password" name="password-login" id="password-login" placeholder="Kata Sandi" required>
            <button type="submit" name="login" id="login">Masuk</button>
        </form>
        <div class="register-box">
            <a href="register.php">Daftar Admin?</a>
        </div>
    </div>
</body>

</html>