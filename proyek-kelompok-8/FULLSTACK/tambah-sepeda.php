<?php

if (!(isset($_SESSION["username"]))) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["tambah"])) {
    if (addSepeda($_POST > 0)) {
        header("Location: index.php?page=sepeda");
    }
}

?>

<div class="tambah-box">
    <h2>Tambah Mahasiswa</h2>
    <form class="tambah-form" method="post">
        <span>
            <label for="sepeda">Sepeda</label>
            <input type="text" name="sepeda" id="sepeda" required>
        </span>
        <span>
            <label for="kode">Kode</label>
            <input type="text" name="kode" id="kode" required>
        </span>
        <span>
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" required>
        </span>
        <span>
            <button type="submit" name="tambah" id="tambah">Tambah</button>
        </span>
    </form>
</div>