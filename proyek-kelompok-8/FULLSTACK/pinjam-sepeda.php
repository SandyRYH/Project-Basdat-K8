<?php

$mahasiswa = pg_query($conn, "SELECT mahasiswa FROM mahasiswa");
$mhs = pg_fetch_assoc($mahasiswa);
$jenis = pg_query($conn, "SELECT sepeda FROM sepeda");
$kode = pg_query($conn, "SELECT kode FROM sepeda");

if (!(isset($_SESSION["username"]))) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["pinjam"])) {
    if (pinjamSepeda($_POST) > 0) {
        header("Location: index.php?page=peminjaman");
    }
}
var_dump($mhs);
?>

<div class="pinjam-box">
    <h2>Pinjam Sepeda</h2>
    <form class="pinjam-form" method="post">
        <span>
            <label for="mahasiswa">NIM</label>
            <select name="mahasiswa" id="mahasiswa">
                <option selected disabled>-- PILIH --</option>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <option value="<?= $mahasiswa[$i]; ?>"><?= $mahasiswa[$i]; ?></option>
                <?php endfor; ?>
            </select>
        </span>
        <span>
            <label for="jenis-sepeda">Jenis Sepeda</label>
            <select name="mahasiswa" id="mahasiswa">
                <option selected disabled>-- PILIH --</option>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <option value="<?= $jenis[$i]; ?>"><?= $jenis[$i]; ?></option>
                <?php endfor; ?>
            </select>
        </span>
        <span>
            <label for="kode-sepeda">Kode Sepeda</label>
            <select name="mahasiswa" id="mahasiswa">
                <option selected disabled>-- PILIH --</option>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <option value="<?= $kode[$i]; ?>"><?= $kode[$i]; ?></option>
                <?php endfor; ?>
            </select>
        </span>
        <span>
            <button type="submit" name="pinjam" id="pinjam">Pinjam</button>
        </span>
    </form>
</div>