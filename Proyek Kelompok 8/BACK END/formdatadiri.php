<!DOCTYPE html>
<html>
<head>
	<title>Formulir Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Lengkapi Data Diri</h3>
	</header>

	<form action="prosesdatadiri.php" method="POST">
		<fieldset>
		<p>
			<label for="nim">NIM: </label>
			<input type="text" name="nim" placeholder="Tulis NIM kamu" />
		</p>
		<p>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" placeholder="Tulis nama lengkapmu" />
		</p>
		<p>
			<label for="departemen">Departemen: </label>
			<input type="text" name="departemen" placeholder="Tulis Departemenmu" />
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
			<option value="Sekolah Vokasi">Sekolah Vokasi</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>
		</fieldset>
	</form>

	</body>
</html>
