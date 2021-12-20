<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

	// ambil data dari formulir
	$id = $_POST['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$departemen = $_POST['departemen'];
	$fakultas = $_POST['fakultas'];

	// buat query
  $query = pg_query("INSERT INTO peminjam (nim, nama, departemen, fakultas) VALUEs ('$nim', '$nama', '$departemen', '$fakultas')");
	// apakah query simpan berhasil?
	if( $query==TRUE ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=sukses');
	} else { 
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>
