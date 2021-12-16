<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Daftar Peminjaman Sepeda</h3>
	</header>

	<nav>
		<a href="formpeminjaman.php">[+] Tambah Baru</a>
	</nav>

	<br>

	<table border="1">
	<thead>
		<tr>
			<th>List ID</th>
			<th>User ID</th>
			<th>Sepeda</th>
			<th>Tanggal Peminjaman</th>
			<th>Barang Jaminan </th>
		</tr>
	</thead>
	<tbody>

		<?php
		$query = pg_query("SELECT * FROM listpinjam");
		// $query = mysqli_query($db, $sql);


		while($siswa = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td>".$siswa['listid']."</td>";
			echo "<td>".$siswa['userid']."</td>";
			echo "<td>".$siswa['sepedaid']."</td>";
			echo "<td>".$siswa['tglpinjam']."</td>";
			echo "<td>".$siswa['brgjaminan']."</td>";
			}

		?>

	</tbody>
	</table>

	<p>Total: <?php echo pg_num_rows($query) ?></p>

	</body>
</html>
