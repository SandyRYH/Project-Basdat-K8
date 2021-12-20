<?php

session_start();
require 'config.php';

function login()
{
    global $conn;

    $username = $_POST["username-login"];
    $password = $_POST["password-login"];

    $usernameCheck = pg_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (pg_num_rows($usernameCheck) === 1) {

        $user = pg_fetch_assoc($usernameCheck);
        if (password_verify($password, $user['password'])) {

            $_SESSION["username"] = $user['username'];

            header("Location: index.php");
            exit;
        }
    }
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username-register"]));
    $password = pg_escape_string($data["password-register"]);
    $password2 = pg_escape_string($data["password2-register"]);

    $usernameCheck = pg_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $user = pg_fetch_assoc($usernameCheck);

    if (pg_fetch_assoc($usernameCheck)) {

        return false;
    }

    if ($password !== $password2) {

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = pg_query($conn, "INSERT INTO 
                admin(username, password, mahasiswa, gender, fakultas, departemen, alamat, image) 
                VALUES('$username', '$password', '', '', '', '', '', 'default.png')");

    $_SESSION["username"] = $user['username'];

    return pg_affected_rows($result);
}

function updateProfile($data)
{
    global $conn;

    $img = upload();
    if (!$img) {
        return false;
    }

    $username = $_SESSION["username"];

    $usernameCheck = pg_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $user = pg_fetch_assoc($usernameCheck);

    $id = $user['id'];
    $username = $user['username'];
    $password = $user['password'];
    $mahasiswa = htmlspecialchars($data["name"]);
    $gender = htmlspecialchars($data["gender"]);
    $departemen = htmlspecialchars($data["departemen"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $alamat = htmlspecialchars($data["address"]);

    $updateProfile = "UPDATE admin SET
                        id = '$id', 
                        username = '$username', 
                        password = '$password', 
                        mahasiswa = '$mahasiswa',
                        gender = '$gender', 
                        departemen = '$departemen', 
                        fakultas = '$fakultas', 
                        alamat = '$alamat',
                        image = '$img'
                        WHERE id = '$id'
                        ";
    $result = pg_query($conn, $updateProfile);

    return pg_affected_rows($result);
}

function upload()
{
    global $conn;

    $username = $_SESSION["username"];

    $usernameCheck = pg_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $user = pg_fetch_assoc($usernameCheck);
    $image = $user['image'];

    $nameFile = $_FILES['img']['name'];
    $sizeFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    $validExtension = ['jpg', 'jpeg', 'png'];
    $imgExtension = explode('.', $nameFile);
    $imgExtension = strtolower(end($imgExtension));

    if (!(in_array($imgExtension, $validExtension))) {
        echo "<script>
        alert('Yang anda upload bukan gambar');
    </script>";
        return false;
    }

    if ($sizeFile > 31425728) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
    </script>";

        return false;
    }

    if (!($image == "default.png")) {
        unlink("img/" . $image);
    }

    $newNameFile = $username;
    $newNameFile .= '.';
    $newNameFile .= $imgExtension;

    move_uploaded_file($tmpName, 'img/' . $newNameFile);

    return $newNameFile;
}

function addMhs()
{
    global $conn;

    $nim = htmlspecialchars($_POST["nim"]);
    $mahasiswa = htmlspecialchars($_POST["mahasiswa"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $fakultas = htmlspecialchars($_POST["fakultas"]);
    $departemen = htmlspecialchars($_POST["departemen"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $nimCheck = pg_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");

    if (pg_fetch_assoc($nimCheck)) {

        return false;
    }

    $addMhs = "INSERT INTO mahasiswa(nim, mahasiswa, gender, fakultas, departemen, alamat)
                VALUES('$nim', '$mahasiswa', '$gender', '$fakultas', '$departemen', '$alamat')";

    $result = pg_query($conn, $addMhs);
    return pg_affected_rows($result);
}

function editMhs($data)
{
    global $conn;

    $nim = htmlspecialchars($_GET["nim"]);
    $mahasiswa = htmlspecialchars($data["mahasiswa"]);
    $gender = htmlspecialchars($data["gender"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $departemen = htmlspecialchars($data["departemen"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $editMhs = "UPDATE mahasiswa SET 
                nim = '$nim', 
                mahasiswa = '$mahasiswa', 
                gender = '$gender', 
                departemen = '$departemen', 
                fakultas = '$fakultas', 
                alamat = '$alamat' 
                WHERE nim = '$nim'";

    $result = pg_query($conn, $editMhs);
    return pg_affected_rows($result);
}

function addSepeda()
{
    global $conn;

    $jenis = htmlspecialchars($_POST["jenis"]);
    $kode = htmlspecialchars($_POST["kode"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);

    $addSepeda = "INSERT INTO sepeda(jenis, kode, tersedia, jumlah) 
                    VALUES('$jenis', '$kode', '$jumlah', '$jumlah')";

    $result = pg_query($conn, $addSepeda);
    return pg_affected_rows($result);
}

function editSepeda()
{
    global $conn;

    $kode = htmlspecialchars($_GET["kode"]);
    $jenis = htmlspecialchars($_POST["jenis"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);

    $editSepeda = "UPDATE sepeda SET 
                    jenis = '$jenis', 
                    tersedia = '$jumlah', 
                    jumlah = '$jumlah'
                    WHERE kode = '$kode'";
    $result = pg_query($conn, $editSepeda);
    return pg_affected_rows($result);
}

function pinjamSepeda()
{
    global $conn;

    $nim = htmlspecialchars($_POST["nim"]);
    $jenis = htmlspecialchars($_POST["jenis-sepeda"]);
    $tanggalMeminjam = date("l, d M Y");

    $nimCheck = pg_query($conn, "SELECT * FROM peminjaman WHERE nim = '$nim'");

    if (pg_fetch_assoc($nimCheck)) {

        return false;
    }

    $result = pg_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    // $result2 = pg_fetch_assoc($nimCheck);

    if (pg_num_rows($nimCheck) === 1) {
        $mahasiswa = pg_fetch_assoc($result);
    }

    $result2 = pg_query($conn, "SELECT * FROM sepeda WHERE jenis = '$jenis");

    if (pg_num_rows($result2) === 1) {

        $tersedia = pg_fetch_assoc($result2);
    }

    $pinjamSepeda = "INSERT INTO peminjaman(nim, mahasiswa, jenis_sepeda, tanggal_meminjam) 
                    VALUES('$nim', '$mahasiswa', '$jenis', '$tanggalMeminjam')";

    $updateSepeda = "UPDATE sepeda SET 
                tersedia = $tersedia 
                WHERE jenis = '$jenis'";

    $result = pg_query($conn, $pinjamSepeda);
    $result2 = pg_query($conn, $updateSepeda);
    return pg_affected_rows($result);
}
