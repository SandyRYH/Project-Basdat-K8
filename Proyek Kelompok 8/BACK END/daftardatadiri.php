<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Daftar Data Mahasiswa</h3>
	</header>

	<nav>
		<a href="formdatadiri.php">[+] Tambah Baru</a>
	</nav>

	<br>

	<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Departemen</th>
			<th>Fakultas</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$query = pg_query("SELECT * FROM peminjam");
		// $query = mysqli_query($db, $sql);


		while($siswa = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td>".$siswa['id']."</td>";
			echo "<td>".$siswa['nim']."</td>";
			echo "<td>".$siswa['nama']."</td>";
			echo "<td>".$siswa['departemen']."</td>";
			echo "<td>".$siswa['fakultas']."</td>";

			echo "<td>";
			echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a> | ";

			echo "<a href='formedit.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a href='formpeminjaman.php?id=".$siswa['id']."'>Pinjam Sepeda</a>";
			echo "</td>";

			echo "</tr>";

			}


		?>

	</tbody>
	</table>

	<p>Total: <?php echo pg_num_rows($query) ?></p>

	</body>
</html>
