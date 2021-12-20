<?php

require 'function.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        header("Location: index.php");
    } else {
        $error = pg_errormessage($conn);
    }
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
    <link rel="stylesheet" href="css/style-register.css">
    <title>User Register</title>
</head>

<body>
    <div class="container">
        <div class="title-box">
            <h1>Register</h1>
        </div>
        <form id="register-form" method="post">
            <?php if (isset($error)) : ?>
                <p class="error-text">Username sudah tersedia atau konfirmasi password tidak cocok</p>
            <?php endif; ?>
            <input type="username" name="username-register" id="username-register" placeholder="Username" required>
            <input type="password" name="password-register" id="password-register" placeholder="Kata Sandi" required>
            <input type="password" name="password2-register" id="password2-register" placeholder="Konfirmasi Kata Sandi" required>
            <button type="submit" name="register" id="register">Buat User</button>
        </form>
        <div class="login-box">
            <a href="login.php">Login?</a>
        </div>
    </div>
</body>

</html>