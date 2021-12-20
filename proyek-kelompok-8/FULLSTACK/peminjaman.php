<?php

$peminjaman = pg_query($conn, "SELECT * FROM peminjaman");
$history = pg_query($conn, "SELECT * FROM history");

if (isset($_GET["id"])) {
	global $conn;

	$id = $_GET["id"];
	$mahasiswa = $_GET["mahasiswa"];
	$jenis = $_GET["jenis"];
	$kode = $_GET["kode"];
	$tgl = $_GET["tgl"];
	$tanggal = date("l, d M Y");

	$query = pg_fetch_assoc($idCheck);

	$history = "INSERT INTO history(mahasiswa, jenis_sepeda, kode_sepeda, tanggal_meminjam, tanggal_mengembalikan) 
                    VALUES('$mahasiswa', '$jenis', '$kode', '$tgl', $tanggal)";

	pg_query($conn, "DELETE FROM peminjaman WHERE id = $id");

	pg_query($conn, $history);

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
				<th>No.</th>
				<th>Mahasiswa</th>
				<th>Jenis Sepeda</th>
				<th>Kode Sepeda</th>
				<th>Tanggal Peminjaman</th>
				<?php if ((isset($_SESSION["username"]))) : ?>
					<th>Aksi</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php while ($pmj = pg_fetch_assoc($peminjaman)) : ?>
				<tr>
					<td><?= $pmj['id']; ?></td>
					<td><?= $pmj['mahasiswa']; ?></td>
					<td><?= $pmj['jenis_sepeda']; ?></td>
					<td><?= $pmj['kode_sepeda']; ?></td>
					<td><?= $pmj['tanggal_meminjam']; ?></td>
					<?php if ((isset($_SESSION["username"]))) : ?>
						<td><a href="index.php?page=peminjaman&id=<?= $pmj['id']; ?>&mahasiswa=<?= $pmj['mahasiswa']; ?>&jenis=<?= $pmj['jenis_sepeda']; ?>&kode=<?= $pmj['kode_sepeda']; ?>&tgl=<?= $pmj['tanggal_meminjam']; ?>"><img src="icon/checked.png"></a></td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
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
				<th>Kode Sepeda</th>
				<th>Tanggal Peminjaman</th>
				<th>Tanggal Pengembalian</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($hsr = pg_fetch_assoc($history)) : ?>
				<tr>
					<td><?= $hsr['id']; ?></td>
					<td><?= $hsr['mahasiswa']; ?></td>
					<td><?= $hsr['jenis_sepeda']; ?></td>
					<td><?= $hsr['kode_sepeda']; ?></td>
					<td><?= $hsr['tanggal_meminjam']; ?></td>
					<td><?= $hsr['tanggal_mengembalikan']; ?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>