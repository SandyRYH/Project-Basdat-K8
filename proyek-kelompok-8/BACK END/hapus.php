<?php
include("config.php");
if( isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = pg_query("DELETE FROM peminjam WHERE id=$id");

    if( $query ) {
        header('Location: daftardatadiri.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>