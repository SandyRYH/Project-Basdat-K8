<?php

$mahasiswa = pg_query($conn, "SELECT * FROM mahasiswa");

if (isset($_GET["nim"])) {
	global $conn;

	$nim = $_GET["nim"];

	pg_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");

	pg_query($conn, "DELETE FROM peminjaman WHERE nim = '$nim'");

	header("Location: index.php?page=mahasiswa");
}

?>

<div class="article-title">
	<h2>Daftar Mahasiswa</h2>
</div>
<?php if (isset($_SESSION["username"])) : ?>
	<div class="button-box">
		<a href="index.php?page=tambah-mahasiswa" id="button">+ Tambah</a>
	</div>
<?php endif; ?>
<div class="table-box">
	<table>
		<thead>
			<tr>
				<th>NIM</th>
				<th>Mahasiswa</th>
				<th>Jenis Kelamin</th>
				<th>Fakultas</th>
				<th>Departemen</th>
				<th>Alamat</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php while ($mhs = pg_fetch_assoc($mahasiswa)) : ?>
				<tr>
					<td><?= $mhs['nim']; ?></td>
					<td><?= $mhs['mahasiswa']; ?></td>
					<td><?= $mhs['gender']; ?></td>
					<td><?= $mhs['fakultas']; ?></td>
					<td><?= $mhs['departemen']; ?></td>
					<td><?= $mhs['alamat']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td>
							<span>
								<a href="index.php?page=edit-mahasiswa&nim=<?= $mhs['nim']; ?>"><img src="icon/edit.png"></a>
								<a href="index.php?page=mahasiswa&nim=<?= $mhs['nim']; ?>"><img src="icon/delete.png"></a>
							</span>
						</td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>