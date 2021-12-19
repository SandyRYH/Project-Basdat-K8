<?php
include("config.php");
if( isset($_GET['listid'])) {

    $listid = $_GET['listid'];

    $query = pg_query("DELETE FROM listpinjam WHERE listid=$listid");

    if( $query ) {
        header('Location: daftarpeminjaman.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>