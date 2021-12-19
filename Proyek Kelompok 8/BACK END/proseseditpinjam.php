<?php
include("config.php");

if(isset($_POST['edit'])){
	$listid = $_POST['listid'];
    $userid = $_POST['userid'];
	$sepedaid = $_POST['sepedaid'];
	$tglpinjam = $_POST['tglpinjam'];
	$brgjaminan = $_POST['brgjaminan'];

	// buat query
  $query = pg_query("UPDATE listpinjam
  SET userid='$userid', sepedaid='$sepedaid', tglpinjam='$tglpinjam', brgjaminan='$brgjaminan' WHERE listid=$listid");

    if($query==TRUE){
        header("Location: daftarpeminjaman.php");
    }else{
    die("Gagal mengedit data...");
    }	

} else{
    die("Akses dilarang...");
    }

?>