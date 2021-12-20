<?php

$peminjaman = pg_query($conn, "SELECT * FROM peminjaman");
$history = pg_query($conn, "SELECT * FROM history");

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
				<th>No.</th>
				<th>Mahasiswa</th>
				<th>Jenis Sepeda</th>
				<th>Tanggal Peminjaman</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($peminjaman as $pmj) : ?>
				<tr>
					<td><?= $pmj['id']; ?></td>
					<td><?= $pmj['mahasiswa']; ?></td>
					<td><?= $pmj['jenis-sepeda']; ?></td>
					<td><?= $pmj['tanggal-meminjam']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td><a href=""><img src="icon/checked.png"></a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div class="table-box">
	<h2>History</h2>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Mahasiswa</th>
				<th>Jenis Sepeda</th>
				<th>Tanggal Peminjaman</th>
				<th>Tanggal Pengembalian</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($history as $hsr) : ?>
				<tr>
					<td><?= $hsr['id']; ?></td>
					<td><?= $hsr['mahasiswa']; ?></td>
					<td><?= $hsr['jenis-sepeda']; ?></td>
					<td><?= $hsr['tanggal-meminjam']; ?></td>
					<td><?= $hsr['tanggal-mengembalikan']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>