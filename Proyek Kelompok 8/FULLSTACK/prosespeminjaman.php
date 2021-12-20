<?php
include("config.php");

if(isset($_POST['pinjam'])){
	// ambil data dari formulir
	$listid = $_POST['listid'];
	$id = $_POST['id'];
	$sepedaid = $_POST['sepedaid'];
	$tglpinjam = $_POST['tglpinjam'];
	$brgjaminan = $_POST['brgjaminan'];

	// buat query
  $query = pg_query("INSERT INTO listpinjam (userid,sepedaid,Tglpinjam,brgjaminan)
  VALUES ('$id','$sepedaid','$tglpinjam','$brgjaminan')");

    if($query==TRUE){
        header("Location: daftarpeminjaman.php");
    }else{
    die("Gagal mengedit data...");
    }	

} else{
    die("Akses dilarang...");
    }

?>