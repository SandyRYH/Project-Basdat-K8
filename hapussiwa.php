<?php

include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = pg_query("DELETE FROM calonsiswa WHERE id = $id");

    if ($query == TRUE) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: daftarsiswa.php?status=sukses&action=delete');
    } else {
        // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
        header('Location: daftarsiswa.php?status=gagal&action=delete');
    }

}else{
    header('Location: daftarsiswa.php');
}



?>