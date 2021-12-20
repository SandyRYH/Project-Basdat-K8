<?php

require 'function.php';

if (isset($_SESSION["username"])) {
	$username = $_SESSION["username"];
	$usernameCheck = pg_query($conn, "SELECT * FROM admin WHERE username = '$username'");
	$user = pg_fetch_assoc($usernameCheck);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<title>IPB SEPEDA</title>
</head>

<body>
	<header>
		<div>
			<a class="title" href="index.php">IPB SEPEDA</a>
		</div>
		<div class="user">
			<?php if (isset($_SESSION["username"])) : ?>
				<a href="index.php?page=profile">
					<img src="<?= "img/" . $user['image']; ?>" alt="Profile">
				</a>
			<?php endif; ?>
			<?php if (!isset($_SESSION["username"])) : ?>
				<a href="login.php">
					<img src="img/default.png" alt="Profile">
				</a>
			<?php endif; ?>
		</div>
	</header>
	<aside>
		<ul>
			<li>
				<a href="index.php">
					<img src="icon/dashboard.png" alt="" srcset="">
					<p>Dashboard</p>
				</a>
			</li>
			<li>
				<a href="index.php?page=mahasiswa">
					<img src="icon/user.png" alt="" srcset="">
					<p>Daftar Mahasiswa</p>
				</a>
			</li>
			<li>
				<a href="index.php?page=peminjaman">
					<img src="icon/list.png" alt="" srcset="">
					<p>Daftar Peminjaman</p>
				</a>
			</li>
			<li>
				<a href="index.php?page=sepeda">
					<img src="icon/bike.png" alt="" srcset="">
					<p>Daftar Sepeda</p>
				</a>
			</li>
			<?php if (isset($_SESSION["username"])) : ?>
				<li>
					<a href="logout.php">
						<img src="icon/logout.png" alt="" srcset="">
						<p>Logout</p>
					</a>
				</li>
			<?php endif; ?>
			<?php if (!isset($_SESSION["username"])) : ?>
				<li>
					<a href="logout.php">
						<img src="icon/login.png" alt="" srcset="">
						<p>Login</p>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</aside>
	<div class="container">

		<?php

		if (isset($_GET["page"])) {

			switch ($_GET["page"]) {
				case 'profile';
					include "profile.php";
					break;
				case 'mahasiswa':
					include "mahasiswa.php";
					break;
				case 'tambah-mahasiswa';
					include "tambah-mahasiswa.php";
					break;
				case 'edit-mahasiswa';
					include "edit-mahasiswa.php";
					break;
				case 'peminjaman':
					include "peminjaman.php";
					break;
				case 'pinjam-sepeda';
					include "pinjam-sepeda.php";
					break;
				case 'sepeda':
					include "sepeda.php";
					break;
				case 'tambah-sepeda';
					include "tambah-sepeda.php";
					break;
				case 'edit-sepeda';
					include "edit-sepeda.php";
					break;
				default:
					echo "Maaf, halaman tidak ditemukan!";
					break;
			}
		} else {
			include "dashboard.php";
		}

		?>

	</div>
</body>

</html>