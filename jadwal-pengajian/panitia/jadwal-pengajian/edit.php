<?php 

	session_start();	

	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}

    require '../../function/koneksi.php';
	require '../../templates/header.php';
	require '../../templates/sidebar.php'; 

    $id = $_GET['id'];
	if(isset($_POST['submit'])){
		$nama_ustadz = $_POST['nama_ustadz'];
		$judul_pengajian = $_POST['judul_pengajian'];
		$tanggal_pengajian = $_POST['tanggal_pengajian'];
		$jam = $_POST['jam'];

		$sql = "UPDATE pengajian SET nama_ustadz = '$nama_ustadz', 
                                     judul_pengajian = '$judul_pengajian', 
                                     tanggal_pengajian = '$tanggal_pengajian', 
                                     jam = '$jam' WHERE id_pengajian = '$id'"; 
		$query = mysqli_query($koneksi, $sql);
		$_SESSION['notif-sukses'] = 'Data berhasil diubah';
		header('Location: index.php');
	}

    $query = mysqli_query($koneksi, "SELECT * FROM pengajian WHERE id_pengajian = '$id'");
    $row = mysqli_fetch_assoc($query);


?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edit Pengajian</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo base_url; ?>panitia/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url; ?>panitia/jadwal-pengajian">Jadwal Pengajian</a></li>
                    <li class="breadcrumb-item active">Tambah Pengajian</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                    	<form action="" method="post">
                    		<div class="form-group">
                    			<label>Nama Ustadz</label>
                    			<input type="text" name="nama_ustadz" class="form-control" value="<?php echo $row['nama_ustadz']; ?>">
                    		</div>

                    		<div class="form-group">
                    			<label>Judul Pengajian</label>
								<input type="text" name="judul_pengajian" class="form-control" value="<?php echo $row['judul_pengajian']; ?>">
                    		</div>

                    		<div class="form-group">
                    			<label>Tanggal Pengajian</label>
								<input type="date" name="tanggal_pengajian" class="form-control" value="<?php echo $row['tanggal_pengajian']; ?>">
                    		</div>

                    		<div class="form-group clockpicker">
                    			<label>Waktu Pengajian</label>
							    <input type="text" class="form-control" name="jam" value="<?php echo $row['jam']; ?>">
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>

							<button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                    	</form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Rivan Ramdani</div>
                    <div>
                        <a href="#"></a>
                        &middot;
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div> 

<?php require '../../templates/footer.php'; ?>  
<script type="text/javascript">
	$(document).ready(function(){
		$('.clockpicker').clockpicker({
		    placement: 'top',
		    align: 'left',
		    donetext: 'Done'
		});
	});
</script>