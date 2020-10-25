<?php 

	require_once '../function/koneksi.php'; 

	if(isset($_POST['submit'])){
		$nama_ustadz = $_POST['nama_ustadz'];
		$judul_pengajian = $_POST['judul_pengajian'];
		$tanggal_pengajian = $_POST['tanggal_pengajian'];
		$jam = $_POST['jam'];

		$sql = "INSERT INTO pengajian(nama_ustadz, judul_pengajian, tanggal_pengajian, jam) VALUES('$nama_ustadz', '$judul_pengajian', '$tanggal_pengajian', '$jam')";
		$query = mysqli_query($koneksi, $sql);
		header('Location: index.php');
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Pengajian</title>
</head>
<body>


	<h1>Daftar Pengajian</h1>

	<form action="" method="POST">
		<label>Nama Ustadz</label>
		<input type="text" name="nama_ustadz"><br>

		<label>Judul Pengajian</label>
		<input type="text" name="judul_pengajian"><br>

		<label>Tanggal Pengajian</label>
		<input type="date" name="tanggal_pengajian"><br>

		<label>Waktu Pengajian</label>
		<input type="text" name="jam"><br>

		<button type="submit" name="submit">Simpan</button>
	</form>

</body>
</html>