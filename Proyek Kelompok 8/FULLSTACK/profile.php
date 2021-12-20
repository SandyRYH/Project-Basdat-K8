<?php

$usernameCheck = pg_query($conn, "SELECT * FROM `admin` WHERE username = '$username'");
$user = pg_fetch_assoc($usernameCheck);

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
} else {
    pg_errormessage($conn);
}

if (isset($_POST["update-profile"])) {
    if (updateProfile($_POST) > 0) {
        $succes = true;
    }
} else {
    pg_errormessage($conn);
}

?>

<div class="alert-text">
    <div class="profile-img-container">
        <img class="profile-img" src="<?= "img/" . $user['image']; ?>" alt="Profil Image">
    </div>
    <div class="profile-box">
        <div class="profile-btn-box">
            <h2>Profile</h2>
            <hr>
        </div>
        <form class="profile" action="" method="post" enctype="multipart/form-data">
            <span>
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" placeholder="<?= $user['mahasiswa']; ?>" required>
            </span>
            <span>
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" placeholder="<?= $user['fakultas']; ?>" required>
            </span>
            <span>
                <label for="departemen">Departemen</label>
                <input type="text" name="departemen" id="departemen" placeholder="<?= $user['departemen']; ?>" required>
            </span>
            <span>
                <label for="address">Alamat</label>
                <input type="text" name="address" id="address" placeholder="<?= $user['alamat']; ?>" required>
            </span>
            <span>
                <label>Jenis Kelamin</label>
                <?php if ($user['gender'] == "Laki-laki") : ?>
                    <input type="radio" name="gender" class="gender" id="gender" value="Laki-laki" required checked>Laki-laki
                    <input type="radio" name="gender" class="gender" id="gender" value="Perempuan" required>Perempuan
                <?php endif;  ?>
                <?php if ($user['gender'] == "Perempuan") : ?>
                    <input type="radio" name="gender" class="gender" id="gender" value="Laki-laki" required>Laki-laki
                    <input type="radio" name="gender" class="gender" id="gender" value="Perempuan" required checked>Perempuan
                <?php endif;  ?>
            </span>
            <span>
                <label>Gambar</label>
                <input type="file" name="img" id="img">
            </span>
            <span>
                <button type="submit" name="update-profile" id="update-profile">Simpan</button>
            </span>
        </form>
    </div>