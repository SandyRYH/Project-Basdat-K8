<?php

if (!(isset($_SESSION["username"]))) {
    header("Location: index.php");
    exit;
}

$kode = $_GET['kode'];

$kodeCheck = pg_query($conn, "SELECT * FROM sepeda WHERE kode = '$kode'");
$spd = pg_fetch_assoc($kodeCheck);

if (isset($_POST["edit"])) {
    if (editSepeda($_POST > 0)) {
        header("Location: index.php?page=sepeda");
    }
}

?>

<div class="tambah-box">
    <h2>Edit Sepeda</h2>
    <form class="tambah-form" method="post">
        <span>
            <label for="jenis">Jenis Sepeda</label>
            <input type="text" name="jenis" id="jenis" placeholder="<?= $spd['jenis']; ?>" required>
        </span>
        <span>
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" placeholder="<?= $spd['jumlah']; ?>" required>
        </span>
        <span>
            <button type="submit" name="edit" id="edit">Edit</button>
        </span>
    </form>
</div>