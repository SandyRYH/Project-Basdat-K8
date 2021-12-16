<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Daftar Sepeda</h3>
	</header>
    <li><a href="daftartipe.php">Daftar Tipe Sepeda</a></li>
	<nav>
		
	</nav>

	<br>

	<table border="1">
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

	</tbody>
	</table>

	<p>Total Sepeda: <?php echo pg_num_rows($query) ?></p>

	</body>
</html>
