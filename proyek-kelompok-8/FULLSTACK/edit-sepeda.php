<?php

if (!(isset($_SESSION["username"]))) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$idCheck = pg_query($conn, "SELECT * FROM sepeda WHERE id = $id");
$spd = pg_fetch_assoc($idCheck);

if (isset($_POST["edit"])) {
    if (editSepeda($_POST > 0)) {
        header("Location: index.php?page=sepeda");
    }
}

?>

<div class="tambah-box">
    <h2>Edit Sepeda</h2>
    <form class="tambah-form" method="post">
        <input type="hidden" name="id" id="id" value="<?= $spd['id']; ?>">
        <span>
            <label for="sepeda">Sepeda</label>
            <input type="text" name="sepeda" id="sepeda" placeholder="<?= $spd['sepeda']; ?>" required>
        </span>
        <span>
            <label for="kode">Kode</label>
            <input type="text" name="kode" id="kode" placeholder="<?= $spd['kode']; ?>" required>
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