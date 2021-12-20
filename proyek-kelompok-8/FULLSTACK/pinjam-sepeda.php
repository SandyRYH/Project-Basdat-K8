<?php

$mahasiswa = pg_query($conn, "SELECT * FROM mahasiswa");
$sepeda = pg_query($conn, "SELECT * FROM sepeda");

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
            <label for="mahasiswa">Nama Mahasiswa</label>
            <select name="mahasiswa" id="mahasiswa">
                <option selected disabled>-- PILIH --</option>
                <?php while ($mhs = pg_fetch_assoc($mahasiswa)) : ?>
                    <option value="<?= $mhs["mahasiswa"]; ?>"><?= $mhs["mahasiswa"]; ?></option>
                <?php endwhile; ?>
            </select>
        </span>
        <span>
            <label for="jenis-sepeda">Jenis Sepeda</label>
            <select name="jenis-sepeda" id="mahasiswa">
                <option selected disabled>-- PILIH --</option>
                <?php while ($jns = pg_fetch_assoc($sepeda)) : ?>
                    <option value="<?= $jns["sepeda"]; ?>"><?= $jns["sepeda"]; ?></option>
                <?php endwhile; ?>
            </select>
        </span>
        <span>
            <button type="submit" name="pinjam" id="pinjam">Pinjam</button>
        </span>
    </form>
</div>