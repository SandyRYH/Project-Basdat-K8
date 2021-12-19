<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Daftar Sepeda IPB</h3>
	</header>

	<table border="2">
	<thead>
		<tr>
			<th>ID Sepeda</th>
			<th>ID Tipe</th>
		</tr>

	</thead>
	<tbody>

		<?php
		$query = pg_query("SELECT * FROM sepedaipb");
		// $query = mysqli_query($db, $sql);


		while($siswa = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td>".$siswa['sepedaid']."</td>";
			echo "<td>".$siswa['idtipe']."</td>";
			echo "</tr>";

			}


		?>
		<tc>
			<th>Jumlah Sepeda</th>
			<th><?php echo pg_num_rows($query) ?></th>
		</tc>
	</tbody>
	</table>
	<br>
	<a href="daftartipe.php">Daftar Tipe Sepeda</a>
	<a> --- </a>
	<a href="index.php">Back to Home</a>

	</body>
</html>
