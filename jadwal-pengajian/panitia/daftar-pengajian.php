<?php 

	require_once '../function/koneksi.php'; 

	session_start();

	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Pengajian di Mesjid Majalaya</title>
</head>
<body>


	<h1>Daftar Pengajian</h1>

	<br>

	<a href="logout.php">Logout</a>

	<br><br>

	<a href="tambah.php">+ Tambah Pengajian</a> <br><br>

	<table border="1" cellpadding="2">
		<tr>
			<th>Nama Ustadz</th>
			<th>Judul Pengajian</th>
			<th>Tanggal Pengajian</th>
			<th>Waktu Pengajian</th>
			<th>Aksi</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM pengajian";
			$query = mysqli_query($koneksi, $sql);
		 ?>

		 <?php if(mysqli_num_rows($query) == 0) : ?>
		 	<td>Tidak ada pengajian</td>
		 <?php endif; ?>

		 <?php while($row = mysqli_fetch_assoc($query)) : ?>
			<tr>
				<td><?= $row['nama_ustadz']; ?></td>
				<td><?= $row['judul_pengajian']; ?></td>
				<td><?= date('d-m-Y', strtotime($row['tanggal_pengajian'])); ?></td>
				<td><?= $row['jam']; ?></td>
				<td>
					<a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
					<a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</table>

</body>
</html>