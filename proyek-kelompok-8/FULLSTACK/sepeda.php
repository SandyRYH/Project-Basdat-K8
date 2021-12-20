<?php

$sepeda = pg_query($conn, "SELECT * FROM sepeda");

if (isset($_GET["kode"])) {
	global $conn;

	$kode = $_GET["kode"];

	pg_query($conn, "DELETE FROM sepeda WHERE kode = '$kode'");

	header("Location: index.php?page=sepeda");
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
				<th>Kode</th>
				<th>Sepeda</th>
				<th>Tersedia</th>
				<th>Jumlah</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php while ($spd = pg_fetch_assoc($sepeda)) : ?>
				<tr>
					<td><?= $spd['kode']; ?></td>
					<td><?= $spd['jenis']; ?></td>
					<td><?= $spd['tersedia']; ?></td>
					<td><?= $spd['jumlah']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td>
							<span>
								<a href="index.php?page=edit-sepeda&kode=<?= $spd['kode']; ?>&tersedia=<?= $spd['tersedia']; ?>"><img src="icon/edit.png"></a>
								<a href="index.php?page=sepeda&kode=<?= $spd['kode']; ?>"><img src="icon/delete.png"></a>
							</span>
						</td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>