<?php

$sepeda = pg_query($conn, "SELECT * FROM sepeda");

if (isset($_GET["id"])) {
	global $conn;

	$id = $_GET["id"];

	pg_query($conn, "DELETE FROM sepeda WHERE id = $id");

	header("Location: index.php?page=mahasiswa");
}

?>

<div class="article-title">
	<h2>Daftar Sepeda</h2>
</div>
<?php if (isset($_SESSION["username"])) : ?>
	<div class="button-box">
		<a href="index.php?page=tambah-sepeda" id="button">+ Tambah</a>
	</div>
<?php endif; ?>
<div class="table-box">
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Sepeda</th>
				<th>Kode</th>
				<th>Tersedia</th>
				<th>Jumlah</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sepeda as $spd) : ?>
				<tr>
					<td><?= $spd['id']; ?></td>
					<td><?= $spd['sepeda']; ?></td>
					<td><?= $spd['kode']; ?></td>
					<td><?= $spd['tersedia']; ?></td>
					<td><?= $spd['jumlah']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td>
							<span>
								<a href="index.php?page=edit-sepeda&id=<?= $spd['id']; ?>"><img src="icon/edit.png"></a>
								<a href="index.php?page=sepeda&id=<?= $spd['id']; ?>"><img src="icon/delete.png"></a>
							</span>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>