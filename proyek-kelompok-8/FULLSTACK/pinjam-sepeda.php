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
    } else {
        $error = true;
    }
}

?>

<div class="pinjam-box">
    <h2>Pinjam Sepeda</h2>
    <form class="pinjam-form" method="post">
        <?php if (isset($error)) : ?>
            <p class="error-text">NIM sudah meminjam sepeda, masukan nim lain</p>
        <?php endif; ?>
        <span>
            <label for="nim">NIM</label>
            <select name="nim" id="nim">
                <option selected disabled>-- PILIH --</option>
                <?php while ($mhs = pg_fetch_assoc($mahasiswa)) : ?>
                    <option value="<?= $mhs["nim"]; ?>"><?= $mhs["nim"]; ?></option>
                <?php endwhile; ?>
            </select>
        </span>
        <span>
            <label for="jenis-sepeda">Jenis Sepeda</label>
            <select name="jenis-sepeda" id="jenis_sepeda">
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