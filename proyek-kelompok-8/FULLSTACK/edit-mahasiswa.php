<?php

if (!(isset($_SESSION["username"]))) {
	header("Location: index.php");
	exit;
}

$nim = $_GET['nim'];

$nimCheck = pg_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
$mhs = pg_fetch_assoc($nimCheck);

if (isset($_POST["edit"])) {
	if (editMhs($_POST) > 0) {
		header("Location: index.php?page=mahasiswa");
	}
}

?>

<div class="edit-box">
	<h2>Edit Mahasiswa</h2>
	<form class="edit-form" method="post">
		<span>
			<label for="nim">NIM</label>
			<input type="text" name="nim" id="nim" placeholder="<?= $mhs["nim"]; ?>" required>
		</span>
		<span>
			<label for="mahasiswa">Nama Mahasiswa</label>
			<input type="text" name="mahasiswa" id="mahasiswa" placeholder="<?= $mhs["mahasiswa"]; ?>" required>
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
			<input type="text" name="departemen" id="departemen" placeholder="<?= $mhs["departemen"]; ?>" required>
		</span>
		<span>
			<label for="alamat">Alamat</label>
			<input type="text" name="alamat" id="alamat" placeholder="<?= $mhs["alamat"]; ?>" required>
		</span>
		<span>
			<label>Jenis Kelamin</label>
			<?php if ($mhs['gender'] == "Laki-laki") : ?>
				<input type="radio" name="gender" class="gender" value="Laki-laki" required checked>Laki-laki
				<input type="radio" name="gender" class="gender" value="Perempuan" required>Perempuan
			<?php endif; ?>
			<?php if ($mhs['gender'] == "Perempuan") : ?>
				<input type="radio" name="gender" class="gender" value="Laki-laki" required>Laki-laki
				<input type="radio" name="gender" class="gender" value="Perempuan" required checked>Perempuan
			<?php endif; ?>
		</span>
		<span>
			<button type="submit" name="edit" id="edit">Edit</button>
		</span>
	</form>
</div>