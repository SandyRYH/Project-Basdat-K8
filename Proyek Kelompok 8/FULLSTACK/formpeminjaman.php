<?php
include("config.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$query = pg_query("SELECT * FROM peminjam WHERE id = $id");
	$siswa = pg_fetch_array($query);
	$nim = $siswa['nim'];
	$nama = $siswa['nama'];
	$departemen = $siswa['departemen'];
	$fakultas = $siswa['fakultas'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Peminjaman Sepeda</title>
</head>

<body>
	<header>
		<h3>Formulir Peminjaman Sepeda IPB</h3>
	</header>

	<form action="prosespeminjaman.php" method="POST">
		<fieldset>
		<h4>Data Diri Mahasiswa Peminjam</h4>
		<input type="hidden" name="id" value="<?=$id; ?>">
		<p>
			<label for="nim">NIM: <?=$nim?></label>
		</p>
		<p>
			<label for="nama">Nama: <?=$nama?></label>
		</p>
		<p>
			<label for="departemen">Departemen: <?=$departemen?> </label>
		</p>
		<p>
			<label for="fakultas">Fakultas: <?=$fakultas?> </label>
		</p>

		<h4>Lengkapi form dibawah ini untuk melakukan peminjaman!</h4>
		<a href="daftarsepeda.php">Lihat Daftar Sepeda</a>

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
			<option value="S001">S001</option>
			<option value="S002">S002</option>
			<option value="S003">S003</option>
			<option value="S004">S004</option> 
			<option value="S005">S005</option>
			<option value="V001">V001</option>  
			<option value="V002">V002</option>  
			<option value="V003">V003</option>  
			<option value="V004">V004</option>  
			<option value="V005">V005</option>
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
			<input type="submit" value="Pinjam" name="pinjam" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
