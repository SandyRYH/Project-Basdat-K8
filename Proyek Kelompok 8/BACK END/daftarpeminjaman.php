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
		<a href="daftardatadiri.php">Lihat data diri</a>
	</nav>

	<br>

	<table border="2">
	<thead>
		<tr>
			<th>List ID</th>
			<th>User ID</th>
			<th>ID Sepeda</th>
			<th>Tanggal Peminjaman</th>
			<th>Barang Jaminan</th>
			<th>Tindakan</th>
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

			echo "<td>";
			echo "<a href='hapuspinjam.php?listid=".$siswa['listid']."'>Hapus</a> | ";

			echo "<a href='formeditpinjam.php?listid=".$siswa['listid']."'>Edit</a> ";
            
			echo "</td>";
			}

		?>

	</tbody>
	</table>

	<p>Total: <?php echo pg_num_rows($query) ?></p>

	<a href="index.php">Back to Home</a>

	</body>
</html>
