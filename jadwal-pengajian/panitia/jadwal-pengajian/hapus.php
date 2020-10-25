<?php 

	require '../../function/koneksi.php';
	session_start();

	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "DELETE FROM pengajian WHERE id_pengajian = '$id'");
	$_SESSION['notif-sukses'] = 'Data berhasil dihapus';
	header('Location: index.php');

 ?>