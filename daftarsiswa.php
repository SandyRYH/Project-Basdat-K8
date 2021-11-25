<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Siswa yang sudah mendaftar</h3>
	</header>
	<nav>
		<a href="formdaftar.php">[+] Tambah Baru</a>
	</nav>
	<?php if (isset($_GET['status'])&&isset($_GET['action'])) : ?>
		<p>
			<?php
			$status = $_GET['status'];
			$action = $_GET['action'];

			if ($_GET['status'] == 'sukses') {
				echo $action." siswa berhasil!";
			} else {
				echo $action . " siswa gagal!";
			}
			?>
		</p>
	<?php endif; ?>
	<br>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Sekolah Asal</th>
				<th>Tindakan</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$query = pg_query("SELECT * FROM calonsiswa");
			// $query = mysqli_query($db, $sql);

			while ($siswa = pg_fetch_array($query)) { ?>
				<tr>
					<td><?= $siswa['id'] ?></td>
					<td><?= $siswa['nama'] ?></td>
					<td><?= $siswa['alamat'] ?></td>
					<td><?= $siswa['jenis_kelamin'] ?></td>
					<td><?= $siswa['sekolah_asal'] ?></td>
					<td>
						<a href="hapussiwa.php?id=<?= $siswa['id'] ?>">delete</a>
						<a href="editsiswa.php?id=<?=$siswa['id']?>">edit</a>
					</td>

				</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Total: <?php echo pg_num_rows($query) ?></p>
</body>

</html>