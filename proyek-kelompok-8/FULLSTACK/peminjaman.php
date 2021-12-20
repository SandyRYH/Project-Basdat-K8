<?php

$peminjaman = pg_query($conn, "SELECT * FROM peminjaman");

if (isset($_GET["nim"])) {
	global $conn;

	$nim = $_GET["nim"];

	pg_query($conn, "DELETE FROM peminjaman WHERE nim = '$nim'");

	header("Location: index.php?page=peminjaman");
}

?>

<div class="article-title">
	<h2>Daftar Peminjaman</h2>
</div>
<?php if (isset($_SESSION["username"])) : ?>
	<div class="button-box">
		<a href="index.php?page=pinjam-sepeda" id="button">+ Pinjam</a>
	</div>
<?php endif; ?>
<div class="table-box">
	<table>
		<thead>
			<tr>
				<th>NIM</th>
				<th>Mahasiswa</th>
				<th>Jenis Sepeda</th>
				<th>Tanggal Peminjaman</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php while ($pmj = pg_fetch_assoc($peminjaman)) : ?>
				<tr>
					<td><?= $pmj['nim']; ?></td>
					<td><?= $pmj['mahasiswa']; ?></td>
					<td><?= $pmj['jenis_sepeda']; ?></td>
					<td><?= $pmj['tanggal_meminjam']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td><a href="index.php?page=peminjaman&nim=<?= $pmj['nim']; ?>">Kembailkan</a></td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>