<?php
include("config.php");

if(isset($_GET['listid'])){
	$listid = $_GET['listid'];

    $query = pg_query("SELECT * FROM listpinjam WHERE listid=$listid");
	$siswa = pg_fetch_array($query);
	$userid = $siswa['userid'];
	$sepedaid = $siswa['sepedaid'];
	$tglpinjam = $siswa['tglpinjam'];
	$brgjaminan = $siswa['brgjaminan'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Data Peminjaman</title>
</head>

<body>
	<header>
		<h3>Edit Data Peminjaman</h3>
	</header>

	<form action="proseseditpinjam.php" method="POST">
    <fieldset>
		<h4>Lengkapi form dibawah ini untuk melakukan peminjaman!</h4>
		<input type="hidden" name="userid" value="<?=$userid?>">
		<input type="hidden" name="listid" value="<?=$listid?>">
		<p>
			<label for="tipesepeda">Tipe Sepeda:</label>
			<label><input type="radio" name="tipesepeda" value="Sierra"> Sierra</label>
			<label><input type="radio" name="tipesepeda" value="Vista"> Vista</label>
			<label><input type="radio" name="tipesepeda" value="Mountain Bike"> Mountain Bike</label>
		</p>
		<p>
			<label for="sepedaid">ID Sepeda: </label>
			<select name="sepedaid">  
			<option value="Select">Pilih--</option>}  
			<option value="V001">V001</option>  
			<option value="V002">V002</option>  
			<option value="V003">V003</option>  
			<option value="V004">V004</option>  
			<option value="V005">V005</option>
			<option value="S001">S001</option>
			<option value="S002">S002</option>
			<option value="S003">S003</option>
			<option value="S004">S004</option> 
			<option value="S005">S005</option>
			<option value="M001">M001</option>
			<option value="M002">M002</option>
			<option value="M003">M003</option>
			<option value="M004">M004</option>
			<option value="M005">M005</option>
			</select>
		</p>
		</p>
		<p>
			<label for="tglpinjam">Tanggal Peminjaman:</label>
			<label><input type="date" name="tglpinjam"</label>
		</p>
		<p>
			<label for="brgjaminan">Barang Jaminan (KTM,KTP): </label>
			<input type="text" name="brgjaminan" placeholder="isi dengan link google drive" />
		</p>
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
