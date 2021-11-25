<?php

include("config.php");
if (isset($_POST['daftar'])) {
    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $sekolah = $_POST['sekolah_asal'];
        
        $update = " UPDATE calonsiswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', sekolah_asal='$sekolah' WHERE id = '$id' ";
        $query = pg_query($update);

        if ($query == TRUE) {
            header('Location: daftarsiswa.php?status=sukses&action=edit');
        } else {
            header('Location: daftarsiswa.php?status=gagal&action=edit');
        }
    }
} else {
    die("Akses dilarang...");
}
