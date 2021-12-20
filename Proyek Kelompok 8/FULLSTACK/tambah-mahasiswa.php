<?php

if (!(isset($_SESSION["username"]))) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["tambah"])) {
	if (addMhs($_POST > 0)) {
		header("Location: index.php?page=mahasiswa");
	}
}

?>

<div class="tambah-box">
	<h2>Tambah Mahasiswa</h2>
	<form class="tambah-form" method="post">
		<span>
			<label for="nim">NIM</label>
			<input type="text" name="nim" id="nim" required>
		</span>
		<span>
			<label for="mahasiswa">Nama Mahasiswa</label>
			<input type="text" name="mahasiswa" id="mahasiswa" required>
		</span>
		<span>
			<label>Fakultas</label>
			<select name="fakultas">
				<option selected disabled>-- PILIH --</option>
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
		</span>
		<span>
			<label for="departemen">Departemen</label>
			<input type="text" name="departemen" id="departemen" required>
		</span>
		<span>
			<label for="alamat">Alamat</label>
			<input type="text" name="alamat" id="alamat" required>
		</span>
		<span>
			<label>Jenis Kelamin</label>
			<input type="radio" name="gender" class="gender" value="Laki-laki" required>Laki-laki
			<input type="radio" name="gender" class="gender" value="Perempuan" required>Perempuan
		</span>
		<span>
			<button type="submit" name="tambah" id="tambah">Tambah</button>
		</span>
	</form>
</div>