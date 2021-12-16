<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Sepeda Kampus IPB</title>
</head>

<body>
	<header>
		<h2>Peminjaman Sepeda Kampus</h2>
		<h1>IPB University</h1>
	</header>

	<h4>Menu</h4>
	<nav>
		<ul>
			<li><a href="formdatadiri.php">Isi Data Diri</a></li>
			<li><a href="daftardatadiri.php">Daftar Data Mahasiswa</a></li>
			<li><a href="daftarsepeda.php">Daftar Sepeda IPB</a></li>
		</ul>
	</nav>


	<?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			if($_GET['status'] == 'sukses'){
				echo "Pendaftaran berhasil!";
			} else {
				echo "Pendaftaran gagal!";
			}
		?>
	</p>
	<?php endif; ?>

	</body>
</html>
