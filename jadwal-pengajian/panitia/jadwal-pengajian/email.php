<?php 

	session_start();	

	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}

    require '../../function/koneksi.php';
	require '../../templates/header.php';
	require '../../templates/sidebar.php'; 

    $id = $_GET['id'];
    $jamaah = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_pengajian = '$id'");
    // $pengajian = mysqli_query($koneksi, "SELECT * FROM pengajian WHERE id_pengajian = '$id'");
    // $row_pengajian = mysqli_fetch_assoc($pengajian);


?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Kirim Email</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo base_url; ?>panitia/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url; ?>panitia/jadwal-pengajian">Jadwal Pengajian</a></li>
                    <li class="breadcrumb-item active">Kirim Email</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                    	<form action="kirim_email.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                    		<div class="form-group">
                    			<label>Email</label>
                    			<input type="text" class="form-control" name="" readonly 
                                    value="<?php 
                                        while($row = mysqli_fetch_assoc($jamaah)){
                                            echo $row['email'].', ';
                                        } 
                                    ?>">         
                    		</div>

                    		<div class="form-group">
                    			<label>Subject</label>
								<input type="text" name="subject" class="form-control">
                    		</div>

                    		<div class="form-group">
                    			<label>Isi Email</label>
								<textarea name="isi_email" class="form-control" rows="8"></textarea>
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