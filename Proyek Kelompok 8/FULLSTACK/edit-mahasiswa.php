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
	<title>Formulir Edit Data Siswa</title>
</head>

<body>
	<header>
		<h3>Edit Data</h3>
	</header>

	<form action="prosesedit.php" method="POST">
		<fieldset>
		<input type="hidden" name="id" value="<?=$id?>">
		<p>
			<label for="nim">NIM:</label>
			<input type="text" name="nim" value="<?=$nim?>" placeholder="NIM" />
		</p>
		<p>
			<label for="nama">Nama:</label>
			<input type="text" name="nama" value="<?=$nama?>" placeholder="nama lengkap" />
		</p>
		<p>
			<label for="departemen">Departemen: </label>
			<input type="text" name="departemen" value="<?=$departemen?>" placeholder="departemen" />
		</p>
		<p>
			<label for="fakultas">Fakultas: </label>
			<select name="fakultas">  
			<option value="Select">Pilih--</option>}  
			<option value="Faperta">Faperta</option>  
			<option value="FKH">FKH</option>  
			<option value="FPIK">FPIK</option>  
			<option value="Fapet">Fapet</option>  
			<option value="Fahutan">Fahutan</option>
			<option value="Fateta">Fateta</option>
			<option value="FMIPA">FMIPA</option>
			<option value="FEM">FEM</option>
			<option value="FEMA">FEMA</option> 
			<option value="Sekolah Bisnis">Sekolah Bisnis</option>
			<option value="Sekolah Bisnis">Sekolah Vokasi</option>
			</select>
		</p>
		
		<p>
			<input type="submit" value="Edit" name="edit" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
