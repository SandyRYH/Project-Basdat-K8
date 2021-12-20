<?php

$mahasiswa = pg_query($conn, "SELECT * FROM mahasiswa");

if (isset($_GET["id"])) {
	global $conn;

	$id = $_GET["id"];

	pg_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

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
				<th>No.</th>
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
					<td><?= $mhs['id']; ?></td>
					<td><?= $mhs['nim']; ?></td>
					<td><?= $mhs['mahasiswa']; ?></td>
					<td><?= $mhs['gender']; ?></td>
					<td><?= $mhs['fakultas']; ?></td>
					<td><?= $mhs['departemen']; ?></td>
					<td><?= $mhs['alamat']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td>
							<span>
								<a href="index.php?page=edit-mahasiswa&id=<?= $mhs['id']; ?>"><img src="icon/edit.png"></a>
								<a href="index.php?page=mahasiswa&id=<?= $mhs['id']; ?>"><img src="icon/delete.png"></a>
							</span>
						</td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>