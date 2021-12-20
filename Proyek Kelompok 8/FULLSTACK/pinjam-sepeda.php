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
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" required>
        </span>
        <span>
            <label for="sepeda">Sepeda</label>
            <input type="text" name="sepeda" id="sepeda" required>
        </span>
        <span>
            <button type="submit" name="pinjam" id="pinjam">Pinjam</button>
        </span>
    </form>
</div>