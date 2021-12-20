<?php

if (!(isset($_SESSION["username"]))) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["pinjam"])) {
    if (pinjamSepeda($_POST) > 0) {
        header("Location: index.php?page=peminjaman");
    }
}

?>

<div class="pinjam-box">
    <h2>Pinjam Sepeda</h2>
    <form class="pinjam-form" method="post">
        <span>
            <label for="mahasiswa">Mahasiswa</label>
            <input type="text" name="mahasiswa" id="mahasiswa" required>
        </span>
        <span>
            <label for="jenis-sepeda">Jenis Sepeda</label>
            <input type="text" name="jenis-sepeda" id="jenis-sepeda" required>
        </span>
        <span>
            <label for="kode-sepeda">Kode Sepeda</label>
            <input type="text" name="kode-sepeda" id="kode-sepeda" required>
        </span>
        <span>
            <button type="submit" name="pinjam" id="pinjam">Pinjam</button>
        </span>
    </form>
</div>