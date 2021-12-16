<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda IPB</title>
</head>

<body>
	<header>
		<h3>Daftar Tipe Sepeda</h3>
	</header>

	<nav>
		
	</nav>

	<br>

	<table border="1">
	<thead>
		<tr>
			<th>ID Tipe</th>
			<th>Jenis Sepeda</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$query = pg_query("SELECT * FROM tipesepedaipb");
		// $query = mysqli_query($db, $sql);


		while($siswa = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td>".$siswa['idtipe']."</td>";
			echo "<td>".$siswa['tipesepeda']."</td>";
            
			echo "</tr>";

			}


		?>

	</tbody>
	</table>

	<p>Total Sepeda: <?php echo pg_num_rows($query) ?></p>

	</body>
</html>
