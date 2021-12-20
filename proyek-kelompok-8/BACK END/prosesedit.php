<?php
include("config.php");

if(isset($_POST['edit'])){
	// ambil data dari formulir
	$id = $_POST['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$departemen = $_POST['departemen'];
	$fakultas = $_POST['fakultas'];

	// buat query
  $query = pg_query("UPDATE peminjam
  SET nim='$nim', nama='$nama', departemen='$departemen', fakultas='$fakultas' WHERE id=$id");

    if($query==TRUE){
        header("Location: daftardatadiri.php");
    }else{
    die("Gagal mengedit data...");
    }	

} else{
    die("Akses dilarang...");
    }

?>